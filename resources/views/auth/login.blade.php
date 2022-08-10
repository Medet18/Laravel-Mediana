<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<div class="container">
   <div class="row" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>Login</h4><hr>
            <form action="">  
            @csrf
              <div class="form-group">
                 <label for="name">Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Enter email address" >
              </div>
              <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
              </div>

              <button type="submit" class="btn btn-block btn-primary">Sign In</button>
              <br>
              <a href="{{ route('register') }}">I don't have an account, create new</a>
           </form>
      </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>