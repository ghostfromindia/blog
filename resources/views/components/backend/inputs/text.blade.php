@php($id = rand(1111,9999))
<label for="{{$id}}">{{$label? $label : $name}}</label>
<input id="{{$id}}" class="form-control @error($name) is-invalid @enderror" type="text" name="{{$name}}" value="{{isset($default)? $default: old($name)}}"/>
