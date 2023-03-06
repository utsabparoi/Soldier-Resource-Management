
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{asset('backend/css/fonts.googleapis.com.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{asset('backend/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
    <link rel="stylesheet" href="{{asset('backend/css/ace-part2.min.css')}}" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{asset('backend/css/ace-skins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/ace-rtl.min.css')}}" />

<!--[if lte IE 9]>
    <link rel="stylesheet" href="{{asset('backend/css/ace-ie.min.css')}}" />
    <![endif]-->
    <style>
        /* lottie or lord-icon position center */
        .lotti-icon-center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top:-35px;
            margin-bottom: -20px;
            width: 50%;
        }
    </style>

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{asset('backend/js/ace-extra.min.js')}}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
    <script src="{{asset('backend/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('backend/js/respond.min.js')}}"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-user green"></i>
                            <span class="red">PERFECT</span>
                            <span class="white" id="id-text2">TEN</span>
                        </h1>
                    </div>
                    <audio style="display: none;" id="themesound" controls autoplay>
                        <source src="{{ asset('audio/themsound.mp3') }}" type="audio/mpeg">
                    </audio>

                    <script>
                        setInterval(playAudio);
                        var x = document.getElementById("themesound");
                        function playAudio() {
                            x.play();
                        }
                    </script>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border" style="border-radius:10px">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="lighter bigger text-center">
                                        {{-- <lottie-player src="{{ asset('/frontend/lord-icon/96957-lock.json') }}"
                                        background="transparent" speed="1" class="lotti-icon-center" style="width: 70px; height: 70px;" loop
                                        autoplay></lottie-player>
                                        Sign in --}}
                                        <lottie-player src="{{ asset('/frontend/lord-icon/25344-army-soldiers.json') }}"
                                        background="transparent" speed="1" class="lotti-icon-center" style="width: 220px; height: 200px;" loop
                                        autoplay></lottie-player>
                                    </h4>

                                    {{-- <div class="space-6"></div> --}}
                                    <h4><div align="center" id="loginFailed" style="color: red;"></div></h4>

                                    <form>
                                        @csrf
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" id="userEmail" placeholder="Username" />
															<div id="useremailRequire" style="color: red;"></div>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="passWord" placeholder="Password" />
															<div id="passwordRequire" style="color: red;"></div>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"> Remember Me</span>
                                                </label>

                                                <button type="button" class="width-35 pull-right btn btn-sm btn-primary" onclick="login()">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110" onclick="playAudio()">Login</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>
                                    {{-- <div>
                                        <lottie-player src="{{ asset('/frontend/lord-icon/25344-army-soldiers.json') }}"
                                        background="transparent" speed="1" class="lotti-icon-center" style="width: 220px; height: 200px;" loop
                                        autoplay></lottie-player>

                                    </div> --}}
                                    {{-- <div class="social-or-login center">
                                        <span class="bigger-110">Or Login Using</span>
                                    </div> --}}

                                    {{-- <div class="space-6"></div> --}}

                                    {{-- <div class="social-login center">
                                        <a class="btn btn-primary">
                                            <i class="ace-icon fa fa-facebook"></i>
                                        </a>

                                        <a class="btn btn-info">
                                            <i class="ace-icon fa fa-twitter"></i>
                                        </a>

                                        <a class="btn btn-danger">
                                            <i class="ace-icon fa fa-google-plus"></i>
                                        </a>
                                    </div> --}}
                                </div><!-- /.widget-main -->

                                {{-- <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" data-target="#forgot-box" class="forgot-password-link">
                                            <i class="ace-icon fa fa-arrow-left"></i>
                                            I forgot my password
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" data-target="#signup-box" class="user-signup-link">
                                            I want to register
                                            <i class="ace-icon fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div> --}}
                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                        <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="ace-icon fa fa-key"></i>
                                        Retrieve Password
                                    </h4>

                                    <div class="space-6"></div>
                                    <p>
                                        Enter your email and to receive instructions
                                    </p>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">Send Me!</span>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /.widget-main -->

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        Back to login
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.forgot-box -->

                        <div id="signup-box" class="signup-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="ace-icon fa fa-users blue"></i>
                                        New User Registration
                                    </h4>

                                    <div class="space-6"></div>
                                    <p> Enter your details to begin: </p>

                                    <form>
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" id="email" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" id="username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" id="repeatPassword" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                            </label>

                                            <label class="block">
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">Reset</span>
                                                </button>

                                                <button type="button" class="width-65 pull-right btn btn-sm btn-success" onclick="registerSuperAdmin()">
                                                    <span class="bigger-110">Register</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    <a href="#" data-target="#login-box" class="back-to-login-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        Back to login
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.signup-box -->
                    </div><!-- /.position-relative -->

                    <div class="navbar-fixed-top align-right">
                        <br />
                        &nbsp;
                        <a id="btn-login-dark" href="#">Dark</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-blur" href="#">Blur</a>
                        &nbsp;
                        <span class="blue">/</span>
                        &nbsp;
                        <a id="btn-login-light" href="#">Light</a>
                        &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->



<!--super_admin login-->
<script type="text/javascript">
    function login(){
        let email = document.getElementById("userEmail").value;
        let password = document.getElementById("passWord").value;
        if (email === "") {
            document.getElementById('useremailRequire').innerHTML = "Email required*";
        }
        else if(password === ""){
            document.getElementById('useremailRequire').innerHTML = "";
            document.getElementById('passwordRequire').innerHTML = "Password required*";
        }
        else{
            document.getElementById('passwordRequire').innerHTML = "";
            let url = "/login";
            const formData = new FormData();
            formData.append('Email', email);
            formData.append('Password', password);
            let configuration = {headers:{"content-type" : "multipart/form-data"},
                onUploadProgress: function (progressEvent) {
                    let uploadProgressPercent = Math.round((progressEvent.loaded*100)/progressEvent.total)
                    document.getElementById("uploadPercent").innerHTML = uploadProgressPercent+'%';
                }
            };
            axios.post(url, formData, configuration).then(function (response) {
                document.getElementById("loginFailed").innerHTML = "";
                location.href = "/";
            }).catch(function (error) {
                document.getElementById("loginFailed").innerHTML = "Email or Password wrong";
            })
        }
    }
</script>
<script src="{{ asset('/backend/js/axios.min.js') }}"></script>
<script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('frontend/js/lottie-player.js') }}"></script>
</body>
</html>
