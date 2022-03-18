<h4 class="mt-3">Llamadas relacionadas</h4>

<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="text-center table-primary">
                <th>Id</th>
                <th>Clasificación</th>
                <th nowrap>Hora</th>
                <th>Solicitante</th>
                <th>Información telefonica</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Receptor de llamada</th>
            </tr>
        </thead>
        <tbody>
            @if($call)
                <tr>
                    @include('samu.call.partials.information-call', ['call' => $call, 'main' => true])
                </tr>
                @foreach($call->associatedCalls as $index => $associatedCall)
                <tr>
                    @include('samu.call.partials.information-call', ['call' => $associatedCall, 'main' => false])
                </tr>
                @endforeach
            @else 
                <tr>
                    <td class="text-center" colspan="8">
                        No hay llamadas relacionadas a este cometido.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
