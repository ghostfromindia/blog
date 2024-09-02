<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title','GhostDash')</title>
        <!-- Bootstrap CSS -->
        <link href="{{asset('/assets/backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/backend/css/select2.min.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/backend/css/sidebars.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/backend/css/style.css')}}" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        @auth
        <script>
            const file_upload_path = '{{route('file.upload')}}';
            const base_path = '{{url('/')}}';

        </script>
        @endauth
    </head>
    <body>

            @include('backend.layout.sidebar')

            <div class="main-content pb-20">
                <div class="container">
                    @section('content') @show
                </div>
            </div>

        <script src="{{asset('/assets/backend/js/jquery.min.js')}}"></script>
        <script src="{{asset('/assets/backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/assets/backend/js/sidebars.js')}}"></script>
        <script src="{{asset('/assets/backend/js/select2.min.js')}}" defer></script>
        <script src="{{asset('/assets/backend/js/ckeditor.js')}}" defer></script>
        <script src="{{asset('/assets/backend/js/main.js')}}" defer></script>

        @section('bottom') @show
    </body>
</html>
