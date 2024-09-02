@extends('backend.layout.base')

@section('title','Create user')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">{{isset($obj->id)? "Edit ".$name.': '.$obj->title : $name}}</h1>
            <hr>
        </div>

        <div class="col-md-12">

            <form action="{{isset($obj->id)? route('user.update') : route('user.save')}}" method="post"> @csrf
                @if(isset($obj->id)) <input type="hidden" name="id" value="{{encrypt($obj->id)}}" /> @endif
                <div class="row">
                    <div class="col-4 mb-3">
                        @include('components.backend.inputs.text',['label'=> 'Title ','name'=>'name', 'default'=>isset($obj->id)? $obj->name: null])
                    </div>
                    <div class="col-4 mb-3">
                        @include('components.backend.inputs.text',['label'=> 'user email','name'=>'email', 'default' => isset($obj->id)? $obj->email: null])
                    </div>
                    <div class="col-4 mb-3">
                        @include('components.backend.inputs.select',[
                        'label'=> 'role',
                        'name'=>'type',
                        'default' => isset($obj->type)? $obj->type: null,
                        'options' => ["admin","customer","vendor"]
                        ])
                    </div>


                </div>
                <div>
                    <div class="floating-action-bar">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button class="btn btn-dark" type="submit">Publish</button>
                    </div>
                </div>
            </form>

        </div>

    </div>



@endsection

@section('bottom')
<script>
    $(document).ready(function() {
        const generateSlug = async (slug) => {
            let response = await $.post('{{route('user.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'});
            $('input[name=slug]').val(response.slug);
        }
        const generateSlug2 = async (slug) => {
            if(slug===$('input[name=slug]').val()){
                let response = await $.post('{{route('user.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'})

                if(slug===$('input[name=slug]').val()) {
                    $('input[name=slug]').val(response.slug);
                }
            }
        }

        $('input[name=title]').keyup(function (){ generateSlug($(this).val()); });
        $('input[name=slug]').keyup(function (e){ e.preventDefault(); generateSlug2($(this).val()); });
    });
</script>
@endsection
