<!DOCTYPE html>
<html>
<head>
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
    <body class="bg-dark" >
            <div class="container">
                        <div class="card card-login mx-auto mt-5">
                            <div class="card-header">Login</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf

                                        <div class="form-group">

                                                 <label for="exampleInputEmail1">Email address</label>
                                            <div>
                                                <input id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                               
                                            </div>
                                        </div> 

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>

                                       
                                            <input id="exampleInputPassword1" type="password" placeholder="Enter Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                       
                                    </div>

                                    <div class="form-group">
                                        
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        
                                    </div>

                                    <div class="form-group >
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                {{ __('Login') }}
                                            </button>

                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    
               
            </div>
           
    </body>
</html>        
