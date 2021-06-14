<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CodConIdentifierType;
use App\Models\CodConMarital;
use App\Models\Commune;
use App\Models\ContactPoint;
use App\Models\Country;
use App\Models\Congregation;
use App\Models\HumanName;
use App\Models\Identifier;
use App\Models\Region;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Traits\GoogleToken;

class PatientController extends Controller
{
    use GoogleToken;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index');
    }

    public function create()
    {
        $maritalStatus = CodConMarital::all();
        $countries = Country::all();
        $regions = Region::all();
        $congregation = Congregation::all();
        $identifierTypes = CodConIdentifierType::all();
        return view('patients.create', compact('maritalStatus', 'countries', 'regions', 'identifierTypes', 'congregations'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request, $save = null)
    {
        //Busca los pacientes que ya esten ingresados con los datos de request
        $matchingPatients = $this->getMatchingPatients($request);
        if ($matchingPatients->count() === 0 || $save == true) {
            $this->savePatientData($request);
        } else {
            return view('patients.matching_patients', compact('matchingPatients', 'request'));
        }

        return redirect()->route('patient.index');
    }

    public function savePatientData(Request $request)
    {
        DB::beginTransaction();
        try {
            $newPatient = new User($request->all());
            $newPatient->active = 1;
            $newPatient->save();
            $newHumanName = new HumanName($request->all());
            $newHumanName->use = $request->human_name_use;
            $newHumanName->user_id = $newPatient->id;
            $newHumanName->save();

            if ($request->has('id_type')) {
                foreach ($request->id_type as $key => $id_type) {
                    $newIdentifier = new Identifier();
                    $newIdentifier->user_id = $newPatient->id;
                    $newIdentifier->use = $request->id_use[$key];
                    $newIdentifier->cod_con_identifier_type_id = $request->id_type[$key];
                    $newIdentifier->value = $request->id_value[$key];
                    $newIdentifier->dv = $request->id_dv[$key];
                    $newIdentifier->save();
                }
            }

            if ($request->has('address_use')) {
                foreach ($request->address_use as $key => $address_use) {
                    $newAddress = new Address();
                    $newAddress->user_id = $newPatient->id;
                    $newAddress->use = $request->address_use[$key];
                    $newAddress->type = 'physical';
                    $newAddress->text = $request->street_name[$key];
                    $newAddress->line = $request->line[$key];
                    $newAddress->apartment = $request->address_apartment[$key];
                    $newAddress->suburb = $request->suburb[$key];
                    $newAddress->city = $request->city[$key];
                    $newAddress->commune_id = $request->district[$key];
                    $newAddress->region_id = $request->state[$key];
                    $newAddress->country_id = $request->country[$key];
                    $newAddress->save();
                }
            }

            if ($request->has('contact_system')) {
                foreach ($request->contact_system as $key => $contact_system) {
                    $newContactPoint = new ContactPoint();
                    $newContactPoint->system = $request->contact_system[$key];
                    $newContactPoint->user_id = $newPatient->id;
                    $newContactPoint->value = $request->contact_value[$key];
                    $newContactPoint->use = $request->contact_use[$key];
                    $newContactPoint->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getMatchingPatients(Request $request)
    {
        $patientsByIdentifiers = User::query();
        foreach ($request->id_type as $key => $id_type) {
            $patientsByIdentifiers->getByIdentifier(
                $request->id_value[$key],
                $id_type
            );
        }

        $patientsByHumanNames = User::query();
        $patientsByHumanNames->getByHumanName(
            $request->text,
            $request->fathers_family,
            $request->mothers_family
        );

        $patientsByAddress = User::query();
        foreach ($request->address_use as $key => $address_use) {
            $patientsByAddress->getByAddress(
                $request->street_name[$key],
                $request->line[$key],
                $request->address_apartment,
                $request->country,
                $request->district,
                $request->state
            );
        }

        $patientsByContactPoint = User::query();
        foreach ($request->contact_system as $key => $contact_system) {
            $patientsByContactPoint->getByContactPoint($request->contact_value[$key]);
        }

        $allPatients = $patientsByIdentifiers->get()
            ->merge($patientsByAddress->get())
            ->merge($patientsByHumanNames->get())
            ->merge($patientsByContactPoint->get());

        return $allPatients;
    }

    public function show($id)
    {
        $patient = User::find($id);
        return view('patients.show', compact('patient'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $patient = User::find($id);
        $maritalStatus = CodConMarital::all();
        $countries = Country::all();
        $communes = Commune::all();
        $regions = Region::all();
        $congregations = Congregation::all();
        $identifierTypes = CodConIdentifierType::all();
        return view('patients.edit', compact('patient', 'countries', 'communes', 'regions', 'maritalStatus', 'identifierTypes', 'congregations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            // dd($request);
            $patient = User::find($id);
            $patient->fill($request->all());

            //HUMAN NAMES
            $actualOfficialHumanName = $patient->actualOfficialHumanName;

            if (
                $actualOfficialHumanName->use != $request->human_name_use ||
                $actualOfficialHumanName->text != $request->text ||
                $actualOfficialHumanName->fathers_family != $request->fathers_family ||
                $actualOfficialHumanName->mothers_family != $request->mothers_family
            ) {
                $newHumanName = new HumanName($request->all());
                $newHumanName->use = $request->human_name_use;
                $newHumanName->user_id = $patient->id;
                $newHumanName->save();
            }

            //USER ID
            $storedUserIds = $patient->identifiers->pluck('id')->toArray();
            if ($request->has('id_type')) {
                //foreach para actualizar/agregar identifiers
                foreach ($request->id_type as $key => $id_type) {
                    if ($request->identifier_id[$key] == null) {
                        $newIdentifier = new Identifier();
                        $newIdentifier->user_id = $patient->id;
                        $newIdentifier->use = $request->id_use[$key];
                        $newIdentifier->cod_con_identifier_type_id = $request->id_type[$key];
                        $newIdentifier->value = $request->id_value[$key];
                        $newIdentifier->dv = $request->id_dv[$key];
                        $newIdentifier->save();
                    } elseif (in_array($request->identifier_id[$key], $storedUserIds)) {
                        $identifier = Identifier::find($request->identifier_id[$key]);
                        $identifier->user_id = $patient->id;
                        $identifier->use = $request->id_use[$key];
                        $identifier->cod_con_identifier_type_id = $request->id_type[$key];
                        $identifier->value = $request->id_value[$key];
                        $identifier->dv = $request->id_dv[$key];
                        $identifier->save();
                    }
                }
                //foreach para eliminar identificadores
                foreach ($storedUserIds as $key => $storedUserId) {
                    if (!in_array($storedUserId, $request->identifier_id)) {
                        $identifier = Identifier::find($storedUserId);
                        $identifier->delete();
                    }
                }
            }

            //ADDRESSES
            $storedAddressIds = $patient->addresses->pluck('id')->toArray();
            if ($request->has('address_use')) {
                //forearch para actualizar/agregar direcciones
                foreach ($request->address_use as $key => $address_use) {
                    if ($request->address_id[$key] == null) {
                        $newAddress = new Address();
                        $newAddress->user_id = $patient->id;
                        $newAddress->use = $request->address_use[$key];
                        $newAddress->type = 'physical';
                        $newAddress->text = $request->street_name[$key];
                        $newAddress->line = $request->line[$key];
                        $newAddress->apartment = $request->address_apartment[$key];
                        $newAddress->suburb = $request->suburb[$key];
                        $newAddress->city = $request->city[$key];
                        $newAddress->commune_id = $request->district[$key];
                        $newAddress->region_id = $request->state[$key];
                        $newAddress->country_id = $request->country[$key];
                        $newAddress->save();
                    } elseif (in_array($request->address_id[$key], $storedAddressIds)) {
                        $address = Address::find($request->address_id[$key]);
                        $address->user_id = $patient->id;
                        $address->use = $request->address_use[$key];
                        $address->type = 'physical';
                        $address->text = $request->street_name[$key];
                        $address->line = $request->line[$key];
                        $address->apartment = $request->address_apartment[$key];
                        $address->suburb = $request->suburb[$key];
                        $address->city = $request->city[$key];
                        $address->commune_id = $request->district[$key];
                        $address->region_id = $request->state[$key];
                        $address->country_id = $request->country[$key];
                        $address->save();
                    }
                }

                //foreach para eliminar direcciones
                foreach ($storedAddressIds as $key => $storedAddressId) {
                    if (!in_array($storedAddressId, $request->address_id)) {
                        $address = Address::find($storedAddressId);
                        $address->delete();
                    }
                }
            }

            //CONTACT
            $storedContactIds = $patient->contactPoints->pluck('id')->toArray();
            if ($request->has('contact_system')) {
                //forearch para actualizar/agregar contactos
                foreach ($request->contact_system as $key => $contact_system) {
                    if ($request->contact_point_id[$key] == null) {
                        $newContactPoint = new ContactPoint();
                        $newContactPoint->system = $request->contact_system[$key];
                        $newContactPoint->user_id = $patient->id;
                        $newContactPoint->value = $request->contact_value[$key];
                        $newContactPoint->use = $request->contact_use[$key];
                        $newContactPoint->save();
                    } elseif (in_array($request->contact_point_id[$key], $storedContactIds)) {
                        $contactPoint = ContactPoint::find($request->contact_point_id[$key]);
                        $contactPoint->system = $request->contact_system[$key];
                        $contactPoint->user_id = $patient->id;
                        $contactPoint->value = $request->contact_value[$key];
                        $contactPoint->use = $request->contact_use[$key];
                        $contactPoint->save();
                    }
                }
                //foreach para eliminar contactos
                foreach ($storedContactIds as $key => $storedContactId) {
                    if (!in_array($storedContactId, $request->contact_point_id)) {
                        $contactPoint = ContactPoint::find($storedContactId);
                        $contactPoint->delete();
                    }
                }
            }

            $patient->save();
            Db::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'El paciente ' . $patient->officialFullName . ' ha sido actualizado.');
        return view('patients.show', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
