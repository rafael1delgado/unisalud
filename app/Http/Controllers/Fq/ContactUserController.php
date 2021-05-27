<?php

namespace App\Http\Controllers\Fq;

use App\Models\Fq\ContactUser;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fq.contact_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactUser = new ContactUser($request->All());
        $contactUser->telephone = '+56'.$contactUser->telephone;

        if($contactUser->telephone2){
            $contactUser->telephone2 = '+56'.$contactUser->telephone2;
        }

        $contactUser->save();

        // session()->flash('success', 'Se ha creado la solicitud exitosamente');
        // return redirect()->route('fq.request.own_index');
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
