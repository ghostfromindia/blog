<Label>{{$label}}</Label>
<select name="{{$name}}" class="form-control @error($name) is-invalid @enderror">
@foreach($options as $obj)
        <option value="{{$obj}}"
                @isset($default)
                @if($default == $obj) selected @elseif(old($name) == $obj) selected @endif
                @endif
        >{{$obj}}</option>
@endforeach
</select>
