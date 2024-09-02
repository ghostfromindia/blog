<div>
    <label class="d-block" for="{{$name}}">{{$label}}</label>

    @if($multiple)
        <select id="{{$name}}" name="{{$name}}[]" class="w-100 select2-init form-control" data-url="{{$url}}"  multiple="multiple"></select>
    @else
        <select id="{{$name}}" name="{{$name}}" class="w-100 select2-init form-control" data-url="{{$url}}" >
            @isset($default) <option value="{{$default->id}}" selected="selected">{{$default->title}}</option> @endif
        </select>
    @endif
</div>
