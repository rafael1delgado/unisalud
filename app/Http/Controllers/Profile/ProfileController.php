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
        // return $this->getToken();
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
        // $fhir[0]['op'] = "replace";
        // $fhir[0]['path'] = "/birthDate";
        // $fhir[0]['value'] = $request->input('birthDate');
        // return $request;
        $maritalStatus = explode('|', $request->input('marital_status'));

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/maritalStatus/coding/0/code',
            'value' => $maritalStatus[0]
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/maritalStatus/coding/0/display',
            'value' => $maritalStatus[1]
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/maritalStatus/text',
            'value' => $maritalStatus[2]
        ];

        /* Se reconstruye la extension para _line */
        $fhir[] = [
            'op'    => 'remove',
            'path'  => '/address/0/_line/0',
        ];

        if(!empty($request->input('addressApartament'))){

        $fhir[] = [
            'op'    => 'add',
            'path'  => '/address/0/_line',
            'value' => [['extension' => [
                           ['url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-streetNameType',
                            'valueString' => $request->input('streeNameType')],
                           ['url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-streetName',
                            'valueString' => $request->input('streetName')],
                           ['url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-houseNumber',
                            'valueString' => $request->input('addressNumber')],     
                           ['url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-additionalLocator',
                            'valueString' => $request->input('addressApartament')]
                        ]
                       ]]
        ];

        }else{

        $fhir[] = [
            'op'    => 'add',
            'path'  => '/address/0/_line',
            'value' => [['extension' => [
                            ['url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-streetNameType',
                                'valueString' => $request->input('streeNameType')],
                            ['url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-streetName',
                                'valueString' => $request->input('streetName')],
                            ['url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-houseNumber',
                                'valueString' => $request->input('addressNumber')]
                        ]
                       ]]
        ];

        }

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/address/0/city',
            'value' => $request->input('city')
        ];
        
        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/address/0/district',
            'value' => $request->input('district')
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/address/0/text',
            'value' => $request->input('streeNameType').' '.$request->input('streetName').' #'.$request->input('addressNumber').($request->input('addressApartament') ? ' Depto. '.$request->input('addressApartament'). ', ' : ', ').$request->input('city').', '.$request->input('state').', '.$request->input('country'),
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/address/0/extension/0/extension/0/valueDecimal',
            'value' => (float) $request->input('latitud')
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/address/0/extension/0/extension/1/valueDecimal',
            'value' => (float) $request->input('longitud')
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/telecom/0/value',
            'value' => $request->input('phone1')
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/telecom/1/value',
            'value' => $request->input('phone2')
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/telecom/2/value',
            'value' => $request->input('email')
        ];
        
        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/telecom/3/value',
            'value' => $request->input('email2')
        ];

        $fhir[] = [
            'op'    => 'replace',
            'path'  => '/text/div',
            'value' => '<div xmlns="http://www.w3.org/1999/xhtml"><p><b>Nombre:</b> '.$request->input('name').' '.$request->input('fathers_family').' '.$request->input('mothers_family').' </p><ul><li><b>RUN:</b> '.$request->input('identifier').' </li></ul> <p><b>Sexo:</b> '.$request->input('gender').' </p><p><b>Fecha de nacimiento:</b> '.date('d-m-Y', strtotime($request->input('birthDate'))).' </p><b>Contacto:</b><ul><li><b>Teléfono móvil:</b> '.$request->input('phone1').' </li><li><b>Teléfono trabajo:</b> '.$request->input('phone2').' </li><li><b>Email personal:</b> '.$request->input('email').' </li><li><b>Email trabajo:</b> '.$request->input('email2').' </li></ul><b>Direcciones:</b><ul><li><b>Dirección Personal:</b> '.$request->input('streeNameType').' '.$request->input('streetName').' #'.$request->input('addressNumber').($request->input('addressApartament') ? ' Depto. '.$request->input('addressApartament'). ', ' : ', ').$request->input('city').', '.$request->input('state').', '.$request->input('country').' </li></ul></div>'
        ];

        // return $fhir;
        
        $url = $this->getUrlBase().'Patient/'.auth()->user()->fhir_id;
        $response = Http::withHeaders(['Content-Type'=>'application/json-patch+json'])
                        ->withToken($this->getToken())
                        ->patch($url,$fhir);

        // return $response;

        return $response->status() == 200 ? redirect()->back()->withSuccess('Perfil actualizado satisfactoriamente') : 
                                            redirect()->back()->withDanger('No se pudo actualizar su perfil. Contacte con el administrador');
    }

}
