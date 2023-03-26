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
        @php
            use Module\PRM\Models\ParadeModel;
            use Module\PRM\Models\LeaveApplication;
            use Module\PRM\Models\ParadeCampMigration;
            use Illuminate\Support\Carbon;

            $check_leave = LeaveApplication::whereBetween('end_date',[Carbon::now()->subMonth(3), Carbon::now()])->pluck('parade_id');
            $totalParadeInLeave = ParadeModel::whereNotIn('id', $check_leave)->count();

            $parade_in_camp = ParadeModel::whereBetween('enrolment_date', [Carbon::now()->subDays(30), Carbon::now()])->pluck('id');
            $migrate_in_camp = ParadeCampMigration::whereBetween('migration_date', [Carbon::now()->subDays(30), Carbon::now()])->pluck('parade_id');
            $totalParadeInCamp  = ParadeModel::whereNotIn('id', $migrate_in_camp)->whereNotIn('id', $parade_in_camp)->count();

            $total_notifications = $totalParadeInLeave + $totalParadeInCamp;

        @endphp

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="dropdown-modal">
                    <div style="text-align:center;position:relative" data-toggle="dropdown" class="dropdown-toggle">
                        <a href="" style="background-color:transparent !important">
                            {{-- <i class="fa fa-bell bigger-180" style="color: rgb(255, 179, 2)"><sup style="color: red">{!! $total_notifications !!}</sup></i> --}}
                            <lottie-player
                                src="{{ asset('/frontend/lord-icon/notification-bell.json') }}"
                                background="transparent" speed="1" class="lotti-icon-center"
                                style="width: 50px; height: 100%;margin:0" loop autoplay>
                            </lottie-player>
                            <div style="position:absolute;color: rgb(0, 0, 0);top:-38%;left:45%;transform:translate(-50%, 50%);font-weight:600;">
                                {!! $total_notifications !!}
                            </div>
                        </a>

                    </div>



                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="{{ route('prm.soldiers_leave_notification') }}">Last Leave Only for 3 months <span style="color:red !important">({!! $totalParadeInLeave !!} Soldiers)</span></a>
                        </li>
                        <li>
                            <a href="{{ route('prm.soldiers_camp_notification') }}">Camp state more than 30 days <span style="color: red">({!! $totalParadeInCamp !!} Soldiers)</span></a>
                        </li>
                    </ul>
                </li>
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

