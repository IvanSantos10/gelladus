<span class="form-control-label">
    @if(!str_contains($field, '*'))
        <strong>{{$errors->first($field)}}</strong>
    @else
        <ul>
            @foreach($errors->get($field) as $fieldErrors)
                <li> <strong>{{ $fieldErrors[0] }}</strong> </li>
            @endforeach
        </ul>
    @endif
</span>