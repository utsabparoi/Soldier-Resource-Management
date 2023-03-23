<div id="navbar" class="navbar navbar-default          ace-save-state"  style="background:rgb(57, 6, 152) !important;">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar" style="background-color: #07396d !important;">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header">
            <img class="pull-left" src="{{ asset('logo.png') }}" alt="" style="width: 35px;height:100%;margin:4px 0 0 4px">
            <a href="/" class="navbar-brand" style="font-family: MariendaBold">
                <small>
                    PERFECT TEN
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle" style="background-color: rgb(50, 8, 129) !important;">
                        <i class="ace-icon fa fa-user blue"></i>
                        <span class="user-info">
                                    <small style="font-family:Merienda">Welcome &nbsp; <i class="ace-icon fa fa-caret-down"></i></small>
                                     <span>{{ auth()->user()->name }}</span>
                                </span>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        {{-- <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li> --}}

                        <li>
                            <a href="{{ route('user_index') }}">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-sign-out"></i> <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

