@extends('layouts.app')

@section('content')

<h3 class="mb-3">Programaciones por funcionario - año <b>{{ \Carbon\Carbon::now()->format('Y') }}</b> </h3>

<form method="GET" id="form" class="form-horizontal" action="{{ route('medical_programmer.programming_proposal.programming_by_practioner') }}">
    <div class="form-row">
      <div class="form-group col-md-9">
        @livewire('medical_programmer.select-med-prog-employee',['type'         => $request->type,
                                                                 'specialty_id' => $request->specialty_id,
                                                                 'profession_id'=> $request->profession_id,
                                                                 'user_id'      => $request->user_id])
      </div>

      <div class="form-group col-md-3">
        <label for="inputEmail4">&nbsp;</label>
        <button type="submit" class="btn btn-primary form-control">Buscar</button>
      </div>
    </div>
</form>

<hr>

<div class="row">

  @foreach($programmingProposals as $programmingProposal)
    <fieldset class="form-group col-{{12/$programmingProposals->count()}}">
      <div class="card">
        <div class="card-header">
          {{$programmingProposal->request_date->format('d-m-Y')}} - {{$programmingProposal->type}}
        </div>
        <ul class="list-group list-group-flush">
          @foreach($programmingProposal->array as $key => $detail)

            <li class="list-group-item">
              <div class="row">

                <fieldset class="col-9">
                  <input type="text" class="form-control" name="" value="{{$key}}" disabled>
                </fieldset>

                <fieldset class="form-group col-3">
                  <input type="text" class="form-control" name="" value="{{$detail}}" disabled>
                </fieldset>
              </div>

            </li>
          @endforeach
        </ul>
      </div>
    </fieldset>
  @endforeach
</div>



@endsection

@section('custom_js')

@endsection
