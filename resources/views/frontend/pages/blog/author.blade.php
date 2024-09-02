@extends('frontend.layout.base')

{{-- SEO--}}
@section('title', $author->title)
@section('meta_description', $author->meta_description)

@if($author->featured_image->file_path)
    @section('image', $author->featured_image->file_path)
@endif

@section('schema')
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Person",
              "name": "{{$author->title}}",
              "description": "{{$author->description}}",
              "url": "{{url('/authors/'.$author->slug)}}",
            @isset($author->featured_image)
                "image": "{{$author->featured_image->file_path}}",
            @endif

            "sameAs": [
            @if($author->instagram_link) "{{$author->instagram_link}}", @endif
            @if($author->x_link)    "{{$author->instagram_link}}"  @endif
            ]
          }
        </script>
@endsection

@section('content')
    <div class="row vh-100">
        <div class="col-12 col-md-12 col-xl-3">


                <div class="row rounded author-bio">
                    <div class="col-12 author-bio-cover"
                         @isset($author->banner_image) style="background-image: url('{{$author->banner_image->file_path}}')" @endif
                    >
                        @isset($author->featured_image) <img src="{{$author->featured_image->file_path}}" alt="" class="rounded d-block m-auto"> @endif
                    </div>
                    <h4><a href="{{url('author/'.$author->slug)}}">{{$author->title}}</a></h4>
                    <small>{{$author->tagline}}</small>
                    <hr class="m-0">
                    <p class="author-description">{{$author->description}}</p>
                    <hr class="m-0">

                    <div class="w-100 d-block">
                        @if($author->instagram_link)
                            <a href="{{$author->instagram_link}}" class="social-media-link">
                                <img src="{{asset('public/assets/frontend/icons/insta.svg')}}" alt="" class="social-media-icons">
                            </a>
                        @endif
                        @if($author->x_link)
                            <a href="{{$author->x_link}}" class="social-media-link">
                                <img src="{{asset('public/assets/frontend/icons/x.svg')}}" alt="" class="social-media-icons">
                            </a>
                        @endif
                    </div>

                </div>

        </div>

        </div>
    </div>
@endsection

@section('bottom')
@endsection
