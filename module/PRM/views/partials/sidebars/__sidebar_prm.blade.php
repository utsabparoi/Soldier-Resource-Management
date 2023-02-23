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
        <li class="{{ request()->routeIs('prm.camp*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-campground red"></i>
                <span class="menu-text">Camp Details</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- assing camp submenu of camp --}}
                <li class="{{ request()->routeIs('prm.assign-camp') ? 'active' : '' }}">
                    <a href="{{ route('prm.assign-camp') }}">
                        <i class=" fa fa-plus purple"></i>
                        Assign Camp
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- add camp submenu of cam --}}
                <li class="{{ request()->routeIs('prm.camp.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.camp.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add Camp
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'camps list' submenu of 'camp' --}}
                <li class="{{ request()->routeIs('prm.camp.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.camp.index') }}">
                        <i class=" fa fa-list red"></i>
                        Camps List
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        {{-- appointment-holder menu item --}}
        <li class="{{ request()->routeIs('prm.appointment-holder*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tasks red"></i>
                <span class="menu-text">Appointment Holder</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- add appointment-holder submenu of appointment-holder --}}
                <li class="{{ request()->routeIs('prm.appointment-holder.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.appointment-holder.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add AppointmentHolder
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'AppointmentHolders list' submenu of 'appointment-holder' --}}
                <li class="{{ request()->routeIs('prm.appointment-holder.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.appointment-holder.index') }}">
                        <i class=" fa fa-list red"></i>
                        AppointmentHolder List
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        {{-- person menu item --}}
        <li class="{{ request()->routeIs('') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>
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
            <a href="#">
                <i class="menu-icon fa fa-minus-circle red"></i>
                <span class="menu-text"> Leave Application </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- add punishment --}}
        <li class="nav-item">
            <a href="#">
                <i class="menu-icon fa fa-plus-circle"></i>
                <span class="menu-text"> Add Punishment </span>
            </a>

            <b class="arrow"></b>
        </li>
    </ul>
</li>
