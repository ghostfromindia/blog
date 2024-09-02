@extends('frontend.layout.base')

@section('content')


    <div class="col-lg-12 col-md-12 mx-auto vh-100 w-100 d-flex justify-content-center">
        <div class="title text-center">
            <h1 class="mb-4 page-title">
                Your source for the latest articles on every topic
            </h1>
            <a href="#start">Trending Articles > </a>
        </div>
    </div>



    <div class="row" id="start">


            <div class="row vh-100">
                @foreach($blogs as $obj)
                    <div class="col-12 col-md-4">
                        <div class="product">
                            <x-frontend.item.blog :item="$obj"/>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('bottom')
    <script>
        AOS.init();
    </script>
    <script>
        $('.category-container').slick({
            slidesToScroll: 4,
            slidesToShow: 5,
            dots: true,
            infinite:false,
            arrows: false, // Disable navigation arrows
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        arrows: true,
                        dots: false,
                        slidesToShow: 3,
                    }
                }
            ]
        });
    </script>
@endsection
