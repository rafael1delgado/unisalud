<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CodConMarital;
use App\Models\Commune;
use App\Models\ContactPoint;
use App\Models\Country;
use App\Models\HumanName;
use App\Models\Region;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
Use App\Traits\GoogleToken;

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
        /* Obtener pacientes desde Fhir (cambiado por livewire) */
        // $url = $this->getUrlBase().'Patient';
        // $response = Http::withToken($this->getToken())->get($url)->json();
        // $patients = $response['entry'];

        return view('patients.index');
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        $valueSetUrl = 'http://fhir-ssiq.cens.cl/ssiq/fhir/';
//
//        /* Nivel de Instrucción */
//        // $url = $this->getUrlBase().'ValueSet/instruction-level';
//        $url = $valueSetUrl.'ValueSet/instruction-level';
//        $response = Http::withToken($this->getToken())->get($url);
//        $instructionLevel = $response->json()['compose']['include'][0]['concept'];
//
//        /* Identidad de genero */
//        // $url = $this->getUrlBase().'ValueSet/gender-identity';
//        $url = $valueSetUrl.'ValueSet/gender-identity';
//        $response = Http::withToken($this->getToken())->get($url);
//        $genderIdentities = $response->json()['compose']['include'][0]['concept'];
//
//        /* Genero */
//        // $url = $this->getUrlBase().'ValueSet/administrative-gender';
//        $url = $valueSetUrl.'ValueSet/administrative-gender';
//        $response = Http::withToken($this->getToken())->get($url);
//        $administrativeGenders = $response->json()['compose']['include'][0]['concept'];
//
//        /* Previsión */
//        // $url = $this->getUrlBase().'ValueSet/health-insurance';
//        $url = $valueSetUrl.'ValueSet/health-insurance';
//        $response = Http::withToken($this->getToken())->get($url);
//        $previciones = $response->json()['compose']['include'][0]['concept'];
//
//        /* Comunas */
//        // $url = $this->getUrlBase().'ValueSet/commune';
//        $url = $valueSetUrl.'ValueSet/commune';
//        $response = Http::withToken($this->getToken())->get($url);
//        $communes = $response->json()['compose']['include'][0]['concept'];
//
//        /* Regiones */
//        // $url = $this->getUrlBase().'ValueSet/region';
//        $url = $valueSetUrl.'ValueSet/region';
//        $response = Http::withToken($this->getToken())->get($url);
//        $regions = $response->json()['compose']['include'][0]['concept'];
//
//        /* Pueblos originarios */
//        // $url = $this->getUrlBase().'ValueSet/aboriginal-community';
//        $url = $valueSetUrl.'ValueSet/aboriginal-community';
//        $response = Http::withToken($this->getToken())->get($url);
//        $aboriginals = $response->json()['compose']['include'][0]['concept'];
//
//        /* Vias de acceso */
//        // $url = $this->getUrlBase().'ValueSet/street-type';
//        $url = $valueSetUrl.'ValueSet/street-type';
//        $response = Http::withToken($this->getToken())->get($url);
//        $streetTypes = $response->json()['compose']['include'][0]['concept'];
//
//        /* Estado civil */
//        // $url = $this->getUrlBase().'ValueSet/marital-status';
//        $url = $valueSetUrl.'ValueSet/marital-status';
//        $response = Http::withToken($this->getToken())->get($url);
//        $maritalStatus = $response->json()['compose']['include'][0]['concept'];
//
//        /*
//        https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/health-insurance
//        https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/religious-affiliation
//        */
//        return view('patients.create', compact('instructionLevel',
//            'genderIdentities','previciones','communes','regions','aboriginals',
//            'streetTypes','maritalStatus'));
//    }

    public function create()
    {
        $maritalStatus = CodConMarital::all();
        $countries = Country::all();
        $communes = Commune::all();
        $regions = Region::all();
        return view('patients.create', compact('maritalStatus', 'countries', 'communes', 'regions'));
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
            // $newPatient->identifier = 1;
            $newPatient->active = 1;
            $newPatient->save();
            $newHumanName = new HumanName($request->all());
            $newHumanName->use = 'official';
            $newHumanName->user_id = $newPatient->id;
            $newHumanName->save();

            if ($request->has('address_type')) {
                foreach ($request->address_type as $key => $address_type) {
                    $newAddress = new Address();
                    $newAddress->user_id = $newPatient->id;
                    $newAddress->use = $request->address_type[$key];
                    $newAddress->type = 'physical';
                    $newAddress->text = $request->street_name[$key];
                    $newAddress->line = $request->line[$key];
                    $newAddress->apartment = $request->address_apartment[$key];
                    $newAddress->suburb = $request->poblacion[$key];
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


//    public function store(Request $request)
//    {
//        /* Url para el post de pacientes */
//        $url = $this->getUrlBase().'Patient';
//
//        /* Descomponer el nombre y nacionalidad en un array */
//        $array_name = explode(' ', $request->input('name'));
//        $array_nationality = explode('-', $request->input('nacionality'));
//
//        /* Crear el array $data con el formato del json para insertar el paciente */
//        $data = [
//            'meta' => [
//                'profile' => [
//                  0 => 'http://ssiq.cens.cl/fhir/StructureDefinition/SSIQPatient',
//                ],
//              ],
//            'identifier' => [
//                    0 => [
//                          'use' => 'usual',
//                          'type' => [
//                                'coding' => [
//                                      0 => [
//                                            'system' => 'http://terminology.hl7.org/CodeSystem/v2-0203',
//                                            'code' => $request->input('id_type'),
//                                      ],
//                                ],
//                          ],
//                          'value' => $request->input('identifier'),
//                    ],
//                 ],
//                 'name' => [
//                    0 => [
//                      'use' => 'official',
//                      'text' => $request->input('name').' '.$request->input('fathers_family').' '.$request->input('mothers_family'),
//                      '_family' => [
//                        'extension' => [
//                          0 => [
//                            'url' => 'http://hl7.org/fhir/StructureDefinition/humanname-fathers-family',
//                            'valueString' => $request->input('fathers_family'),
//                          ],
//                          1 => [
//                            'url' => 'http://hl7.org/fhir/StructureDefinition/humanname-mothers-family',
//                            'valueString' => $request->input('mothers_family'),
//                          ],
//                        ],
//                      ],
//                      'given' => [
//                        0 => $request->input('name'),
//                      ],
//                    ],
//                  ],
//            'telecom' => [
//                    0 => [
//                          'system' => $request->input('phone1System'),
//                          'value' => $request->input('phone1'),
//                          'use' => 'home',
//                    ],
//                    1 => [
//                          'system' => 'email',
//                          'value' => $request->input('email'),
//                          'use' => 'work',
//                    ],
//              ],
//                 'gender' => $request->input('gender'),
//                 'birthDate' => $request->input('birthdate'),
//                 'resourceType' => 'Patient',
//            'address' => [
//                    0 => [
//                          'use' => $request->input('addressType'),
//                        //   'text' => 'South Beach 69 Depto. 1305 Miami',
//                          'text' => $request->input('streetName').' '.$request->input('addressNumber').($request->input('addressApartament') ? ' Depto. '.$request->input('addressApartament') : ' ').$request->input('poblacion'),
//                          'line' => [
//                                0 => [
//                                  'extension' => [
//                                        0 => [
//                                              'url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-streetName',
//                                              'valueString' => $request->input('streetName'),
//                                        ],
//                                        1 => [
//                                              'url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-houseNumber',
//                                              'valueString' => $request->input('addressNumber'),
//                                        ],
//                                        2 => [
//                                              'url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-additionalLocator',
//                                              'valueString' => $request->input('addressApartament'),
//                                        ],
//                                        3 => [
//                                              'url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-streetAddressLine',
//                                              'valueString' => $request->input('poblacion'),
//                                        ],
//                                        4 => [
//                                              'url' => 'http://hl7.org/fhir/StructureDefinition/iso21090-ADXP-streetNameType',
//                                              'valueString' => $request->input('streeNameType'),
//                                        ],
//                                  ],
//                                ],
//                    ],
//                          'city' => $request->input('city'),
//                          'district' => $request->input('district'),
//                          'state' => $request->input('state'),
//                    ],
//              ],
//            //   'maritalStatus' => [
//            //     'coding' => [
//            //       0 => [
//            //         'system' => 'http://terminology.hl7.org/CodeSystem/v3-MaritalStatus',
//            //         'code' => 'S',
//            //         'display' => 'Never Married',
//            //       ],
//            //     ],
//            //     'text' => 'Single',
//            //   ],
//              'extension' => [
//                0 => [
//                  'url' => 'http://hl7.org/fhir/StructureDefinition/patient-genderIdentity',
//                  'valueCodeableConcept' => [
//                    'coding' => [
//                      0 => [
//                        'system' => 'http://hl7.org/fhir/gender-identity',
//                        'code' => $request->input('gender_identity'),
//                        'display' => $request->input('gender_identity'),
//                      ],
//                    ],
//                  ],
//                ],
//                1 => [
//                  'url' => 'http://hl7.org/fhir/StructureDefinition/patient-nationality',
//                  'extension' => [
//                    0 => [
//                      'url' => 'code',
//                      'valueCodeableConcept' => [
//                        'coding' => [
//                          0 => [
//                            'code' => $array_nationality[0],
//                            'display' => $array_nationality[1],
//                          ],
//                        ],
//                      ],
//                    ],
//                  ],
//                ],
//                2 => [
//                  'url' => 'https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/health-insurance',
//                  'valueCoding' => [
//                    'system' => 'https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/health-insurance',
//                    'code' => $request->input('prevision'),
//                  ],
//                ],
//                // 3 => [
//                //   'url' => 'https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/religious-affiliation',
//                //   'valueCodeableConcept' => [
//                //     'coding' => [
//                //       0 => [
//                //         'system' => '#',
//                //         'code' => '1',
//                //         'display' => 'católico',
//                //       ],
//                //     ],
//                //   ],
//                // ],
//              ],
//            ];
//
//        /* Nueva estructura data */
//        $data = [
//          'address' => [
//            0 => [
//              'text' => $request->input('streetName').' '.$request->input('addressNumber').($request->input('addressApartament') ? ' Depto. '.$request->input('addressApartament').', ' : ' ').$request->input('poblacion'),
//            ],
//          ],
//          'birthDate' => $request->input('birthdate'),
//          'extension' => [
//            0 => [
//              'url' => 'https://fhir-ssiq.cens.cl/ssiq/fhir/ValueSet/health-insurance',
//              'valueString' => $request->input('prevision'),
//            ],
//          ],
//          'gender' => $request->input('gender'),
//          'identifier' => [
//            0 => [
//              'use' => 'usual',
//                          'type' => [
//                                'coding' => [
//                                      0 => [
//                                            'system' => 'http://terminology.hl7.org/CodeSystem/v2-0203',
//                                            'code' => $request->input('id_type'),
//                                      ],
//                                ],
//                          ],
//              'value' => $request->input('identifier'),
//            ],
//          ],
//          'name' => [
//            0 => [
//              '_family' => [
//                'extension' => [
//                  0 => [
//                    'url' => 'http://hl7.org/fhir/StructureDefinition/humanname-fathers-family',
//                    'valueString' => $request->input('fathers_family'),
//                  ],
//                  1 => [
//                    'url' => 'http://hl7.org/fhir/StructureDefinition/humanname-mothers-family',
//                    'valueString' => $request->input('mothers_family'),
//                  ],
//                ],
//              ],
//              'given' => [
//                0 => $request->input('name'),
//              ],
//              'text' => $request->input('name').' '.$request->input('fathers_family').' '.$request->input('mothers_family'),
//              'use' => 'official',
//            ],
//          ],
//          'resourceType' => 'Patient',
//        ];
//
//        // dd(json_encode($data));
//        $response = Http::withToken($this->getToken())->post($url, $data);
//
//        return redirect()->route('patient.index');
//    }




//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        $url = $this->getUrlBase().'Patient/'.$id;
//        $patient = Http::withToken($this->getToken())->get($url)->json();
//
//        return view('patients.show', compact('patient'));
//    }

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
        return view('patients.edit', compact('patient', 'countries', 'communes', 'regions', 'maritalStatus'));
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
        //
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
