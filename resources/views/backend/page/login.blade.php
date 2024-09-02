<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="{{asset('/assets/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/backend/css/style.css')}}" rel="stylesheet">
</head>
<body class="overflow-hidden login-screen-bg">
    <div class="container ">
        <div class="row">
            <div class="col-md-12 login-card-container ">
                <div>
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    <h5 class="text-center">Login</h5>
                    <p class="text-center">login using email and password</p>
                    <form action="{{route('user.login')}}" method="post">@csrf
                        <input type="email" name="email" class="form-control mb-1" />
                        <input type="password" name="password" class="form-control" />
                        @if ($errors->any())
                            <div class="mt-2 mb-0 alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-outline-dark btn-block w-100 my-2">Login</button>

                        <a href="{{route('user.reset.password')}}" class="text-dark">Reset password</a>
                    </form>

                    <hr>
                    <h5 class="text-center">Or</h5>
                    <p class="text-center">Sign in with your Google account.</p>
                    <a href="{{route('google-login')}}" class="btn btn-outline-dark btn-block w-100 my-2">Sign in with Google</a>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
