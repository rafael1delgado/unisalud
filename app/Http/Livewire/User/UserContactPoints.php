<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\ContactPoint;

class UserContactPoints extends Component
{
    public $i = -1;
    public $patient;
    public $contactPoints = [];
    public $sic;

    public function add()
    {
        $this->i++;
        $this->contactPoints[$this->i]['use'] = 'mobile';
        $this->contactPoints[$this->i]['system'] = 'phone';
    }

    public function remove($i)
    {
        unset($this->contactPoints[$i]);
    }

    public function mount()
    {
        //Agrega contactPoints según cantidad de contactPoints que tenga
        if ($this->patient && $this->patient->contactPoints()->count() > 0) {
            for ($i = 0; $i < $this->patient->contactPoints()->count(); $i++) {
                $this->add();
            }
        } else {
            $this->add();
        }

        // Agrega contactPoints al editar
        if ($this->patient && $this->patient->contactPoints()->count() > 0) {
            foreach ($this->contactPoints as $key => $value) {
                $this->contactPoints[$key]['id'] = $this->patient->contactPoints->slice($key, 1)->first()->id;
                $this->contactPoints[$key]['system'] = $this->patient->contactPoints->slice($key, 1)->first()->system;
                $this->contactPoints[$key]['value'] = $this->patient->contactPoints->slice($key, 1)->first()->value;
                $this->contactPoints[$key]['use'] = $this->patient->contactPoints->slice($key, 1)->first()->use;
                $this->contactPoints[$key]['actually'] = $this->patient->contactPoints->slice($key, 1)->first()->actually;
            }
        }

        if(request()->session()->has('request_match')){
            $match_contactPoints = request()->session()->get('request_match');
            for($i = 0; $i < count($match_contactPoints['contact_point_id']); $i++){
                $this->contactPoints[++$this->i] = [
                    'id' => $match_contactPoints['contact_point_id'][$i],
                    'system' => $match_contactPoints['contact_system'][$i],
                    'value' => $match_contactPoints['contact_value'][$i],
                    'use' => $match_contactPoints['contact_use'][$i]
                ];
                array_push($this->contactPoints, $this->i);
            }
        }
    
        if (old('contact_value')) {
            foreach ($this->contactPoints as $key => $value) {
                $this->contactPoints[$key]['system'] = old('contact_system.'.$key);
                $this->contactPoints[$key]['use'] = old('contact_use.'.$key);
                $this->contactPoints[$key]['value'] = old('contact_value.'.$key);
            }
        }


        // Agrega tiene sic, se carga info desde sic
        if ($this->sic) {
            // $this->contactPoints[$value]['id'] = $this->patient->contactPoints->slice($key, 1)->first()->id;
            $this->contactPoints[0]['system'] = 'phone';
            $this->contactPoints[0]['value'] = $this->sic->patient_phone_1;
            $this->contactPoints[0]['use'] = 'mobile';
            // $this->contactPoints[$value]['actually'] = true;

            if($this->sic->patient_phone_2){
                // $this->contactPoints[$value]['id'] = $this->patient->contactPoints->slice($key, 1)->first()->id;
                $this->contactPoints[1]['system'] = 'phone';
                $this->contactPoints[1]['value'] = $this->sic->patient_phone_2;
                $this->contactPoints[1]['use'] = 'home';
                // $this->contactPoints[$value]['actually'] = true;
            }

            if($this->sic->patient_email){
                // $this->contactPoints[$value]['id'] = $this->patient->contactPoints->slice($key, 1)->first()->id;
                $this->contactPoints[2]['system'] = 'email';
                $this->contactPoints[2]['value'] = $this->sic->patient_email;
                $this->contactPoints[2]['use'] = 'home';
                // $this->contactPoints[$value]['actually'] = true;
            }
        }

    }


    
    public function setActuallyContact($index){
            // foreach ($this->contactPoints as $key => $value) {
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
