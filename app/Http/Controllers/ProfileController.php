<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
Use App\Traits\GoogleToken;
use App\Models\User;

class ProfileController extends Controller
{
    use GoogleToken;

    public function login($run) {
        //if(env('APP_ENV') == 'local') {
            $user = User::find($run);
            auth()->login($user, true);
            return redirect()->route('home');
        //}
    }

    public function logout() {
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
        $url = $this->getUrlBase().'Patient/'.auth()->user()->fhir_id;
        $response = Http::withToken($this->getToken())->get($url);   
        $user = $response->json();
        session(['user' => $user]);
        return view('users.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = session('user');
        return view('users.profile.edit', compact('user'));
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
        $data = '[{
            "op": "replace",
            "path": "/birthDate",
            "value": "'.$request->input('birthDate').'"
        }]';
        $data = json_decode($data, true);
        $url = $this->getUrlBase().'Patient/'.auth()->user()->fhir_id;
        $response = Http::withHeaders(['Content-Type' => 'application/json-patch+json' ])
        ->withToken($this->getToken())
            ->patch($url,$data);
        return redirect()->back();
    }

}
