<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="row align-items-center">
      <div class="col">
    </div>
    <div class="col">
      @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <form class="" action='{{route('login')}}' method="post" enctype='multipart/form-data'>
        {{ csrf_field() }}
        <div class="mb-3">
          <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
          <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email">
          @if($errors->login->has('username'))
            <div class="error">{{ $errors->login->first('username') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Password" aria-label="Passwordlogin->first('email')" aria-describedby="basic-addon1" name="password">
          @if($errors->login->has('password'))
            <div class="error">{{ $errors->login->first('password') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck2" name="remember">
            <label class="form-check-label" for="dropdownCheck2">
              Remember me
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
        </form>
      </div>
    <div class="col">
    </div>
    </div>
  </body>
</html>
