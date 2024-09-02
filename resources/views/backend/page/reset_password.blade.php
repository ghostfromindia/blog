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
                @isset($mail)
                    <h5 class="text-center">Mail sent !</h5>
                    <p class="text-center">Please check your mail</p>
                    @else
                <h5 class="text-center">Reset Password</h5>
                <p class="text-center">Please enter your email address</p>
                <form action="{{route('user.reset.password')}}" method="post">@csrf
                    <input type="email" name="email" class="form-control mb-1" />
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
                </form>
                @endif
            </div>
        </div>

    </div>
</div>
</body>
</html>
