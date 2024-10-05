<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>



    <link rel="stylesheet" href="{{asset('theme/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/vendor.bundle.base.css')}}">


    <link rel="stylesheet" href="{{asset('theme/style.css')}}">

    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form method="POST" action="{{ route('login') }}" class="">
                                @csrf
                                <div class="form-group">
                                    <label>Correo *</label>
                                    <input type="email" class="form-control p_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="EMAIL">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Contraseña *</label>
                                    <input id="password" type="password" class="form-control p_input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="CONTRASEÑA">
                                </div>

                                <div class="remember-forgot">

                                    <a class="" href="{{ route('profesor.login') }}">
                                        {{ __('LOGIN PROFESOR ') }}
                                    </a>

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('theme/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('theme/js/off-canvas.js')}}"></script>
    <script src="{{asset('theme/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('theme/js/misc.js')}}"></script>
    <script src="{{asset('theme/js/settings.js')}}"></script>
    <script src="{{asset('theme/js/todolist.js')}}"></script>
    <!-- endinject -->
</body>

</html>