@extends('layouts.app')

@section('title', 'crear_usuario')

@section('content')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('dummy.crear_usuario') }}">Crear usuario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.some') }}">Some</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dummy.traspaso') }}">Traspaso/bloqueo</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('dummy.agenda') }}">Agenda</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('dummy.lista_espera') }}">Lista Espera</a>
  </li>
</ul>
<form> 
 
        <div class="row mt-5">
            <div class="col-sm-6">
                 <div class="card">
                    <div class="card-body">
                         <h5 class="card-title">NACIONAL</h5>

                        <div class="form-row mt-3">

    	                    <div class="form-group col-md-7">
    			                    <label for="inputEmail4">RUT</label>
    			                    <input type="email" class="form-control" id="inputEmail4" placeholder="ingrese el rut">
    	                    </div>
    	                    <div class="form-group col-md-2">
      			                <label for="inputPassword4">Dv</label>
      			                <input type="text" class="form-control" id="inputPassword4" placeholder="Dv">
    	                    </div>
		
    	                    <div class="form-group col-md-3">
				                <label for="inputEmail4">&nbsp;</label>
				                <button type="button" class="btn btn-primary form-control">Fonasa</button>
   		                    </div>
	                    </div>

       
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                         <h5 class="card-title">EXTRANJERO</h5>

                         <div class="form-row mt-3">

    	                    <div class="form-group col-md-6">
    			                    <label for="inputEmail4">Tipo de Documento</label>
    			                        <select id="inputState" class="form-control">
        			                        <option selected>RUN</option>
        			                        <option>Pasaporte</option>
                                            <option>Acta</option>
                                            <option>Otro</option>
     			                         </select>
    			                    

    	                    </div>
    	                    <div class="form-group col-md-6">
      			                <label for="inputPassword4">N° Documento</label>
      			                <input type="text" class="form-control" id="inputPassword4" placeholder="Número de documento">
    	                    </div>
	                    </div>

                     </div>
                </div>
            </div>
        </div>

        <div class="form-row mt-3">

			<div class="form-group col-md-3">
                 <label for="inputEmail4">Nombre</label>
                <input type="nombre" class="form-control" id="inputEmail4" placeholder="">
            </div>

            <div class="form-group col-md-2">
                <label for="inputEmail4">Apellido Paterno</label>
                <input type="apaterno" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Apellido Materno</label>
                <input type="amaterno" class="form-control" id="inputPassword4" placeholder="">
            </div>
			<div class="form-group col-md-3">
			    <label for="inputEmail4">Fecha de Nacimiento</label>
			    <input type="date" class="form-control" id="inputEmail4" placeholder="Ingrese Fecha Nacimiento">
		    </div>
			<div class="form-group col-md-2">
    			<label for="inputEmail4">Sexo</label>
    			<select id="inputState" class="form-control">
        		    <option selected>Femenino</option>
        			<option>Maculino</option>
                    <option>Otro</option>
     			</select>
    	     </div>
            
        </div>


        <div class="form-row">
			<div class="form-group col-md-4">
    			<label for="imputText">Nombre Social</label>
				<input type="Text" class="form-control" id="inputNombreSocial" placeholder="">
    	     </div>
			 <div class="form-group col-md-4">
    			<label for="imputText">Identidad de Género</label>
				<select id="inputState" class="form-control">
        		    <option selected>Transexual</option>
        			<option>Bisexual</option>
                    <option>Pansexual</option>
     			</select>
				
    	     </div>
			 <div class="form-group col-md-4">
    			<label for="inputEmail4">Nacionalidad</label>
    			<select id="inputState" class="form-control">
        		    <option selected>Perú</option>
        			<option>Argentina</option>
                    <option>Brasil</option>
					<option>Bolivia</option>
					<option>Chile</option>
					<option>Ecuador</option>
					<option>Paraguay</option>
					<option>Venezuela</option>
     			</select>
    	     </div>

			 

		</div>
        <!--datos de direccion-->


        <div class="form-row">
            <h5 class="card-title col-md-12">DIRECCIÓN</h5>
        
        <div class="form-group col-md-3">
    			<label for="inputEmail4">Via de acceso</label>
    			<select id="inputState" class="form-control">
        		    <option selected>Calle</option>
        			<option>Avenida</option>
                    <option>Pasaje</option>
                    <option>Camino</option>
     			</select>
    	     </div>
		    <div class="form-group col-md-5">
			    <label for="inputEmail4">Direccion</label>
			    <input type="direccion" class="form-control" id="inputEmail4" placeholder="Ingrese direccion">
		    </div>
            <div class="form-group col-md-2">
			    <label for="inputEmail4">Número</label>
			    <input type="direccion" class="form-control" id="inputEmail4" placeholder="Número">
		    </div>
            <div class="form-group col-md-2">
			    <label for="inputEmail4">Dpto.</label>
			    <input type="direccion" class="form-control" id="inputEmail4" placeholder="N° Dpto.">
		    </div>

		</div >

		<div class="form-row">
        
			<div class="form-group col-md-5">
			    <label for="inputEmail4">Población/Villa</label>
			    <input type="direccion" class="form-control" id="inputEmail4" placeholder="Población/Villa">
		    </div>
			<div class="form-group col-md-2">
    			<label for="inputEmail4">Comuna</label>
    			<select id="inputState" class="form-control">
        		    <option selected>Iquique</option>
        			<option>Alto Hospicio</option>
                    <option>Camiña</option>
					<option>Colchane</option>
					<option>Huara</option>
					
     			</select>
    	     </div>
            <div class="form-group col-md-5">
			    <label for="inputEmail4">Ciudad/Pueblo/Localidad</label>
			    <input type="direccion" class="form-control" id="inputEmail4" placeholder="Ciudad/Pueblo/Localidad">
		    </div>

		</div >

    <!--fin datos de direccion-->

    <!--datos de contacto-->
	<div class="form-row">
            <h5 class="card-title col-md-12">Contacto</h5>
			<div class="form-group col-md-6">
				<label for="inputEmail4">E-mail</label>
					<div class="input-group">
					<input type="text" aria-label="First name" class="form-control col-md-8">
						<select id="inputState" class="form-control col-md-3">
							<option selected>Personal</option>
							<option>Trabajo</option>
						</select>
						<button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03" col-md-1><i class="fas fa-user-plus"></i></button>
					</div>
					
			</div>

			<div class="form-group col-md-6">
			<label for="inputEmail4">Teléfono</label>
					<div class="input-group">
					<input type="text" aria-label="First name" class="form-control col-md-8">
						<select id="inputState" class="form-control col-md-3">
							<option selected>Personal</option>
							<option>Trabajo</option>
						</select>
						<button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03" col-md-1><i class="fas fa-user-plus"></i></button>
					</div>
			</div>
	</div>
    <!--fin datos de contacto-->

    <!--prevision-->
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

    <!--fin prevision-->

	<div class="form-row">
		<div class="form-group col-md-3">
		<label for="inputEmail4">Paciente Crónico</label>
		<select class="custom-select" multiple>
  			<option selected>Diabetico</option>
  			<option value="1">Artrosis</option>
  			<option value="2">Hipertenso</option>
		</select>
        </div>
		<div class="form-group col-md-3">
		<label for="inputEmail4">Etnia</label>
		<select class="custom-select" multiple>
  			<option selected>Mapuche</option>
  			<option value="1">Quechua</option>
  			<option value="2">Aimara</option>
			<option value="2">Rapanui</option>
			<option value="2">Yagán</option>

		</select>
        </div>
        <div class="form-group col-md-3">
    			<label for="inputEmail4">Estado Civil</label>
    			<select id="inputState" class="form-control">
        		    <option selected>Solter@</option>
        			<option>Casad@</option>
                    <option>Viud@</option>
                    <option>Divorciad@</option>
     			</select>
    	</div>
		
	</div >







</form>


@endsection

@section('custom_js')

@endsection