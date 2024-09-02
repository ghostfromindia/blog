@extends('backend.layout.base')

@section('title','Create product')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">{{isset($obj->id)? "Edit ".$name.': '.$obj->title : $name}}</h1>
            <hr>
        </div>

        <div class="col-md-12">

            <form action="{{isset($obj->id)? route('product.update') : route('product.save')}}" method="post"> @csrf
                @if(isset($obj->id)) <input type="hidden" name="id" value="{{encrypt($obj->id)}}" /> @endif
                <div class="row">
                    <div class="col-4 mb-3">
                        @include('components.backend.inputs.text',['label'=> 'Title ','name'=>'title', 'default'=>isset($obj) ? $obj->title: null])
                    </div>
                    <div class="col-4 mb-3">
                        @include('components.backend.inputs.text',['label'=> 'product slug','name'=>'slug', 'default' => isset($obj) ? $obj->slug: null])
                    </div>

                    <div class="col-4 mb-3">
                        @include('components.backend.select2',['label'=> 'Category','name'=>'category_id','multiple'=>false, 'url'=> route('category.select2search')])
                    </div>



                    <div class="col-12 mb-3">
                        @include('components.backend.inputs.textarea',['label'=> 'product short description','name'=>'short_description', 'default' => isset($obj) ? $obj->short_description: null])
                    </div>

                    <div class="col-12 mb-3">
                        @include('components.backend.inputs.textarea',['label'=> 'product description','name'=>'description', 'default' => isset($obj) ? $obj->description: null])
                    </div>

                    <div class="col-4 mb-3">
                        @include('components.backend.inputs.image',['label'=> 'product primary image','name'=>'banner_image_id', 'default' => isset($obj) ? $obj->banner_image: null])
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
                let response = await $.post('{{route('product.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'});
                $('input[name=slug]').val(response.slug);
            }
            const generateSlug2 = async (slug) => {
                if(slug===$('input[name=slug]').val()){
                    let response = await $.post('{{route('product.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'})

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
