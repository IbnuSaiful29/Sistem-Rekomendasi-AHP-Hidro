<!doctype html>
<html lang="en" dir="ltr">

<head>
    <base href="{{asset('admin')}}/">
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

   <!-- FAVICON -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo-1-bg-transparan.png" />
    <!-- TITLE -->
    <title>Login | Simbabanyu</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    {{-- <link href="assets/css/dark-style.css" rel="stylesheet" /> --}}
    <link href="assets/css/transparent-style.css" rel="stylesheet">
    <link href="assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col col-login">
                                <div class="login100-form-title" style="margin:-9px;">
                                    <img src="assets/images/logo-bg-transparant-scale.png" width="150" alt="">
                                </div>
                            </div>
                            <br>
                            <span class="login100-form-title pb-5">
                                Login
                            </span>
                            <div class="panel panel-primary">
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                                @method('POST')
                                                <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a  class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input id="email" type="email" placeholder="Email" class="input100 border-start-0 form-control ms-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                </div>
                                                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                    <a class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input id="password" type="password" placeholder="Password" class="input100 border-start-0 form-control ms-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                </div>

                                                <div class="container-login100-form-btn">
                                                    <button type="submit" class="login100-form-btn btn-primary">Login</button>
                                                </div>

                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <div id="mobile-num" class="wrap-input100 validate-input input-group mb-4">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <span>+91</span>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0">
                                            </div>
                                            <div id="login-otp" class="justify-content-around mb-5">
                                                <input class="form-control text-center w-15" id="txt1" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt2" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt3" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt4" maxlength="1">
                                            </div>
                                            <span>Note : Login with registered mobile number to generate OTP.</span>
                                            <div class="container-login100-form-btn ">
                                                <a href="javascript:void(0)" class="login100-form-btn btn-primary" id="generate-otp">
                                                    Proceed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="assets/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
