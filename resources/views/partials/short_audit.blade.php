<h5 class="mt-3">Historial de cambios</h5>

<div class="table-responsive-md">
    <table class="table table-sm small text-muted mt-3">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Modificaciones</th>
            </tr>
        </thead>
        <tbody>
            @if($audits->count() > 0)
            @foreach($audits->sortByDesc('updated_at') as $audit)
            <tr>
                <td nowrap>{{ $audit->created_at }}</td>
                <td nowrap>{{ optional($audit->user)->officialFullName }}</td>
                <td>
                @foreach($audit->getModified() as $attribute => $modified)
                    @if(isset($modified['old']) OR isset($modified['new']))
                    <strong>{{ $attribute }}</strong> :  {{ isset($modified['old']) ? $modified['old'] : '' }}  => {{ $modified['new'] }}; <br>
                    @endif
                @endforeach
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>