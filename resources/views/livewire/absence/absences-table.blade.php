<div>
    <div class="table-responsive">
        <table class="table table-sm table-hover small">
            <thead class="table-info">
                <tr>
                    <th scope="col">Rut</th>
                    <th scope="col">Dv</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ley</th>
                    <th scope="col">Edad (años)</th>
                    <th scope="col">Edad (meses)</th>
                    <th scope="col">AFP</th>
                    <th scope="col">Salud</th>
                    <th scope="col">Cod. unidad</th>
                    <th scope="col">Nombre unidad</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Calidad juridica</th>
                    <th scope="col">Planta</th>
                    <th scope="col">N° resolución</th>
                    <th scope="col">Fecha resolución</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha termino</th>
                    <th scope="col">Total dias ausentismo</th>
                    <th scope="col">Ausentismo en el periodo</th>
                    <th scope="col">Costo de licencia</th>
                    <th scope="col">Tipo de ausentismo</th>
                    <th scope="col">Cod. establecimiento</th>
                    <th scope="col">Nombre establecimiento</th>
                    <th scope="col">Saldo dias no reemplazados</th>
                    <th scope="col">Tipo de contrato</th>
                    <th scope="col">Selec.</th>
            </thead>
            <tbody>
                @if($absences)
                    @forelse($absences as $absence)
                    <tr>
                        <td>{{$absence->user ? $absence->user->identifierRun->value : ''}}</td>
                        <td>{{$absence->user ? $absence->user->identifierRun->dv : ''}}</td>
                        <td>{{$absence->user ? $absence->user->officialFullName : '' }}</td>
                        <td>{{$absence->contract ? $absence->contract->law : '' }}</td>
                        <td>{{$absence->user ? \Carbon\Carbon::parse($absence->user->birthday)->diff($absence->updated_at)->format('%y') .' años' : ''}}</td>
                        <td>{{$absence->user ? \Carbon\Carbon::parse($absence->user->birthday)->diff($absence->updated_at)->format('%m') : ''}}
                        <td>{{$absence->social_insurance ?? '' }}</td>
                        <td>{{$absence->health_insurance ?? '' }}</td>
                        <td>{{$absence->contract && $absence->contract->service ? $absence->contract->service->service_cod : ''}}</td>
                        <td>{{$absence->contract && $absence->contract->service ? $absence->contract->service->service_name : ''}}</td>
                        <td>{{$absence->user  ? $absence->user->sex : ''}}</td>
                        <td>{{$absence->practitioner  ? $absence->practitioner->job_title : ''}}</td>
                        <td>{{$absence->legal_quality ?? ''}}</td>
                        <td>{{$absence->staff ?? ''}}</td>
                        <td>{{$absence->res_number ?? ''}}</td>
                        <td>{{$absence->res_date ? $absence->res_date->format('d-m-Y') : ''}}</td>
                        <td>{{$absence->start_date ? $absence->start_date->format('d-m-Y') : ''}}</td>
                        <td>{{$absence->end_date ? $absence->end_date->format('d-m-Y') : ''}}</td>
                        <td>{{$absence->total_days ?? ''}}</td>
                        <td>{{$absence->period_days ?? ''}}</td>
                        <td>{{$absence->license_cost ?? ''}}</td>
                        <td>{{$absence->type ?? ''}}</td>
                        <td>{{$absence->practitioner && $absence->practitioner->organization ? $absence->practitioner->organization->sirh_code : ''}}</td>
                        <td>{{$absence->practitioner && $absence->practitioner->organization ? $absence->practitioner->organization->name : ''}}</td>
                        <td>{{$absence->balance_days_not_replaced ?? ''}}</td>
                        <td>Titulares y Contratados</td>
                        <td><form method="POST" action="{{ route('absences.destroy', $absence) }}" class="d-inline">
			            @csrf
			            @method('DELETE')
						<button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Está seguro/a de eliminar este registro?');">
							<span class="fas fa-trash-alt" aria-hidden="true"></span>
						</button>
					    </form></td>
                    </tr>
                    @empty
                        <tr><th scope="row" colspan="27" class="text-center">No hay registro de ausentismos <a class="btn-primary btn-sm" href="{{ route('absences.create')}}"> Ingresar uno nuevo</a></td></th>
                    @endforelse
                @endif
            </tbody>
        </table>
    </div>
    {{ $absences->links() }}
</div>