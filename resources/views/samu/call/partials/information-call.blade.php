<td class="text-center">
    <a 
        href="{{ route('samu.call.edit', $call) }}" 
        @if($main) class="btn btn-sm btn-primary" @else class="btn btn-sm btn-outline-primary" @endif>
        <i class="fas fa-edit"></i> {{ $call->id }}
    </a>
</td>
<td>
    {{ $call->classification }}
    @if($call->referenceCall)
    Referencia a: 
    <a href="{{ route('samu.call.edit', $call->referenceCall) }}">
        {{ $call->referenceCall->id }}
    </a>
    @endif
</td>
<td>{{ $call->hour }}</td>
<td>{{ $call->applicant }}</td>
<td>
    {{ $call->sex_abbr }} 
    {{ $call->age_format }} 
    {{ $call->information }}
</td>
<td>{{ $call->address }} {{ optional($call->commune)->name }}</td>
<td>{{ $call->telephone }}</td>
<td>{{ $call->receptor->officialFullName }}</td>
