<?php

namespace App\Http\Controllers\MedicalProgrammer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\MedicalProgrammer\ProgrammingProposal;
use App\Models\MedicalProgrammer\ProgrammingProposalDetail;
use App\Models\MedicalProgrammer\Contract;

class ProgrammingProposalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProgrammingProposal $programmingProposal)
    {
        $contracts = Contract::where('user_id',$programmingProposal->user_id)->where('year',$programmingProposal->start_date->format('Y'))->get();
        return view('medical_programmer.programming_proposals.details.create',compact('programmingProposal','contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programmingProposalDetail = new ProgrammingProposalDetail($request->All());
        $programmingProposalDetail->save();


        session()->flash('success', 'Se ha registrado la información.');
        return redirect()->route('medical_programmer.programming_proposal.edit', $programmingProposalDetail->programmingProposal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
    public function destroy(ProgrammingProposalDetail $programmingProposalDetail)
    {
        $programmingProposalDetail->delete();
        $programmingProposalDetail->save();
        session()->flash('success', 'Se ha eliminado la información.');
        return redirect()->back();
    }
}
