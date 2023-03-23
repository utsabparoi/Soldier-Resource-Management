@extends('layouts.app')

@section('content')
    <style>
        /* lottie or lord-icon position center */
        .lotti-icon-center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: -35px;
            margin-bottom: -20px;
            width: 50%;
        }

        /* custom-desing button */
        @media (min-width: 768px) {}

        .button-submit {
            font-size: 1.5rem;
            padding: 0.75rem 2rem;
        }

        .button-submit {
            appearance: none;
            background-color: #f2f2f2;
            border-radius: 40em;
            border-style: none;
            box-shadow: #adcfff 0 -12px 6px inset;
            box-sizing: border-box;
            color: #000000;
            cursor: pointer;
            display: inline-block;
            font-family: -apple-system, sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            letter-spacing: -.24px;
            margin: 0;
            outline: none;
            padding: 1rem 1.3rem;
            quotes: auto;
            text-align: center;
            text-decoration: none;
            transition: all .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-submit:hover {
            background-color: #FFC229;
            box-shadow: #ff6314 0 -6px 8px inset;
            transform: scale(1.125);
        }

        @font-face {
            font-family: MariendaBold;
            src: url("{{ asset('/backend/fonts/Merienda/static/Merienda-SemiBold.ttf') }}");
        }

        @font-face {
            font-family: Merienda;
            src: url("{{ asset('/backend/fonts/Merienda/Merienda-VariableFont_wght.ttf') }}");
        }
    </style>

    <div class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1" style="margin-top: 80px">
                        <div class="login-container">
                            <div class="center">
                                <h1 style="font-family:MariendaBold">
                                    {{-- <i class="ace-icon fa fa-user green"></i> --}}
                                    <img src="{{ asset('logo.png') }}" alt="" style="width: 40px;height:100%;">
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

                            <div class="position-relative" style="font-family: Merienda !important">
                                <div id="login-box" class="login-box visible widget-box no-border"
                                    style="border-radius:10px;">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="lighter bigger text-center">
                                                <lottie-player
                                                    src="{{ asset('/frontend/lord-icon/25344-army-soldiers.json') }}"
                                                    background="transparent" speed="1" class="lotti-icon-center"
                                                    style="width: 220px; height: 200px;" loop autoplay></lottie-player>
                                            </h4>

                                            {{-- <div class="space-6"></div> --}}
                                            <h4>
                                                <div align="center" id="loginFailed" style="color: red;"></div>
                                            </h4>
                                            {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                value="{{ old('email') }}" name="email" id="email"
                                                                required autocomplete="email" autofocus
                                                                placeholder="Username"
                                                                style="border-radius:10px !important; box-shadow: inset 0 0 10px #6c7075!important;" />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                id="password" name="password" placeholder="Password"
                                                                required autocomplete="current-password"
                                                                style="border-radius:10px !important; box-shadow: inset 0 0 10px #6c7075!important;" />
                                                            @error('password')
                                                                <span class="invalid-feedback text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix" style="font-family:Merienda">
                                                        <label class="form-check-label inline" for="remember">
                                                            <input type="checkbox" class="ace" type="checkbox"
                                                                name="remember" id="remember"
                                                                {{ old('remember') ? 'checked' : '' }} />
                                                            <span class="lbl"> {{ __('Remember Me') }}</span>
                                                        </label>

                                                        <button type="submit" class="button-submit pull-right"
                                                            style="font-family:Merienda !important;margin-top:-8px; padding: 5px 10px 5px 10px;font-size:12px;">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110"
                                                                onclick="playAudio()">{{ __('Login') }}</span>
                                                        </button>
                                                        @if (Route::has('password.request'))
                                                            {{--                                                        <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                                                            {{--                                                            {{ __('Forgot Your Password?') }} --}}
                                                            {{--                                                        </a> --}}
                                                        @endif
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>

                                        </div><!-- /.widget-main -->
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
                                                            <input type="email" class="form-control"
                                                                placeholder="Email" />
                                                            <i class="ace-icon fa fa-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <div class="clearfix">
                                                        <button type="button"
                                                            class="width-35 pull-right btn btn-sm btn-danger">
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
                                                            <input type="email" class="form-control" id="email"
                                                                placeholder="Email" />
                                                            <i class="ace-icon fa fa-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" id="username"
                                                                placeholder="Username" />
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" id="password"
                                                                placeholder="Password" />
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control"
                                                                id="repeatPassword" placeholder="Repeat password" />
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

                                                        <button type="button"
                                                            class="width-65 pull-right btn btn-sm btn-success"
                                                            onclick="registerSuperAdmin()">
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

                            {{--                        <div class="navbar-fixed-top align-right"> --}}
                            {{--                            <br /> --}}
                            {{--                            &nbsp; --}}
                            {{--                            <a id="btn-login-dark" href="#">Dark</a> --}}
                            {{--                            &nbsp; --}}
                            {{--                            <span class="blue">/</span> --}}
                            {{--                            &nbsp; --}}
                            {{--                            <a id="btn-login-blur" href="#">Blur</a> --}}
                            {{--                            &nbsp; --}}
                            {{--                            <span class="blue">/</span> --}}
                            {{--                            &nbsp; --}}
                            {{--                            <a id="btn-login-light" href="#">Light</a> --}}
                            {{--                            &nbsp; &nbsp; &nbsp; --}}
                            {{--                        </div> --}}
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->
    </div>


    <script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('frontend/js/lottie-player.js') }}"></script>
@endsection
