<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Commune;
use App\Models\Address;

class UserAddresses extends Component
{
    public $inputs = [];
    public $i = 1;

    public $communes;
    public $regions;
    public $countries;
    public $patient;
    public $addresses = [];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
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
        //Agrega inputs según cantidad de direcciones que tenga
        if ($this->patient && $this->patient->addresses()->count() > 0) {
            for ($i = 0; $i < $this->patient->addresses()->count(); $i++) {
                $this->add($i);
            }
        } else {
            $this->add(1);
        }

        // Agrega address al editar
        if ($this->patient && $this->patient->addresses()->count() > 0) {
            foreach ($this->inputs as $key => $value) {
                $this->addresses[$value]['id'] = $this->patient->addresses->slice($key, 1)->first()->id;
                $this->addresses[$value]['address_use'] = $this->patient->addresses->slice($key, 1)->first()->use;
                $this->addresses[$value]['street_name'] = $this->patient->addresses->slice($key, 1)->first()->text;
                $this->addresses[$value]['line'] = $this->patient->addresses->slice($key, 1)->first()->line;
                $this->addresses[$value]['address_apartment'] = $this->patient->addresses->slice($key, 1)->first()->apartment;
                $this->addresses[$value]['suburb'] = $this->patient->addresses->slice($key, 1)->first()->suburb;
                $this->addresses[$value]['commune'] = $this->patient->addresses->slice($key, 1)->first()->commune_id;
                $this->addresses[$value]['state'] = $this->patient->addresses->slice($key, 1)->first()->region_id;
                $this->addresses[$value]['city'] = $this->patient->addresses->slice($key, 1)->first()->city;
                $this->addresses[$value]['country'] = $this->patient->addresses->slice($key, 1)->first()->country_id;
                $this->addresses[$value]['actually'] = $this->patient->addresses->slice($key, 1)->first()->actually;
            }
        }

//        dd(old('street_name.0'));

//        dd($this->inputs);

//        foreach (old('street_name') as $addressValue) {
//
//        }

        if (old('street_name.0')) {
            foreach ($this->inputs as $key => $value) {
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

    }
    public function setActuallyAddress($index){
        // $index);
       // dd( $this->addresses[$index] ) ;
         $log = "";

      // foreach ($this->inputs as $key => $value) {
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
