@extends('layouts.app')

@section('content')

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
        

    
    <h3 class="mb-3"><i class="fas fa-hospital-user"></i> ATENCIÓN</h3>

        <div class="form-row">
         
        <fieldset class="form-group  col-md-4">
            <label for="for_run">RUT</label>
            <input type="text" class="form-control" name="rut" value="10225368-k">
        </fieldset>
        <fieldset class="form-group  col-md-4">
            <label for="for_run">Nombre</label>
            <input type="text" class="form-control" name="name" value="Sofia Valencia">
        </fieldset>
        <fieldset class="form-group  col-md-4">
            <label for="for_run">Teléfono</label>
            <input type="text" class="form-control" name="phone" value="+56945455252">
        </fieldset> 
        </div>
            
            <hr>
        <div class="form-row">
        <fieldset class="form-group  col-md-12">
            <label for="for_return"><b>30-09-2021</b></label>
                <button type="button" class="btn btn-info ">Paciente Atendido</button>
            </fieldset>
            <fieldset class="form-group  col-md-12">
                <label for="for_specialty">Proximo Control </label>
                <div class="input-group mb-3">
                <button type="button" class="btn btn-success mr-2">En 7 Días</button>
                <button type="button" class="btn btn-success mr-2">En 10 Días</button>
                <button type="button" class="btn btn-success mr-2">En 15 Días</button>
                <button type="button" class="btn btn-success mr-2">En 30 Días</button>
                <button type="button" class="btn btn-success mr-2">En 60 Días</button>
                <button type="button" class="btn btn-success mr-2">En 90 Días</button>
                
                       
                        <input type="date" class="form-control col-md-3" placeholder="" aria-label="Proxima consulta">
                        <button class="btn btn-success" type="button" id="button-add">Agregar Otra fecha</button>
                </div>
            </fieldset>
    
        </div>
        <div class="card border-info mb-3">
				<div class="card-header bg-info text-white">
                    Derivar a otra Especialidad
				</div>
				<div class="card-body">
                        <div class="form-row">
                                <fieldset class="form-group  col-md-2 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Otra Especialidad <a class="text-danger">(opcional)</a>
                                        </label>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group  col-md-3">
                                    <label for="for_specialty">Especialidad </label>
                                    <select class="form-control" name=" specialty">
                                            <option>Selecione</option>
                                                        <option value="1" >Anatomia Patologica</option>
                                                        <option value="2" >Anestesiologiá</option>
                                                        <option value="3" >Cirugia General</option>
                                                        <option value="4" >Dermatología</option>
                                                        <option value="5" >Geriatría</option>
                                                        <option value="6" >Médicina General</option>
                                                        <option value="7" >Neurología</option>
                                                        <option value="8" >Oftanmología</option>
                                                        <option value="9" >Psiquiatriá</option>
                                                        <option value="10" >Oftanmología</option>
                                                        <option value="11" >Traumatología</option>
                                                        <option value="12" >Radioloogía</option>
                                                        <option value="13" >Urología</option>
                                                    </select>
                                </fieldset>
                            
                                <fieldset class="form-group  col-md-5">
                                        <label for="for_run">Observación </label>
                                        <textarea class="form-control" id="validationTextarea" placeholder="" required></textarea>
                                            <div class="invalid-feedback">
                                                Ingrese observación
                                            </div>                    
                                </fieldset>
                                <fieldset class="form-group col-md-2 mt-5">
                                    <label for="for_save"></label>
                                    <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                                </fieldset>
                            
                        </div>
                </div>
            </div>

            <div class="form-row">
                    <fieldset class="form-group  col-md-4">
                            <a href="#" class="stretched-link text-success">EXÁMENES</a>
                    </fieldset>
                    <fieldset class="form-group  col-md-4">
                            <a href="#" class="stretched-link text-info">RADIOGRAFIAS</a>
                    </fieldset>
            </div>
             
             
    

    
     </div>
</div>



@endsection