@extends('layouts.app')

@section('title', 'some')

@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.crear_usuario') }}">Crear usuario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('dummy.some') }}">Some</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.traspaso') }}">Traspaso/bloqueo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('dummy.agenda') }}">Agenda</a>
  </li>
</ul>

<form>

	<div class="form-row mt-3">

    	<div class="form-group col-md-4">
    			<label for="inputEmail4">RUT</label>
    			<input type="email" class="form-control" id="inputEmail4" placeholder="Ingrese el rut">
    	</div>
    	<div class="form-group col-md-1">
      			<label for="inputPassword4">Dv</label>
      			<input type="password" class="form-control" id="inputPassword4" placeholder="Dv">
    	</div>
		<div class="form-group col-md-5">
     	 		<label for="inputEmail4">Nombre</label>
      	 		<input type="email" class="form-control" id="inputEmail4" placeholder="Ingrese Nombre">
    	</div>
    	<div class="form-group col-md-2">
				<label for="inputEmail4">&nbsp;</label>
				<button type="button" class="btn btn-primary form-control">Buscar</button>
   		 </div>
	</div>

	<div class="table-responsive">
    <table class="table table-sm table-hover">
         <thead class="table-info">
		 
                <tr>
                    <th scope="col">Nombre:</th>
                    <th scope="col">Jose Cantero Palacios</th>
      
        </thead>
        <tbody>
                 <tr>
                     <th scope="row">Identificación</th>
                     <td>26225358-9</td>

                </tr>

                <tr>
                    <th scope="row">Edad</th>
                    <td>19 años</td>
                </tr>

                <tr>
                     <th scope="row">Sexo</th>
                     <td colspan="2">Masculino</td>
                </tr>

                <tr>
                     <th scope="row">Dirección</th>
                     <td colspan="2">Anibal pinto 814</td>
                </tr>

                <tr>
                      <th scope="row">Teléfono</th>
                      <td colspan="2">942422656</td>
                </tr>

                <tr>
                    <th scope="row">Correo</th>
                    <td colspan="2">josecp@gmail.com</td>
                </tr>
        </tbody>
    </table>
	</div>

	<div class="form-row">
        
        <div class="form-group col-md-5">
    			<label for="inputEmail4">Prevision</label>
    			<select id="inputState" class="form-control">
        		    <option selected>Fonasa</option>
        			<option>Isapre</option>
     			</select>
    	</div>
        <div class="form-group col-md-5">
    			<label for="inputEmail4">Tramo</label>
    			<select id="inputState" class="form-control">
        		    <option selected>A</option>
        			<option>B</option>
                    <option>C</option>
                    <option>D</option>
     			</select>
    	</div>
        <div class="form-group col-md-2">
				    <label for="inputEmail4">&nbsp;</label>
				    <button type="button" class="btn btn-primary form-control">Fonasa</button>
   		</div>

	</div >

	<div class="form-row">

    	<div class="form-group col-md-4">
    			<label for="inputEmail4">Especialidad</label>
    			<select id="inputState" class="form-control">
        			<option selected>Salud Mental</option>
        			<option>Traumatologia</option>
     			 </select>
    	</div>
    	<div class="form-group col-md-6">
      			<label for="inputPassword4">Profesional</label>
      			<select id="inputState" class="form-control">
        			<option selected>Dr Oscar Zavala</option>
        			<option>Dr Toby Cerdo</option>
     			 </select>
    	</div>
		<div class="form-group col-md-2">
     	 		<label for="inputEmail4">Estado</label>
				  <select id="inputState" class="form-control">
        			<option selected>Disponible</option>
        			<option>Bloqueado</option>
     			 </select>
    	</div>
    	
	</div>

	<div class="form-row">

    	<div class="form-group col-md-1">
    			<label for="imputBool">Codigo</label>
    			<input type="bool" class="form-control" id="inputBool" placeholder="">
    	</div>
		<div class="form-group col-md-4">
    			<label for="imputBool">Prestación</label>
    			<input type="bool" class="form-control" id="inputBool" placeholder="">
    	</div>
		<div class="form-group col-md-2">
    			<label for="imputNumeric">Número de Interconsulta</label>
    			<input type="numeric" class="form-control" id="inputNumeric" placeholder="">
    	</div>
		<div class="form-group col-md-3">
			<label for="inputDate">Fecha de Interconsulta</label>
			<input type="date" class="form-control" id="inputDate" placeholder="Fecha de interconsulta">
		</div>
		<div class="form-group col-md-2">
     	 		<label for="inputEmail4">Procedencia</label>
				  <select id="inputState" class="form-control">
        			<option selected>Cesfam Videla</option>
        			<option>Cesfam Aguirre</option>
					<option>Cesfam Guzmán</option>
					<option>Cesfam Sur</option>
     			 </select>
    	</div>
	</div>
	
	<div class="form-row">

		<fieldset class="form-group col-4">
			<label></label>
			<div class="form-group mt-1 ml-4">
      			<input class="form-check-input" type="checkbox" id="gridCheck">
      			<label class="form-check-label" for="gridCheck">
      			  Proxima Fecha Disponible
      	    	</label>
			</div>
    	</fieldset>


		<div class="form-group col-md-3">
			<label for="inputEmail4">Desde</label>
			<input type="date" class="form-control" id="inputEmail4" placeholder="Fecha inicio">
		</div>

		<div class="form-group col-md-3">
		  	<label for="inputEmail4">Hasta</label>
		   	<input type="date" class="form-control" id="inputEmail4" placeholder="Fecha fin">
		</div>
		<div class="form-group col-md-2">
			<label for="inputEmail4">&nbsp;</label>
			<button type="button" class="btn btn-primary form-control">Buscar</button>
		</div>
		
  	</div>
	<div class="table-responsive">
	<table class="table table-sm table-hover">
  		<thead class="table-info">
    		<tr>
      			<th scope="col">Profesional</th>
				<th scope="col">Especialidad</th>
      			<th scope="col">Hora</th>
      			<th scope="col">Cupo</th>
      			<th scope="col">Sobre Cupo</th>
	  			<th scope="col">Estado</th>
    		</tr>
  		</thead>
  		<tbody>
   			<tr>
     			<th scope="row">Esteban Rojas</th>
				<td>Traumatologiá</td>
      			<td>09:30</td>
      			<td>3</td>
      			<td>2</td>
				<td>Disponible</td>
    		</tr>

			<tr>
     			<th scope="row">Maria Perez</th>
				<td>Traumatologiá</td>
      			<td>10:30</td>
      			<td>2</td>
      			<td>0</td>
				<td>Disponible</td>
    		</tr>

			<tr>
     			<th scope="row">Juan Zavala</th>
				 <td>Traumatologiá</td>
      			<td>11:30</td>
      			<td>1</td>
      			<td>0</td>
				<td>Disponible</td>
    		</tr>
    
 		 </tbody>
	</table>
	</div>


</form>


@endsection

@section('custom_js')

@endsection