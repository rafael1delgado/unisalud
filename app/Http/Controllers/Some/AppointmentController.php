<?php

namespace App\Http\Controllers\Some;

use App\Http\Controllers\Controller;
use App\Models\MedicalProgrammer\TheoreticalProgramming;
use App\Models\User;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('some.appointment');
    }

    public function openAgenda($from, $to)
    {
        $theoreticalProgramming = TheoreticalProgramming::query()
//            ->where('start_date', $from)
//            ->where('end_date', $to)

            ->get();

        dd($theoreticalProgramming);

    }

    public function openTProgrammerView(Request $request){
      $theoreticalProgrammings = null;

      if($request){
        if ($request->user_id != null) {
          // $monday = Carbon::parse($request->date)->startOfWeek();
          // $sunday = Carbon::parse($request->date)->endOfWeek();
          $theoreticalProgrammings = TheoreticalProgramming::where('user_id',$request->user_id)
                                                           // ->whereBetween('start_date',[$monday,$sunday])
                                                           ->get();
                                                           // dd($request->user_id, $theoreticalProgrammings);
        }
      }

      return view('some.open_tprogrammer',compact('request','theoreticalProgrammings'));
    }
}
