{{-- <div class="table-responsive">
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Fecha y Hora</th>
                <th>F. Cardíaca</th>
                <th>F. Respiratoria</th>
                <th>Presión Arterial</th>
                <th>Presión Arterial Media</th>
                <th>Glasgow</th>
                <th>% Sat. Oxígeno/Ambi.</th>
                <th>% Sat. Oxígeno/Apoyo</th>
                <th>HGT mg/dl</th>
                <th>Llene capilar</th>
                <th>Temperatura °C</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>{{ $event->vitalSign->registered_at ? $event->vitalSign->registered_at : '-' }}</td>
                <td>{{ $event->vitalSign->fc ? $event->vitalSign->fc : '-' }}</td>
                <td>{{ $event->vitalSign->fr ? $event->vitalSign->fr : '-' }}</td>
                <td>{{ $event->vitalSign->pa ? $event->vitalSign->pa : '-' }}</td>
                <td>{{ $event->vitalSign->pam ? $event->vitalSign->pam : '-'}}</td>
                <td>{{ $event->vitalSign->gl ? $event->vitalSign->gl : '-' }}</td>
                <td>{{ $event->vitalSign->soam ? $event->vitalSign->soam : '-'}}</td>
                <td>{{ $event->vitalSign->soap ? $event->vitalSign->soap : '-'}}</td>
                <td>{{ $event->vitalSign->hgt ? $event->vitalSign->hgt : '-'}}</td>
                <td>{{ $event->vitalSign->fill_capillary ? $event->vitalSign->fill_capillary : '-'}}</td>
                <td>{{ $event->vitalSign->t ? $event->vitalSign->t : '-'}}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger" title="Elimina Signo Vital">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div> --}}