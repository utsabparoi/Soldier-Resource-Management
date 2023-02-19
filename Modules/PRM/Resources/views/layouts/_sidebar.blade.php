{{-- biodata module --}}
<li class="{{ request()->routeIs('prm*') ? 'open active' : '' }}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-user red"></i>
        <span class="menu-text">
            PRM
        </span>
        {{-- <b class="arrow fa fa-angle-down"></b> --}}
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        {{-- camp menu item --}}
        <li class="{{ request()->routeIs('camp*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-hospital"></i>
                <span class="menu-text">Camp</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- assing camp submenu of camp --}}
                <li class="{{ request()->routeIs('assign-camp') ? 'active' : '' }}">
                    <a href="{{ route('assign-camp') }}">
                        <i class=" fa fa-plus purple"></i>
                        Assign Camp
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- add camp submenu of cam --}}
                <li class="{{ request()->routeIs('camp.create') ? 'active' : '' }}">
                    <a href="{{ route('camp.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add Camp
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'camps list' submenu of 'camp' --}}
                <li class="{{ request()->routeIs('camp.index') ? 'active' : '' }}">
                    <a href="{{ route('camp.index') }}">
                        <i class=" fa fa-list red"></i>
                        Camps List
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        {{-- person menu item --}}
        <li class="{{ request()->routeIs('') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-hospital"></i>
                <span class="menu-text">Person</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- add person submenu of person --}}
                <li class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <a href="#">
                        <i class=" fa fa-plus purple"></i>
                        Add Person
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'person list' submenu of 'person' --}}
                <li class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <a href="#">
                        <i class=" fa fa-list red"></i>
                        Person List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        {{-- course menu item --}}
        <li class="{{ request()->routeIs('course*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-graduation-cap"></i>
                <span class="menu-text">Course</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- add person submenu of person --}}
                <li class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <a href="#">
                        <i class=" fa fa-plus purple"></i>
                        Add Course
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'person list' submenu of 'person' --}}
                <li class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <a href="#">
                        <i class=" fa fa-list red"></i>
                        Course List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
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
    </ul>
</li>
