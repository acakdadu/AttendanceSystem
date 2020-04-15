<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>AppName - Login</title>

        <link
            rel="icon"
            type="image/png"
            href="http://poscoictindonesia.co.id/img/icons/favicon.ico">

        <!-- Custom fonts for this template-->
        <link
            href="{{ asset('sb2/vendor/fontawesome-free/css/all.min.css') }}"
            rel="stylesheet"
            type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('sb2/css/sb-admin-2.css') }}" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>

                                        {{-- Alert for failed!  --}}
                                        @if (session('alert'))
                                        <div class="alert alert-danger">{{ session('alert') }}</div>
                                        @endif
                                        @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        <form method="post" class="user">
                                            @csrf
                                            <div class="form-group">
                                                <input name="emp_id" value="{{old('emp_id')}}" type="text" class="form-control form-control-user @error('emp_id') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Code ID">
                                                    {{-- @error('emp_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                     @enderror --}}
                                            </div>

                                            <div class="form-group">
                                                <input name="password" value="{{old('password')}}" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Enter Password">
                                                    {{-- @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                     @enderror --}}
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input name="remember" value="{{ old('remember_token') ? 'checked' : '' }}" type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label  class="custom-control-label" for="customCheck">Remember Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <hr>
                                        </form>

                                        <h5 class="font-weight-bold">Covid-19.
                                            <kbd class="font-weight-light">update</kbd>
                                        </h5>


                                        {{-- DATA CORONA --}}
                                        @foreach ($corona as $corona)
                                        <div class="row mt-4">
                                            <div class="col text-center">
                                                <div class="card border-left-info shadow">
                                                    <div class="card-body">
                                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sembuh</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $corona['Kasus_Semb'] }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="card border-left-warning shadow">
                                                    <div class="card-body">
                                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Meninggal</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $corona['Kasus_Meni'] }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col text-center">
                                                <div class="card border-left-danger shadow">
                                                    <div class="card-body">
                                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Positif</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $corona['Kasus_Posi'] }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{-- DATA CORONA --}}

                                        <hr>
                                        <p>Data in Banten Area, source from
                                            <a href="#">covid19.go.id</a>.
                                            <br>Be awere for your health everyone, family, and friends. Social Distancing
                                                everywhere.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('sb2/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('sb2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('sb2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('sb2/js/sb-admin-2.min.js') }}"></script>

    </body>

</html>
