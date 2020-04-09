<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" class="js-site-favicon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/libraries/bootstrap-4/css/bootstrap.min.css') }}">
    
    <!-- Font awesome 4 -->
    <link rel="stylesheet" href="{{ asset('assets/libraries/font-awesome-4/css/font-awesome.min.css') }}">
   
    <!-- MyStyle -->
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">

    <!-- Only this Page -->
    <link rel="stylesheet" href="{{ asset('assets/css/authentication.css') }}">

    <title>Laravel</title>
  </head>
  <body>

    <div class="row no-gutters">
      <div class="col-lg-4 no-gutters left d-flex justify-content-center align-items-center">
      <!-- Images Banner -->
      </div>
      <div class="col-lg-8 no-gutters right">
        <div class="h-100 row align-items-center no-gutters">
          <div class="col-10 offset-1 col-lg-8 offset-lg-2">
            
            <h4 class="mb-5"><a href="#" class="text-decoration-none"><kbd>COVID-19.</kbd></a></h4>
            <p>Welcome back,<br>
            <span id="hiText">Please sign in to your account.</span></p>
            

            <form action="#" method="POST">
              <hr class="mb-3">
              <div class="form-row" id="formSignIn">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" name="username" maxlength="15" class="form-control form-control-sm" id="inputUsername" aria-describedby="usernameHelp">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" class="form-control form-control-sm" id="inputPassword">
                  </div>
                </div>
              </div>
              <div class="form-row" id="formRecover" style="display: none;">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="inputUsernameRecover">Username</label>
                    <input type="text" name="usernameRecover" maxlength="25" class="form-control form-control-sm" id="inputUsernameRecover" aria-describedby="usernameRecoverHelp">
                    <small id="usernameRecoverHelp" class="form-text text-muted mb-0">You'll get code for confirm to Administrator.</small>
                  </div>
                </div>
              </div>
              <hr class="mt-2">
              <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm" id="formSend">Login to Dashboard</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS -->
    <script src="{{ asset('assets/libraries/jquery-3/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/libraries/bootstrap-4/js/bootstrap.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        console.log( "ready!" );
    });
    </script>
  </body>
</html>