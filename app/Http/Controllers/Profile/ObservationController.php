<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
Use App\Traits\GoogleToken;
use Illuminate\Support\Facades\Storage;

class ObservationController extends Controller
{
    use GoogleToken;

    /**
     * Show observations from current auth.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener observations */
        $url = $this->getUrlBase().'Observation?subject='.auth()->user()->fhir_id;
        $response = Http::withToken($this->getToken())->get($url)->json();
        $observations = $response;
        return view('profiles.observations.index',compact('response'));
    }

    public function download($id) {
        return Storage::temporaryUrl('esmeralda/informs/'.$id.'.pdf', now()->addMinutes(5));
        //return $disk->download('esmeralda/informs/'.$id.'.pdf');
        //return Storage::download('file.jpg');
    }
}
