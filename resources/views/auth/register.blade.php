<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<div class="container">
   <div class="row" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>Registration</h4><hr>
            <form action="{{route('auth.create')}}" method="post">  
            @csrf
            <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" class="form-control" name="name" placeholder="Enter Name">
                 @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
              
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email address" >
                @error('email')
                    <span class="text-danger" role="alert">{{ $message }}</span>
                @enderror
            </div>
              
            <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 @error('password')
                    <span class="text-danger">{{ $message }}</span>
                 @enderror  
            </div>
              
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Enter confirm password">
                @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
              
              <button type="submit" class="btn btn-block btn-primary">Register</button>
              <br>
              <a href="{{route('login')}}">I already have an account </a>
           </form>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>