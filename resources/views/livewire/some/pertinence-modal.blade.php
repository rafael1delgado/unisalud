<div wire:ignore.self class="modal fade" id="pertinenceModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-circle"></i>
                    PERTINENCIAS</h5>
                <button type="button" class="close" aria-label="Close" wire:click="closeModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-body">
                        {{--                        <h3 class="mb-3"></h3>--}}
                        <div class="card border-success mb-3">
                            <div class="card-header bg-success text-white">
                                N° INTERCONSULTA: {{$externalIncomingSic->id ?? ''}}
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Nombre: {{$externalIncomingSic->patient_name ?? ''}} </li>
                                    <li>Edad: {{$externalIncomingSic->age ?? ''}} Años</li>
                                    <li>Género: {{$externalIncomingSic->patient_sex_indicator?? ''}}</li>
                                    <li>Centro: {{$externalIncomingSic->health_service_code?? ''}}</li>
                                    <li>Motivo: {{$externalIncomingSic->motive_indicator?? ''}}</li>
                                </ul>
                            </div>
                        </div>

                        <form wire:submit.prevent="pertinence" class="form-row">
                            <fieldset class="form-group  col-md-12 mb-3">
                                <label for="hypothesis"> <b>HIPOTESIS DIAGNOSTICA</b></label>
                                <textarea class="form-control" placeholder="Ingrese Hipotesis Diagnostica"
                                          id="hypothesis"
                                          style="height: 100px"
                                          wire:model.defer="diagnosticHypothesis"
                                ></textarea>
                            </fieldset>
                            <fieldset class="form-group  col-md-12 mb-3">
                                <label for="originObservation"> <b>OBSERVACIÓN DEL CENTRO DE ORIGEN</b></label>
                                <textarea class="form-control" placeholder="Ingrese Observación del Centro de Salud"
                                          id="originObservation"
                                          style="height: 100px"
                                          wire:model.defer="originObservation"
                                ></textarea>
                            </fieldset>

                            <fieldset class="form-group  col-md-4">
                                <button  class="btn btn-success mr-2" wire:click="$set('action', 'pertinent')" >Pertinente</button>
                            </fieldset>
                            <fieldset class="form-group  col-md-2">
                                <button  class="btn btn-danger mr-2 float-right" wire:click="$set('action', 'nonPertinent')">No pertinente</button>
                            </fieldset>
                            <fieldset class="form-group  col-md-6">
                                <label for="rejectedObservation"> <b>(Motivo)</b></label>
                                <textarea class="form-control" placeholder="" id="rejectedObservation"
                                          style="height: 100px"
                                          wire:model.defer="rejectedObservation"
                                ></textarea>
                            </fieldset>
                            @error('rejectedObservation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cerrar
                </button>
            </div>

        </div>
    </div>
</div>
