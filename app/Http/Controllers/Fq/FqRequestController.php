<?php

namespace App\Http\Controllers\Fq;

use App\Models\Fq\FqRequest;
use App\Models\Fq\ContactUser;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FqRequestController extends Controller
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

    public function own_index()
    {
        $contactUser = ContactUser::where('run', Auth::user()->run)->first();

        $my_reqs = FqRequest::where('contact_user_id', $contactUser->id)
            ->get();

        return view('fq.request.own_index', compact('my_reqs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactUser = ContactUser::where('run', Auth::user()->run)->first();
        return view('fq.request.create', compact('contactUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ContactUser $contactUser)
    {
        $req = new FqRequest($request->All());
        $req->contact_user_id = $contactUser->id;
        $req->status = 'pending';
        $req->save();

        session()->flash('success', 'Se ha creado la solicitud exitosamente');
        return redirect()->route('fq.request.own_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function show(FqRequest $fqRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(FqRequest $fqRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FqRequest $fqRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fq\FqRequest  $fqRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(FqRequest $fqRequest)
    {
        //
    }
}
