@extends('backend.layout.base')

@section('title','Create Blog')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="row">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('blogs.home')}}">Blogs</a></li>
                        @if(!empty($obj->id) && !empty($obj->parent))
                        <li class="breadcrumb-item">
                                <a href="{{route('blogs.edit', with(encrypt($obj->parent->id)))}}">{{$obj->parent->title}}</a></li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    {{isset($obj->id)? "Edit ".$name.': '.$obj->title : $name}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form action="{{isset($obj->id)? route('blogs.update') : route('blogs.save')}}" method="post"> @csrf
                                @if(isset($obj->id)) <input type="hidden" name="id" value="{{encrypt($obj->id)}}" /> @endif
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        @include('components.backend.inputs.text',['label'=> 'Title ','name'=>'title', 'default'=>isset($obj->id)? $obj->title: null])
                                    </div>
                                    <div class="col-4 mb-3">
                                        @include('components.backend.inputs.text',['label'=> 'blogs slug','name'=>'slug', 'default' => isset($obj->id)? $obj->slug: null])
                                    </div>

                                    <div class="col-4 mb-3">
                                        @include('components.backend.select2',['label'=> 'Parent blogs','name'=>'parent_id','multiple'=>false, 'url'=> route('blogs.select2search'), 'default' => isset($obj->parent_id)? $obj->parent: (isset($parent)? $parent : null)])
                                    </div>



                                    <div class="col-12 mb-3">
                                        @include('components.backend.inputs.textarea',['label'=> 'blogs short description','name'=>'short_description', 'default' => isset($obj->id)? $obj->short_description: null])
                                    </div>

                                    <div class="col-12 mb-3">
                                        @include('components.backend.inputs.textarea',['label'=> 'blogs description','name'=>'description', 'default' => isset($obj->id)? $obj->description: null,'rich'=>false])
                                    </div>

                                    <div class="col-12 mb-3">
                                        @include('components.backend.inputs.textarea',['label'=> 'blogs meta description','name'=>'meta_description', 'default' => isset($obj->id)? $obj->meta_description: null])
                                    </div>
                                    <div class="col-12 mb-3">
                                        @include('components.backend.inputs.textarea',['label'=> 'blogs meta keyword','name'=>'meta_keywords', 'default' => isset($obj->id)? $obj->meta_keywords: null])
                                    </div>

                                    <div class="col-4 mb-3">
                                        @include('components.backend.inputs.image',['label'=> 'blogs primary image','name'=>'banner_image_id', 'default' => isset($obj->id)? $obj->banner_image: null])
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
                                        <a class="btn btn-light" href="{{route('blogs.home')}}">All Blogs</a>
                                        <button class="btn btn-dark" type="submit">Publish</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-3">


            <div class="card">
                <div class="card-header">
                    Parent
                </div>
                <div class="card-body">
                    @isset($obj->parent_id)
                        <li>
                            <a href="{{route('blogs.edit', with(encrypt($obj->parent->id)))}}">{{$obj->parent->title}}</a>
                        </li>
                    @endif
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    Childs
                </div>
                <div class="card-body">
                    @isset($obj->id)
                        @foreach($obj->childs as $ob)
                            <li><a href="{{route('blogs.edit', with(encrypt($ob->id)))}}">{{$ob->title}}</a>
                        @endforeach


                        <li><a href="{{route('blogs.create.child',with(encrypt($obj->id)))}}">Create new child</a></li>
                    @endif
                </div>
            </div>


        </div>
    </div>





@endsection

@section('bottom')
<script>
    $(document).ready(function() {
        const generateSlug = async (slug) => {
            let response = await $.post('{{route('blogs.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'});
            $('input[name=slug]').val(response.slug);
        }
        const generateSlug2 = async (slug) => {
            if(slug===$('input[name=slug]').val()){
                let response = await $.post('{{route('blogs.generate.slug')}}', {slug: slug, _token:'{{@csrf_token()}}'})

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
