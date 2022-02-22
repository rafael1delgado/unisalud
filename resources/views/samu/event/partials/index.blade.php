<div class="table-responsive">
    <table class="table table-sm">
            
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>N°</th>
                <th>Llamadas</th>
                <th>Móvil en Servicio</th>
                <th>Dirección</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th>Observación</th>
                <th></th>
            </tr>
        </thead>
            
        <tbody>
            @foreach($events as $event)
            <tr class="table-{{ $event->color }}">
                <td nowrap>
                    <a href="{{ route('samu.event.edit', $event) }}">
                            @if($event->status)
                                <button class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            @else
                                <button class="btn btn-sm btn-outline-success">
                                <i class="fas fa-eye"></i>
                            @endif
                            {{ $event->id }}
                            </button>
                    </a>
                </td>
                <td>{{ $event->counter }} </td>
                <td>
                    @foreach($event->calls as $call)
                        <a href="{{ route('samu.call.edit',$call) }}">{{ $call->id }}</a>,
                    @endforeach
                </td>
                <td nowrap>
                    {{ optional($event->mobile)->code }} 
                    {{ optional($event->mobile)->name }}
                </td>
                <td>{{ $event->address }}, {{ optional($event->commune)->name }}</td>
                <td>{{ $event->key->key }} - {{ $event->key->name }} </td>
                <td>{{ optional($event->returnKey)->key }} - {{ optional($event->returnKey)->name }}</td>
                <td>{{ $event->observation }}</td>
                <td>
                    @if($event->status)
                    <form method="POST" action="{{ route('samu.event.destroy', $event) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>