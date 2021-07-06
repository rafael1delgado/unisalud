<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\ContactPoint;

class UserContactPoints extends Component
{
    public $inputs = [];
    public $i = 1;
    public $patient;
    public $contactPoints = [];

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

    public function mount()
    {
        //Agrega inputs según cantidad de contactPoints que tenga
        if ($this->patient && $this->patient->contactPoints()->count() > 0) {
            for ($i = 0; $i < $this->patient->contactPoints()->count(); $i++) {
                $this->add($i);
            }
        } else {
            $this->add(1);
        }

        // Agrega contactPoints al editar
        if ($this->patient && $this->patient->contactPoints()->count() > 0) {
            foreach ($this->inputs as $key => $value) {
                $this->contactPoints[$value]['id'] = $this->patient->contactPoints->slice($key, 1)->first()->id;
                $this->contactPoints[$value]['system'] = $this->patient->contactPoints->slice($key, 1)->first()->system;
                $this->contactPoints[$value]['value'] = $this->patient->contactPoints->slice($key, 1)->first()->value;
                $this->contactPoints[$value]['use'] = $this->patient->contactPoints->slice($key, 1)->first()->use;
                $this->contactPoints[$value]['actually'] = $this->patient->contactPoints->slice($key, 1)->first()->actually;
            }
        }
    
        if (old('contact_value')) {
            foreach ($this->inputs as $key => $value) {
               // $this->contactPoints[$value]['system'] = old('system.'.$key);
               // $this->contactPoints[$value]['use'] = old('use.'.$key);
                $this->contactPoints[$value]['value'] = old('contact_value.'.$key);
            }
        }
    }
    public function setActuallyContact($index){
            // foreach ($this->inputs as $key => $value) {
            //     $fContact  =  ContactPoint::find($this->contactPoints[$value]["id"]);
            //     if(isset($fContact)  && $fContact!=""){
            //         if($fContact->id == $this->contactPoints[$index]["id"]){
                        
            //             $fContact->actually = 1;

            //         }else{
                        
            //             $fContact->actually = 0;

            //         }
            //     $fContact->update();
            //     }
            //  }
            }



    public function render()
    {
        return view('livewire.user.user-contact-points');
    }
}
