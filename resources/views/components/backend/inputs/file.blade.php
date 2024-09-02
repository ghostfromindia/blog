@php($id = rand(1111,9999))
<label for="{{$id}}">{{$label? $label : $name}}</label>
<input type="file" id="{{$id}}" class="form-control" name="{{$name}}"/>
