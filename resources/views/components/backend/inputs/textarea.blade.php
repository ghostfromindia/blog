@php($id = rand(1111,9999))
<label for="{{$id}}">{{$label? $label : $name}} @error($name) <span class="text-danger">*required</span> @enderror</label>
<textarea  id="{{$id}}" class="form-control @isset($rich) editor @endif  " type="text" name="{{$name}}" rows="4">{{isset($default)? $default: old($name)}}</textarea>
