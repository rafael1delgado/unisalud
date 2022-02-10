<div class="table-responsive">
    <table class="table table-sm">
            
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>Fecha</th>
                <th>Evento N°</th>
                <th>Movil en Servicio</th>
                <th>Dirección</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th></th>
            </tr>
        </thead>
            
        <tbody>
            @foreach($events as $event)
            <tr class="table-{{ $event->color }}">
                <td>
                    <a href="{{ route('samu.event.edit', $event) }}">
                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> {{ $event->id }}</button>
                    </a>
                </td>
                <td>{{ $event->date }} </td>
                <td>{{ $event->counter }} </td>
                <td>
                    {{ optional($event->mobile)->code }} 
                    {{ optional($event->mobile)->name }}
                </td>
                <td>{{ $event->address }}, {{ optional($event->commune)->name }}</td>
                <td>{{ $event->key->key }} - {{ $event->key->name }} </td>
                <td>{{ optional($event->returnKey)->key }} - {{ optional($event->returnKey)->name }}</td>
                <td>
                    <form method="POST" action="{{ route('samu.event.destroy', $event) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>