<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\Event;
use App\Models\Some\Appointment;
use App\Models\Absence;
use App\Models\User;
use Carbon\Carbon;

class Jcalendar extends Component
{
    public $events = '';
    public $absences = '';
    public $title;
    public $dateStr;

    public $user_id;
    public $profession_id;
    public $specialty_id;

    public function getevent()
    {
        debug('getevent');
        // $events = Event::select('id','title','start','end')->get();

        $user_id = $this->user_id;
        $user = User::find($user_id);
        $specialty_id = $this->specialty_id;
        $profession_id = $this->profession_id;
        $events = Appointment::where('id',0)->get();
        $absences = Absence::where('id',0)->get();

        // se obtienen appointments segun parametros enviados
        if ($user != null) {
          if ($user->practitioners()->count() > 0) {
            $practitioner = $user->practitioners()->where('organization_id',4)
                                                  ->when($specialty_id != null, function ($query) use ($specialty_id) {
                                                      $query->where('specialty_id',$specialty_id);
                                                  })
                                                  ->when($profession_id != null, function ($query) use ($profession_id) {
                                                      $query->where('profession_id',$profession_id);
                                                  })
                                                  ->first();

            $events = $practitioner->appointments()->get();
          }

          $absences = Absence::where('user_id',$user_id)->get();
        }

        // se asigna título a eventos
        foreach ($events as $key => $event) {
          // que nombre se muestra
          if ($event->programmingProposalDetail->subactivity) {
            $event->title = $event->programmingProposalDetail->subactivity->sub_activity_name;
          }else{
            $event->title = $event->programmingProposalDetail->activity->activity_name;
          }

          // color del evento
          if ($event->status == "booked") {
            if ($event->cod_con_appointment_type_id == 4) {
              $event->color = 'gray';
            }
            else{
              $event->color = 'green';
            }
          }
          else{
            // $event->color = '';
          }
        }

        foreach ($absences as $key => $absence) {
          // $absence->start = $absence->start_date;
          // $absence->end = $absence->end_date;
          $absence->start = $absence->start_date->format('Y-m-d') . " 00:00:00";
          $absence->end = $absence->end_date->format('Y-m-d') . " 23:59:59";
          $absence->title = $absence->type;
          $absence->color = "#F5B7B1";
          $absence->editable = false;
        }

        // dd($events);
        $this->events = json_encode($events);
        $this->absences = json_encode($absences);
        debug($this->events);
    }

    public function mount()
    {
        $this->getevent();
    }

    public function resetdata()
    {
        $this->title = '';
        $this->dateStr = '';

    }
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function addevent($event = null)
    {
        debug('addevent');
        $input['title'] = $this->title;
        $input['start'] = Carbon::parse($this->dateStr);
        $input['end'] = Carbon::parse($this->dateStr)->addMinute('15');
        $event = Event::create($input);
        $this->getevent();
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function eventDrop($event, $oldEvent)
    {
        debug("eventDrop");

        // $eventdata = Event::find($event['id']);
        $eventdata = Appointment::find($event['id']);
        // $duration = $eventdata->duration;
        $duration = Carbon::parse($event['start'])->diffInMinutes(Carbon::parse($event['end']));
        $eventdata->start = Carbon::parse($event['start']);
        $eventdata->end = $eventdata->start->copy()->addMinutes($duration);
        $eventdata->save();
    }

    public function eventResize($event, $oldEvent)
    {
        debug("eventResize");
        // $eventdata = Event::find($event['id']);
        $eventdata = Appointment::find($event['id']);
        $eventdata->start = Carbon::parse($event['start']);
        $eventdata->end = Carbon::parse($event['end']);
        $eventdata->save();
    }

    public function loadmodal($event) {
        $this->title = $event['title'];
        $this->dateStr = $event['start'];
    }
    /**
    * Write code on Method
    *
    * @return response()
    */
    public function render()
    {
        debug("render");
        $this->emit('reloadEvents');
        return view('livewire.jcalendar');
    }
}
