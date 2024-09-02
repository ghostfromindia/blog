@php($id = rand(1111,9999))
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="{{$name.'-'.$id}}" @isset($default) @if($default==1) checked @endif @endif >
    <label class="form-check-label" for="{{$name.'-'.$id}}">{{$label? $label : $name}}</label>
</div>
