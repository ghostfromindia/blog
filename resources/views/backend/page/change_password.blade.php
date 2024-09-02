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
                <h5 class="text-center">Change Password</h5>
                <p class="text-center">Please enter your password</p>
                <form action="{{route('user.save.password')}}" method="post">@csrf
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="code" value="{{$code}}">
                    <input type="password" name="password" class="form-control mb-1" placeholder="password" required />
                    <input type="password" name="confirm_password" class="form-control mb-1" placeholder="confirm password"  required/>
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

            </div>
        </div>

    </div>
</div>
</body>
</html>
