@extends('frontend.layout.base')

{{-- SEO--}}
@section('title', $blog->title)
@section('meta_description', $blog->meta_description)
@section('meta_keywords', $blog->meta_keywords)

@if($blog->banner_image->file_path)
@section('image', $blog->banner_image->file_path)
@endif

@section('schema')

    @isset($blog->category->author)
        @php($author = $blog->category->author)
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
    @endif
    @php($words = explode(',',$blog->meta_keywords))
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "headline": "{{$blog->title}}",
            "author": {
            "@type": "Person",
                "name": "{{$author->title}}"
        },
            "datePublished": "{{Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}",
            "dateModified": "{{Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}",
            "mainEntityOfPage": {
            "@type": "WebPage",
                "@id": "{{url()->current()}}"
        },
            "publisher": {
            "@type": "Organization",
                "name": "NoteShort",
                "logo": {
                "@type": "ImageObject",
                    "url": "{{asset('cover.webp')}}"
            }
        },
            "image": {
            "@type": "ImageObject",
                "url": "https://www.example.com/article-image.jpg",
                "height": 800,
                "width": 1200
        },
            "description": "{{$blog->meta_description}}",
            "articleBody": "{{$blog->description}}",
            "keywords": {{json_encode($words)}}
        }

    </script>

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 mx-auto">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        @isset($blog->category)
                        <h3 class="fs-6 text-secondary mb-2 text-uppercase text-center">{{$blog->category->title}}</h3>
                        @endif

                        <h1 class="display-5 mb-4 mb-md-5 text-center">
                            {{$blog->title}}
                        </h1>
                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                    </div>
                </div>
            </div>


            <div class="row">

                @isset($blog->childs)
                    @if(count($blog->childs)>0)
                        <div class="col-12 col-md-4 col-xl-3">
                            <div class="sticky-sidebar">
                                <h3>Table of content</h3>
                                <ol id="toc">
                                    @foreach($blog->childs as $obj)
                                    <li>
                                        <a href="#{{$obj->slug}}">{{$obj->title}}</a>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="col-12 @isset($blog->childs) @if(count($blog->childs)>0) col-md-8 col-xl-6 @else col-md-12 col-xl-9 @endif @endif">

                    <section>
                    @isset($blog->banner_image)
                    <img class="blog-cover-image" src="{{$blog->banner_image->file_path}}" alt="{{$blog->title}}">
                    @endif
                    <div class="content my-3">
                        {!! $blog->description !!}
                    </div>
                    </section>


                        @isset($blog->childs)

                            @foreach($blog->childs as $obj)
                                <section id="{{$obj->slug}}">
                                <h2 >{{$obj->title}}</h2>
                                @isset($obj->banner_image)
                                    <img class="blog-cover-image" src="{{$obj->banner_image->file_path}}" alt="{{$obj->title}}">
                                    @else
                                    <img class="blog-cover-image" src="https://placehold.co/400x400" alt="{{$obj->title}}">
                                @endif
                                <div class="content my-3">
                                    {!! $obj->description !!}
                                </div>
                                </section>
                            @endforeach

                        @endif
                    <div class="row">
                        <div class="col-12">
                            <h3 class="mt-5">Trending blogs</h3>
                            @foreach($blogs as $obj)
                                <div class="row mb-1 article-listing-style-1">
                                    <div class="col-3 p-0 thumbnail">
                                        <a href="{{url($obj->slug)}}">
                                            @if($obj->banner_image)
                                                <img src="{{asset($obj->banner_image->file_path)}}" alt="" class="w-100 rounded">
                                            @else
                                                <img class="blog-cover-image" src="https://placehold.co/400x400" alt="{{$obj->title}}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-9 p-0 title"><a href="{{url($obj->slug)}}">{{$obj->title}}</a></div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>

                <div class="col-12 col-md-12 col-xl-3">

                    @isset($blog->category->author)
                        @php($author = $blog->category->author)
                    <div class="row rounded author-bio">
                        <div class="author-info">Author info</div>
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
                    @endif

                </div>

            </div>


        </div>
    </div>
@endsection

@section('bottom')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateActiveLink();
        });

        document.addEventListener('scroll', function() {
            updateActiveLink();
        });

        function updateActiveLink() {
            const sections = document.querySelectorAll('section');
            const tocLinks = document.querySelectorAll('#toc a');

            let currentSection = '';
            let closestSection = null;
            let closestDistance = Infinity;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const distance = Math.abs(scrollY - sectionTop);

                // Find the closest section to the top of the viewport
                if (distance < closestDistance) {
                    closestDistance = distance;
                    closestSection = section;
                }
            });

            if (closestSection) {
                currentSection = closestSection.getAttribute('id');
            }

            tocLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(currentSection)) {
                    link.classList.add('active');
                }
            });
        }
    </script>
@endsection
