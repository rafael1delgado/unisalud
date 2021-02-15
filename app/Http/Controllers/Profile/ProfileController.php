<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
Use App\Traits\GoogleToken;
use App\Models\User;

class ProfileController extends Controller
{
    use GoogleToken;

    public function login($run) {
        if(env('APP_ENV') == 'local') {
            $user = User::find($run);
            if($user) {
                auth()->login($user, true);
                return redirect()->route('home');
            }
            else {
                die('No encuentro el rut en la BD');
            }
        }
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(auth()->user()->fhir_id){
            $url = $this->getUrlBase().'Patient/'.auth()->user()->fhir_id;
            $response = Http::withToken($this->getToken())->get($url);   
            $user = $response->json();
        }
        else {
            $user = false;
        }
        return view('profiles.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $i
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //$user = session('user');
        $url = $this->getUrlBase().'Patient/'.auth()->user()->fhir_id;
        $response = Http::withToken($this->getToken())->get($url);   
        $user = $response->json();
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fhir[0]['op'] = "replace";
        $fhir[0]['path'] = "/birthDate";
        //$fhir[0]['value'] = "2000-01-01";

        $fhir[0]['value'] = $request->input('birthDate');
        
        $url = $this->getUrlBase().'Patient/'.auth()->user()->fhir_id;
        $response = Http::withHeaders(['Content-Type'=>'application/json-patch+json'])
                        ->withToken($this->getToken())
                        ->patch($url,$fhir);

        return redirect()->back();
    }

}
