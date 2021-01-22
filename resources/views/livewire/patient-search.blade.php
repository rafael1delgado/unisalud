<div>
    <div class="form-row">
        <fieldset class="form-group col-3">
            <label for="for_searchf"></label>
            <input type="text" class="form-control" id="for_searchf"
            wire:model.debounce.300ms="searchf" placeholder="Buscar por nombre">
        </fieldset>
    </div>

    <table class="table-auto my-8">
        <thead class="border">
            <tr>
                <th class="px-4 py-2 font-bold">Index</th>
                <th class="px-4 py-2 font-bold">Nombre</th>
                <th class="px-4 py-2 font-bold">F.Nacimiento</th>
                <th class="px-4 py-2 font-bold">Genero</th>
            </tr>
        </thead>
        <tbody class="border">
            @if( count($patients) > 0)
                @foreach($patients as $key => $patient)
                    <tr>
                        <td class="px-4 py-2">{{ ++$key }}</td>
                        <td class="px-4 py-2">
                            {{ implode(' ',$patient['resource']['name'][0]['given']) ?? '' }}
                        </td>
                        <td class="px-4 py-2">{{ $patient['resource']['birthDate'] ?? ''}}</td>
                        <td class="px-4 py-2">{{ $patient['resource']['gender'] ?? ''}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
