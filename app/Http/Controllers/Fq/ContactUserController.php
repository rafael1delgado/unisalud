<?php

namespace App\Http\Controllers\Fq;

use App\Models\Fq\ContactUser;
use App\Models\User;
use App\Models\Fq\FqPatient;
use App\Models\Fq\UserPatient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUsers = ContactUser::all();
        return view('fq.contact_user.index', compact('contactUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Limpia mensajes anteriores.
        //session()->flush();

        $contactUsers = ContactUser::all();
        $user = User::GetByRun($request->input('search'))->first();
        if($user == NULL && $request->input('search') != NULL){
            session()->flash('danger', 'El Paciente/Contacto no se encuentra en nuestros registros,
                                        Favor solicitar su ingreso en SOME');
        }

        return view('fq.contact_user.create', compact('request', 'user', 'contactUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $exist = ContactUser::where('user_id', $user->id)->first();

        if($exist){
            session()->flash('danger', 'El Contacto ya fue ingresado anteriormente.');
            return redirect()->route('fq.contact_user.create');
        }
        else{
            $contactUser = new ContactUser();
            $contactUser->user_id = $user->id;
            $contactUser->save();
            session()->flash('success', 'Se ha creado exitosamente el Contacto');
            return redirect()->route('fq.contact_user.create');
        }

        //$flight->restore();

        // $contactUser = new ContactUser($request->All());
        // $contactUser->telephone = '+56'.$contactUser->telephone;
        //
        // if($contactUser->telephone2){
        //     $contactUser->telephone2 = '+56'.$contactUser->telephone2;
        // }
        //
        // $contactUser->save();
        //
        // $fqPatient = new FqPatient();
        // $fqPatient->run = $request->run_patient;
        // $fqPatient->dv = $request->dv_patient;
        // $fqPatient->name = $request->name_patient;
        // $fqPatient->fathers_family = $request->fathers_family_patient;
        // $fqPatient->mothers_family = $request->mothers_family_patient;
        //
        // $fqPatient->clinical_history_number = $request->clinical_history_number;
        //
        // $fqPatient->email = $contactUser->email;
        // $fqPatient->telephone = $contactUser->telephone;
        // $fqPatient->telephone2 = $contactUser->telephone2;
        // $fqPatient->commune = $contactUser->commune;
        // $fqPatient->address = $contactUser->address;
        //
        // $fqPatient->observation = $request->observation;
        //
        // $fqPatient->save();
        //
        // $userPatient = new UserPatient();
        // $userPatient->contact_user_id = $contactUser->id;
        // $userPatient->patient_id = $fqPatient->id;
        //
        // $userPatient->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fq\ContactUser  $contactUser
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUser $contactUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fq\ContactUser  $contactUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUser $contactUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fq\ContactUser  $contactUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUser $contactUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fq\ContactUser  $contactUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUser $contactUser)
    {
        //
    }
}
