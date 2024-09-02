@extends('backend.layout.base')

@section('title','Create author')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="row">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('authors.home')}}">authors</a></li>
                        @if(!empty($obj->id) && !empty($obj->parent))
                        <li class="breadcrumb-item">
                                <a href="{{route('authors.edit', with(encrypt($obj->parent->id)))}}">{{$obj->parent->title}}</a></li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{isset($obj->id)? "Edit ".$name.': '.$obj->title : $name}}
                </div>
                <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form action="{{isset($obj->id)? route('authors.update') : route('authors.save')}}" method="post"> @csrf
                                @if(isset($obj->id)) <input type="hidden" name="id" value="{{encrypt($obj->id)}}" /> @endif
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        @include('components.backend.inputs.text',['label'=> 'Title ','name'=>'title', 'default'=>isset($obj->id)? $obj->title: null])
                                    </div>
                                    <div class="col-4 mb-3">
                                        @include('components.backend.inputs.text',['label'=> 'authors slug','name'=>'slug', 'default' => isset($obj->id)? $obj->slug: null])
                                    </div>



                                    <div class="col-4 mb-3">
                                        @include('components.backend.select2',['label'=> 'author Category','name'=>'category_id','multiple'=>false, 'url'=> route('category.select2search'), 'default' => isset($obj->category_id)? $obj->category: null])
                                    </div>



                                    <div class="col-12 mb-3">
                                        @include('components.backend.inputs.textarea',['label'=> 'authors tagline ','name'=>'tagline', 'default' => isset($obj->id)? $obj->tagline: null])
                                    </div>

                                    <div class="col-12 mb-3">
                                        @include('components.backend.inputs.textarea',['label'=> 'authors description','name'=>'description', 'default' => isset($obj->id)? $obj->description: null])
                                    </div>


                                    <div class="col-6 mb-3">
                                        @include('components.backend.inputs.text',['label'=> 'authors instagram link','name'=>'instagram_link', 'default' => isset($obj->id)? $obj->instagram_link: null])
                                    </div>

                                    <div class="col-6 mb-3">
                                        @include('components.backend.inputs.text',['label'=> 'authors x_link','name'=>'x_link', 'default' => isset($obj->id)? $obj->x_link: null])
                                    </div>

                                    <div class="col-4 mb-3">
                                        @include('components.backend.inputs.image',['label'=> 'authors banner image','name'=>'banner_image_id', 'default' => isset($obj->id)? $obj->banner_image: null])
                                    </div>

                                    <div class="col-4 mb-3">
                                        @include('components.backend.inputs.image',['label'=> 'authors primary image','name'=>'featured_image_id', 'default' => isset($obj->id)? $obj->featured_image: null])
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
                                        <a class="btn btn-light" href="{{route('authors.home')}}">All authors</a>
                                        <button class="btn btn-dark" type="submit">Publish</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>





@endsection

@section('bottom')
<script>
    $(document).ready(function() {
        const generateSlug = async (slug) => {
            let response = await $.post('{{route('authors.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'});
            $('input[name=slug]').val(response.slug);
        }
        const generateSlug2 = async (slug) => {
            if(slug===$('input[name=slug]').val()){
                let response = await $.post('{{route('authors.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'})

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
