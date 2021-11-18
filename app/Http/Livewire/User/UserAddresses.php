<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Commune;
use App\Models\Address;

class UserAddresses extends Component
{
    public $i = -1;

    public $communes;
    public $regions;
    public $countries;
    public $patient;
    public $addresses = [];
    public $sic;

    public function add()
    {
        $this->i++;
        $this->addresses[$this->i]['address_use'] = 'home';
    }

    public function remove($i)
    {
        unset($this->addresses[$i]);
    }

    /**
     * Obtiene comunas cuando se selecciona región
     */
    public function getCommunes($value)
    {
        $this->communes = Commune::query()
            ->where('region_id', $this->addresses[$value]['state'])
            ->get();
    }

    public function mount()
    {
        //Agrega addresses según cantidad de direcciones que tenga
        if ($this->patient && $this->patient->addresses()->count() > 0) {
            for ($i = 0; $i < $this->patient->addresses()->count(); $i++) {
                $this->add();
            }
        } else {
            $this->add();
        }

        // Agrega address al editar
        if ($this->patient && $this->patient->addresses()->count() > 0) {
            foreach ($this->addresses as $key => $value) {
                $this->addresses[$key]['id'] = $this->patient->addresses->slice($key, 1)->first()->id;
                $this->addresses[$key]['address_use'] = $this->patient->addresses->slice($key, 1)->first()->use;
                $this->addresses[$key]['street_name'] = $this->patient->addresses->slice($key, 1)->first()->text;
                $this->addresses[$key]['line'] = $this->patient->addresses->slice($key, 1)->first()->line;
                $this->addresses[$key]['address_apartment'] = $this->patient->addresses->slice($key, 1)->first()->apartment;
                $this->addresses[$key]['suburb'] = $this->patient->addresses->slice($key, 1)->first()->suburb;
                $this->addresses[$key]['commune'] = $this->patient->addresses->slice($key, 1)->first()->commune_id;
                $this->addresses[$key]['state'] = $this->patient->addresses->slice($key, 1)->first()->region_id;
                $this->addresses[$key]['city'] = $this->patient->addresses->slice($key, 1)->first()->city;
                $this->addresses[$key]['country'] = $this->patient->addresses->slice($key, 1)->first()->country_id;
                $this->addresses[$key]['actually'] = $this->patient->addresses->slice($key, 1)->first()->actually;
            }
        }
        
        if(request()->session()->has('request_match')){
            $match_addresses = request()->session()->get('request_match');
            for($i = 0; $i < count($match_addresses['address_id']); $i++){
                $this->addresses[++$this->i] = [
                    'id' => $match_addresses['address_id'][$i],
                    'address_use' => $match_addresses['address_use'][$i],
                    'street_name' => $match_addresses['street_name'][$i], 
                    'line' => $match_addresses['line'][$i],
                    'address_apartment' => $match_addresses['address_apartment'][$i],
                    'suburb' => $match_addresses['suburb'][$i],
                    'commune' => $match_addresses['district'][$i],
                    'state' => $match_addresses['state'][$i],
                    'city' => $match_addresses['city'][$i],
                    'country' => $match_addresses['country'][$i]
                ];
                array_push($this->addresses, $this->i);
            }
        }

        if (old('street_name.0')) {
            foreach ($this->addresses as $key => $value) {
                $this->addresses[$value]['address_use'] = old('address_use.'.$key);
                $this->addresses[$value]['street_name'] = old('street_name.'.$key);
                $this->addresses[$value]['line'] = old('line.'.$key);
                $this->addresses[$value]['address_apartment'] = old('address_apartment.'.$key);
                $this->addresses[$value]['suburb'] =  old('suburb.'.$key);
                $this->addresses[$value]['state'] = old('state.'.$key);
                $this->addresses[$value]['commune'] = old('commune.'.$key);
                $this->addresses[$value]['city'] = old('city.'.$key);
                $this->addresses[$value]['country'] = old('country.'.$key);
            }
        }

        //Si existe SIC(Interconsulta), se carga info desde SIC.
        if($this->sic){
            foreach ($this->addresses as $key => $value) {
                // $this->addresses[$value]['id'] = $this->patient->addresses->slice($key, 1)->first()->id;
                $this->addresses[$key]['address_use'] = 'home';
                $this->addresses[$key]['street_name'] = $this->sic->patient_street_name;
                $this->addresses[$key]['line'] = $this->sic->patient_address;
                // $this->addresses[$value]['address_apartment'] = $this->patient->addresses->slice($key, 1)->first()->apartment;
                // $this->addresses[$value]['suburb'] = $this->patient->addresses->slice($key, 1)->first()->suburb;
                // $this->addresses[$value]['commune'] = $this->patient->addresses->slice($key, 1)->first()->commune_id;
                // $this->addresses[$value]['state'] = $this->patient->addresses->slice($key, 1)->first()->region_id;
                // $this->addresses[$value]['city'] = $this->patient->addresses->slice($key, 1)->first()->city;
                // $this->addresses[$value]['country'] = $this->patient->addresses->slice($key, 1)->first()->country_id;
                // $this->addresses[$value]['actually'] = $this->patient->addresses->slice($key, 1)->first()->actually;
            }
        }
    }
    public function setActuallyAddress($index){
        // $index);
       // dd( $this->addresses[$index] ) ;
         $log = "";

      // foreach ($this->addresses as $key => $value) {
      //    // $log .= $this->addresses[$value]['id']."||" ;
      //   $fAddress  =  Address::find($this->addresses[$value]["id"]);

      //    if(isset($fAddress)  && $fAddress!=""){
      //       if($fAddress->id == $this->addresses[$index]["id"]){
      //           $fAddress->actually = 1;

      //           $log .= "true";
      //       }else{
      //           $fAddress->actually = 0;

      //           $log .= "false";
      //       }
      //       $fAddress->update();
      //    }
      // }
       // dd($log);

    }
    public function render()
    {
        return view('livewire.user.user-addresses');
    }
}
