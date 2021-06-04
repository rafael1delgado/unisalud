<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CodConIdentifierType;
use App\Models\CodConMarital;
use App\Models\Commune;
use App\Models\ContactPoint;
use App\Models\Country;
use App\Models\Etnia;
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
        $etnias = Etnia::all(); 
        $identifierTypes = CodConIdentifierType::all();
        return view('patients.create', compact('maritalStatus', 'countries', 'regions', 'identifierTypes', 'etnias'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $newPatient = new User($request->all());
            $newPatient->active = 1;
            $newPatient->save();
            $newHumanName = new HumanName($request->all());
            $newHumanName->use = 'official';
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
                    $newAddress->district = $request->district[$key];
                    $newAddress->state = $request->state[$key];
                    $newAddress->country = $request->country[$key];
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

        return redirect()->route('patient.index');
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
        $identifierTypes = CodConIdentifierType::all();
        return view('patients.edit', compact('patient', 'countries', 'communes', 'regions', 'maritalStatus', 'identifierTypes'));
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
            $patient = User::find($id);
            $patient->fill($request->all());

            $storedAddressIds = $patient->addresses->pluck('id')->toArray();
            if ($request->has('address_use')) {

                //forearch para actualizar/agregar
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
                        $newAddress->district = $request->district[$key];
                        $newAddress->state = $request->state[$key];
                        $newAddress->country = $request->country[$key];
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
                        $address->district = $request->district[$key];
                        $address->state = $request->state[$key];
                        $address->country = $request->country[$key];
                        $address->save();
                    }
                }

                //foreach para eliminar
                foreach ($storedAddressIds as $key => $storedAddressId) {
                    if (!in_array($storedAddressId, $request->address_id)) {
                        $address = Address::find($storedAddressId);
                        $address->delete();
                    }
                }
            }

            if ($request->has('contact_system')) {
                foreach ($request->contact_system as $key => $contact_system) {
                    $contactPoint = ContactPoint::find($request->contact_point_id[$key]);
                    $contactPoint->system = $request->contact_system[$key];
                    $contactPoint->user_id = $patient->id;
                    $contactPoint->value = $request->contact_value[$key];
                    $contactPoint->use = $request->contact_use[$key];
                    $contactPoint->save();
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
