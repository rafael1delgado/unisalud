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
        $contactUsers = ContactUser::all();

        $user = User::getUserByRun($request->input('search'));

        if($user == NULL && $request->input('search') != NULL){
            session()->flash('danger', 'El Paciente/Contacto no se encuentra en nuestros registros,
                                        Favor solicitar su ingreso');
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

        //
        // $userPatient = new UserPatient();
        // $userPatient->contact_user_id = $contactUser->id;
        // $userPatient->patient_id = $fqPatient->id;
        //
        // $userPatient->save();


    }

    public function addPatient(Request $request, ContactUser $contactUser)
    {
        $user = User::getUserByRun($request->input('search'));

        return view('fq.contact_user.add_patient', compact('contactUser', 'request', 'user'));
    }

    public function storeAddPatient(ContactUser $contactUser, User $user)
    {
        $exist = UserPatient::where('contact_user_id', $contactUser->user_id)
            ->where('patient_id', $user->id)
            ->first();

        if($exist){
            session()->flash('danger', 'El Contacto ya fue ingresado anteriormente.');
            return redirect()->route('fq.contact_user.create');
        }
        else{
            $userPatient = new UserPatient();
            $userPatient->contact_user_id = $contactUser->user_id;
            $userPatient->patient_id = $user->id;

            $userPatient->save();
            session()->flash('success', 'El paciene fue asignado exitosamente.');
            return redirect()->route('fq.contact_user.create');
        }
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
