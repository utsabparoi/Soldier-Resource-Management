<div id="sidebar" class="sidebar                  responsive                    ace-save-state" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    {{-- Dashboard --}}
    <ul class="nav nav-list" style="top: 0px;">
        <li class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
            <a href="/" >
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- Biodata lit--}}
        <li class="nav-item">
            <a href="{{ route('website.biodata.index') }}">
                <i class="menu-icon fa fa-users"></i>
                <span class="menu-text"> Person List </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- Add Peron --}}
        <li class="nav-item">
            <a href="{{ route('website.biodata.create') }}">
                <i class="menu-icon fa fa-plus-circle"></i>
                <span class="menu-text"> Add Person </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- Add course --}}
        <li class="nav-item">
            <a href="{{ route('website.course.create') }}">
                <i class="menu-icon fa fa-plus-circle"></i>
                <span class="menu-text"> Add Course </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- assign course --}}
        <li class="nav-item">
            <a href="{{ route('website.assignCourse.create') }}">
                <i class="menu-icon fa fa-plus-circle"></i>
                <span class="menu-text"> Assign Course </span>
            </a>

            <b class="arrow"></b>
        </li>
        {{-- add punishment --}}
        <li class="nav-item">
            <a href="{{ route('website.leaveApplication.create') }}">
                <i class="menu-icon fa fa-plus-circle"></i>
                <span class="menu-text"> Leave Application </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- add punishment --}}
        <li class="nav-item">
            <a href="{{ route('website.punishment.create') }}">
                <i class="menu-icon fa fa-plus-circle"></i>
                <span class="menu-text"> Add Punishment </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- Slider List --}}
{{--        <li class="nav-link {{ request()->is('sliders*') ? 'active' : '' }}">--}}
{{--            <a href="" >--}}
{{--                <i class="menu-icon fa fa-list"></i>--}}
{{--                <span class="menu-text"> Slider List </span>--}}
{{--            </a>--}}

{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Site Information --}}
{{--        <li class="nav-link {{ request()->is('websiteInformation*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-info-circle"></i>--}}
{{--                <span class="menu-text"> Site Information </span>--}}
{{--            </a>--}}

{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Branch Information --}}
{{--        <li class="nav-link {{ request()->is('biodata*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-user-md"></i>--}}
{{--                <span class="menu-text">Branch</span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Doctor Department --}}
{{--        <li class="nav-link {{ request()->is('department*') ? 'active' : '' }}">--}}
{{--            <a href="#" class="dropdown-toggle">--}}
{{--                <i class="menu-icon fa fa-list-alt" aria-hidden="true"></i>--}}
{{--                <span class="menu-text"> Doctor Department </span>--}}

{{--                <b class="arrow fa fa-angle-down"></b>--}}
{{--            </a>--}}

{{--            <b class="arrow"></b>--}}

{{--            <ul class="submenu">--}}
{{--                <li class="nav-link {{ request()->is('departmentCreate*') ? 'active' : '' }}">--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        Create Department--}}
{{--                    </a>--}}

{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}

{{--                <li class="nav-link {{ request()->is('allDepartment*') ? 'active' : '' }}">--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        Department List--}}
{{--                    </a>--}}

{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        {{-- Doctor Information --}}
{{--        <li class="nav-link {{ request()->is('doctors*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-user-md"></i>--}}
{{--                <span class="menu-text">Doctor Information</span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Diagonstic Test --}}
{{--        <li class="nav-link {{ request()->is('diagnosticTest*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-stethoscope"></i>--}}
{{--                <span class="menu-text">Diagonstic Test</span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Health Package --}}
{{--        <li class="nav-link">--}}
{{--            <a href="#" class="dropdown-toggle">--}}
{{--                <i class="menu-icon fa fa-list-alt" aria-hidden="true"></i>--}}
{{--                <span class="menu-text">Health Package</span>--}}

{{--                <b class="arrow fa fa-angle-down"></b>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}

{{--            <ul class="submenu">--}}
{{--                <li class="nav-link {{ request()->is('/healthPackage*') ? 'active' : '' }}">--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        All Health Packages--}}
{{--                    </a>--}}

{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}
{{--                <li class="nav-link {{ request()->is('health_package_category*') ? 'active' : '' }}">--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        Package Category--}}
{{--                    </a>--}}

{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}

{{--                <li class="nav-link {{ request()->is('health_package_facility*') ? 'active' : '' }}">--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        Package Facility--}}
{{--                    </a>--}}

{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

        {{-- Facilities --}}
{{--        <li class="nav-link {{ request()->is('facilities*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-building"></i>--}}
{{--                <span class="menu-text"> Hospital Facilities </span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Articles & News --}}
{{--        <li class="nav-link {{ request()->is('articles_and_news*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-newspaper-o"></i>--}}
{{--                <span class="menu-text"> Articles & News </span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Parterns --}}
{{--        <li class="nav-link {{ request()->is('partners*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-group"></i>--}}
{{--                <span class="menu-text"> Our Parterns </span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Client Review --}}
{{--        <li class="nav-link {{ request()->is('clients_reviews*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-group"></i>--}}
{{--                <span class="menu-text"> Clients Review </span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- AboutUs --}}
{{--        <li class="nav-link {{ request()->is('about_us*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-info-circle"></i>--}}
{{--                <span class="menu-text"> About Us </span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- Social Links --}}
{{--        <li class="nav-link {{ request()->is('social_links*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-random"></i>--}}
{{--                <span class="menu-text"> Social Link </span>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

        {{-- User --}}
{{--        <li class="nav-link {{ request()->is('user*') ? 'active' : '' }}">--}}
{{--            <a href="">--}}
{{--                <i class="menu-icon fa fa-user"></i>--}}
{{--                <span class="menu-text"> User </span>--}}
{{--            </a>--}}

{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
