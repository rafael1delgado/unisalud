<div>
    <div class="form-row">
        <fieldset class="form-group col-3">
            <label for="for_searchf"></label>
            <input type="text" class="form-control" id="for_searchf"
            wire:model.debounce.300ms="searchf" placeholder="Buscar por nombre">
        </fieldset>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Index</th>
                <th>Nombre</th>
                <th>F.Nacimiento</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $key => $patient)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <a href="{{ route('patient.show',$patient['resource']['id'])}}">
                            {{ $patient['resource']['name'][0]['text'] }}
                        </a>
                    </td>
                    <td>{{ $patient['resource']['birthDate'] ?? ''}}</td>
                    <td>{{ $patient['resource']['gender'] ?? ''}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
