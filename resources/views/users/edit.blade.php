@extends('layouts.app')

@section('title', 'Asignar permisos a usuario')

@section('content')

<h3 class="mb-3">Asignar permisos a: <strong> {{ $user->fullName }} </strong> </h3>

<form class="form-horizontal" method="POST" action="{{ route('user.update',$user) }}">
    @csrf
    @method('PUT')
	<input type="hidden" name="user_id" value="{{ $user->id }}">

	<div class="form-row">

		<div class="col">

			<h4>Permisos</h4>

			@php $anterior = null; @endphp
			@foreach($permissions as $permission)
				@if($permission->name != 'be god' AND $permission->name != 'I play with madness')
					@if( current(explode(':', $permission->name)) != current(explode(':', $anterior)))
						<hr>
						@php $anterior = $permission->name; @endphp
					@endif
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="permissions[]"
							value="{{ $permission->name }}" id="{{$permission->name}}"
							{{ $user->can($permission->name)? 'checked':'' }}>
						<label class="form-check-label" for="{{$permission->name}}"> <b>{{$permission->name}}</b> {{$permission->description}}</label>
					</div>
				@endif
			@endforeach
			<input type="submit" class="btn btn-primary mt-5" value="Guardar">
		</div>

	</div>

</form>

@endsection
