@extends('layouts.app')

@section('content')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Clonar período</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.clone.store') }}">
    @csrf
    @method('POST')
    <div class="row">
        <fieldset class="form-group col">
            <label for="for_user_id">Funcionario</label>
            <input type="text" class="form-control" id="search" name="" value="">
            <input type="hidden" name="user_id" id="user_id" value="">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_source_year">Año de origen</label>
            <select name="source_year" id="source_year" class="form-control selectpicker" required data-live-search="true" data-size="5">
              <option></option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_destination_year">Año de destino</label>
            <select name="destination_year" id="destination_year" class="form-control selectpicker" required data-live-search="true" data-size="5">
              <option></option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_destination_year">.</label>
            <button type="submit" class="form-control btn btn-primary mb-3"><i class="fas fa-plus"></i> Clonar período</button>
        </fieldset>
    </div>
</form>

@endsection

@section('custom_js')

<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src='{{asset('js/jquery-ui.min.js')}}'></script>
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">

<script>

$('#search').autocomplete({
   source: function(request, response){
	 $.ajax({
           url: "{{route('user.search_by_name')}}",
           dataType: 'json',
           async: false,
           data: {
             term: request.term
           },
           success: function(data){
             response(data)
	         }
   });
 },
  select: function(event, ui) {
     $("#user_id").val(ui.item.id)
  }
});


</script>

@endsection
