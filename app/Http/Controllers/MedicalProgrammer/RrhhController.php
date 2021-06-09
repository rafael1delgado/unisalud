<?php

namespace App\Http\Controllers\MedicalProgrammer;

// use App\Models\MedicalProgrammer\Rrhh;
use App\Models\User;
use App\Models\HumanName;
use App\Models\Identifier;
use App\Models\MedicalProgrammer\Service;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\OperatingRoom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RrhhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $rrhh = Rrhh::orderBy('name','ASC')->get();
        $rrhh = User::all();
        return view('medical_programmer.rrhh.index', compact('rrhh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::OrderBy('name')->get();
        // $roles = Role::OrderBy('name')->get();
        $specialties = Specialty::OrderBy('specialty_name')->get();
        $professions = Profession::OrderBy('profession_name')->get();
        $operating_rooms = OperatingRoom::OrderBy('id')->where('description','LIKE', 'Box%')->get();
        $services = Service::OrderBy('service_name')->get();
        return view('medical_programmer.rrhh.create', compact('permissions','specialties','professions','operating_rooms','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // //se crea usuario si se solicita
      // if ($request->user_create) {
      //     if (User::where('id',$request->rut)->count() == 0) {
      //         $user = new User($request->All());
      //         $user->id = $request->rut;
      //         $user->name = $request->name . " " . $request->fathers_family . " " . $request->mothers_family;
      //         $user->password = bcrypt($request->fathers_family);;
      //         $user->save();
      //         session()->flash('info', 'El recurso humano y el usuario han sido creados.');
      //     }else{
      //         session()->flash('info', 'El recurso humano ha sido creado. Ya existe el usuario para este RRHH.');
      //     }
      // }
      // else{
      //     session()->flash('info', 'El recurso humano ha sido creado.');
      // }
      //
      // //se crea recurso humano
      // $rrhh = new User($request->All());
      // $rrhh->save();

      DB::beginTransaction();
      try {
          $newPatient = new User($request->all());
          $newPatient->active = 1;
          $newPatient->save();
          $newHumanName = new HumanName($request->all());
          $newHumanName->use = "official";
          $newHumanName->user_id = $newPatient->id;
          $newHumanName->save();

          $newIdentifier = new Identifier($request->all());
          $newIdentifier->user_id = $newPatient->id;
          $newIdentifier->use = "official";
          $newIdentifier->cod_con_identifier_type_id = 1;
          $newIdentifier->save();

          // if ($request->has('address_use')) {
          //     foreach ($request->address_use as $key => $address_use) {
          //         $newAddress = new Address();
          //         $newAddress->user_id = $newPatient->id;
          //         $newAddress->use = $request->address_use[$key];
          //         $newAddress->type = 'physical';
          //         $newAddress->text = $request->street_name[$key];
          //         $newAddress->line = $request->line[$key];
          //         $newAddress->apartment = $request->address_apartment[$key];
          //         $newAddress->suburb = $request->suburb[$key];
          //         $newAddress->city = $request->city[$key];
          //         $newAddress->commune_id = $request->district[$key];
          //         $newAddress->region_id = $request->state[$key];
          //         $newAddress->country_id = $request->country[$key];
          //         $newAddress->save();
          //     }
          // }

          // if ($request->has('contact_system')) {
          //     foreach ($request->contact_system as $key => $contact_system) {
          //         $newContactPoint = new ContactPoint();
          //         $newContactPoint->system = $request->contact_system[$key];
          //         $newContactPoint->user_id = $newPatient->id;
          //         $newContactPoint->value = $request->contact_value[$key];
          //         $newContactPoint->use = $request->contact_use[$key];
          //         $newContactPoint->save();
          //     }
          // }

          DB::commit();
          session()->flash('success', 'El usuario ha sido creado.');

      } catch (\Exception $e) {
          DB::rollBack();
          throw $e;
      }

      return redirect()->route('medical_programmer.rrhh.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = User::where('id',$user->id)->count();
        $permissions = Permission::OrderBy('name')->get();
        // $roles = Role::OrderBy('name')->get();
        $specialties = Specialty::OrderBy('specialty_name')->get();
        $professions = Profession::OrderBy('profession_name')->get();
        $operating_rooms = OperatingRoom::OrderBy('id')->where('description','LIKE', 'Box%')->get();
        $services = Service::OrderBy('service_name')->get();
        // dd($permissions, $roles, $specialties, $professions, $operating_rooms, $services);
        return view('medical_programmer.rrhh.edit', compact('user','permissions','specialties','professions','operating_rooms', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // // //se crea usuario si se solicita
        // // if ($request->user_edited) {
        // //     if (User::where('id',$request->rut)->count() == 0) {
        // //         $user = new User($request->All());
        // //         $user->id = $request->rut;
        // //         $user->name = $request->name . " " . $request->fathers_family . " " . $request->mothers_family;
        // //         $user->password = bcrypt($request->fathers_family);;
        // //         $user->save();
        // //         session()->flash('info', 'El recurso humano ha sido editado y el usuario ha sido creado.');
        // //     }else{
        // //         $user = User::where('id',$request->rut)->first();
        // //         $user->fill($request->all());
        // //         $user->name = $request->name . " " . $request->fathers_family . " " . $request->mothers_family;
        // //         $user->save();
        // //         session()->flash('info', 'El recurso humano y el usuario han sido editados.');
        // //     }
        // // }else{
        // //     session()->flash('info', 'El recurso humano ha sido editado.');
        // // }
        //
        // //se crea rrhh
        // $rrhh->fill($request->all());
        // $rrhh->save();

        DB::beginTransaction();

        try {
            // $user = User::find($id);
            // $user->fill($request->all());

            //HUMAN NAMES
            $actualOfficialHumanName = $user->actualOfficialHumanName;

            if (
                $actualOfficialHumanName->text != $request->text ||
                $actualOfficialHumanName->fathers_family != $request->fathers_family ||
                $actualOfficialHumanName->mothers_family != $request->mothers_family
            ) {
                $newHumanName = new HumanName($request->all());
                $newHumanName->use = "Official";
                $newHumanName->user_id = $user->id;
                $newHumanName->save();
            }

            // //USER ID
            // $storedUserIds = $user->identifiers->pluck('id')->toArray();
            // if ($request->has('id_type')) {
            //     //foreach para actualizar/agregar identifiers
            //     foreach ($request->id_type as $key => $id_type) {
            //         if ($request->identifier_id[$key] == null) {
            //             $newIdentifier = new Identifier();
            //             $newIdentifier->user_id = $user->id;
            //             $newIdentifier->use = $request->id_use[$key];
            //             $newIdentifier->cod_con_identifier_type_id = $request->id_type[$key];
            //             $newIdentifier->value = $request->id_value[$key];
            //             $newIdentifier->dv = $request->id_dv[$key];
            //             $newIdentifier->save();
            //         } elseif (in_array($request->identifier_id[$key], $storedUserIds)) {
            //             $identifier = Identifier::find($request->identifier_id[$key]);
            //             $identifier->user_id = $user->id;
            //             $identifier->use = $request->id_use[$key];
            //             $identifier->cod_con_identifier_type_id = $request->id_type[$key];
            //             $identifier->value = $request->id_value[$key];
            //             $identifier->dv = $request->id_dv[$key];
            //             $identifier->save();
            //         }
            //     }
            //     //foreach para eliminar identificadores
            //     foreach ($storedUserIds as $key => $storedUserId) {
            //         if (!in_array($storedUserId, $request->identifier_id)) {
            //             $identifier = Identifier::find($storedUserId);
            //             $identifier->delete();
            //         }
            //     }
            // }

            // //ADDRESSES
            // $storedAddressIds = $user->addresses->pluck('id')->toArray();
            // if ($request->has('address_use')) {
            //     //forearch para actualizar/agregar direcciones
            //     foreach ($request->address_use as $key => $address_use) {
            //         if ($request->address_id[$key] == null) {
            //             $newAddress = new Address();
            //             $newAddress->user_id = $user->id;
            //             $newAddress->use = $request->address_use[$key];
            //             $newAddress->type = 'physical';
            //             $newAddress->text = $request->street_name[$key];
            //             $newAddress->line = $request->line[$key];
            //             $newAddress->apartment = $request->address_apartment[$key];
            //             $newAddress->suburb = $request->suburb[$key];
            //             $newAddress->city = $request->city[$key];
            //             $newAddress->commune_id = $request->district[$key];
            //             $newAddress->region_id = $request->state[$key];
            //             $newAddress->country_id = $request->country[$key];
            //             $newAddress->save();
            //         } elseif (in_array($request->address_id[$key], $storedAddressIds)) {
            //             $address = Address::find($request->address_id[$key]);
            //             $address->user_id = $user->id;
            //             $address->use = $request->address_use[$key];
            //             $address->type = 'physical';
            //             $address->text = $request->street_name[$key];
            //             $address->line = $request->line[$key];
            //             $address->apartment = $request->address_apartment[$key];
            //             $address->suburb = $request->suburb[$key];
            //             $address->city = $request->city[$key];
            //             $address->district = $request->district[$key];
            //             $address->state = $request->state[$key];
            //             $address->country = $request->country[$key];
            //             $address->save();
            //         }
            //     }
            //
            //     //foreach para eliminar direcciones
            //     foreach ($storedAddressIds as $key => $storedAddressId) {
            //         if (!in_array($storedAddressId, $request->address_id)) {
            //             $address = Address::find($storedAddressId);
            //             $address->delete();
            //         }
            //     }
            // }

            // //CONTACT
            // $storedContactIds = $user->contactPoints->pluck('id')->toArray();
            // if ($request->has('contact_system')) {
            //     //forearch para actualizar/agregar contactos
            //     foreach ($request->contact_system as $key => $contact_system) {
            //         if ($request->contact_point_id[$key] == null) {
            //             $newContactPoint = new ContactPoint();
            //             $newContactPoint->system = $request->contact_system[$key];
            //             $newContactPoint->user_id = $user->id;
            //             $newContactPoint->value = $request->contact_value[$key];
            //             $newContactPoint->use = $request->contact_use[$key];
            //             $newContactPoint->save();
            //         } elseif (in_array($request->contact_point_id[$key], $storedContactIds)) {
            //             $contactPoint = ContactPoint::find($request->contact_point_id[$key]);
            //             $contactPoint->system = $request->contact_system[$key];
            //             $contactPoint->user_id = $user->id;
            //             $contactPoint->value = $request->contact_value[$key];
            //             $contactPoint->use = $request->contact_use[$key];
            //             $contactPoint->save();
            //         }
            //     }
            //     //foreach para eliminar contactos
            //     foreach ($storedContactIds as $key => $storedContactId) {
            //         if (!in_array($storedContactId, $request->contact_point_id)) {
            //             $contactPoint = ContactPoint::find($storedContactId);
            //             $contactPoint->delete();
            //         }
            //     }
            // }

            $user->save();
            Db::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'El paciente ' . $user->officialFullName . ' ha sido actualizado.');

        return redirect()->route('medical_programmer.rrhh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      //se elimina la cabecera y detalles
      $user->humanNames()->delete();
      $user->identifiers()->delete();
      $user->delete();

      session()->flash('success', 'El recurso humano ha sido eliminado');
      return redirect()->route('medical_programmer.rrhh.index');
    }
}
