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
        {{-- Leave Details menu item --}}

        <li class="{{ request()->routeIs('prm.leave-category*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-minus-circle red"></i>
                <span class="menu-text">Leave Category</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Category' submenu of "Leave Category" --}}
                <li class="{{ request()->routeIs('prm.leave-category.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.leave-category.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add Category
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Categories List' submenu of "Leave Category" --}}
                <li class="{{ request()->routeIs('prm.leave-category.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.leave-category.index') }}">
                        <i class=" fa fa-list red"></i>
                        Categories List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- Camp menu item --}}

        <li class="{{ request()->routeIs('prm.camp*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-campground red"></i>
                <span class="menu-text">Camp Details</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Assing Camp' submenu of "Camp" --}}
                <li class="{{ request()->routeIs('prm.assign-camp') ? 'active' : '' }}">
                    <a href="{{ route('prm.assign-camp') }}">
                        <i class=" fa fa-plus purple"></i>
                        Assign Camp
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'Add Camp' submenu of "Camp" --}}
                <li class="{{ request()->routeIs('prm.camp.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.camp.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add Camp
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'Camps List' submenu of "Camp" --}}
                <li class="{{ request()->routeIs('prm.camp.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.camp.index') }}">
                        <i class=" fa fa-list red"></i>
                        Camps List
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- Appointment Holder menu item --}}

        <li class="{{ request()->routeIs('prm.appointment-holder*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tasks red"></i>
                <span class="menu-text">Appointment Holder</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add AppointmentHolder' submenu of "Appointment Holder" --}}
                <li class="{{ request()->routeIs('prm.appointment-holder.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.appointment-holder.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add AppointmentHolder
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'AppointmentHolders list' submenu of "Appointment Holder" --}}
                <li class="{{ request()->routeIs('prm.appointment-holder.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.appointment-holder.index') }}">
                        <i class=" fa fa-list red"></i>
                        AppointmentHolders List
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- Person menu item --}}

        <li class="{{ request()->routeIs('') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">Person</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <a href="#">
                        <i class=" fa fa-plus purple"></i>
                        Add Person
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Persons List' submenu of "Person" --}}
                <li class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <a href="#">
                        <i class=" fa fa-list red"></i>
                        Persons List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- 'Training' menu item --}}

        <li class="{{ request()->routeIs('prm.training-category*', 'prm.training*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-graduation-cap red"></i>
                <span class="menu-text">Training Management</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{ request()->routeIs('prm.training-category*') ? 'open active' : ''}}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-list-alt red"></i>
                        <span class="menu-text">Training Category</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        {{-- 'Add Category' submenu of "Training Management" --}}
                        <li class="{{ request()->routeIs('prm.training-category.create') ? 'active' : '' }}">
                            <a href="{{ route('prm.training-category.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Category
                            </a>
                            <b class="arrow"></b>
                        </li>

                        {{-- 'Trainings List' submenu of "Training Management" --}}
                        <li class="{{ request()->routeIs('prm.training-category.index') ? 'active' : '' }}">
                            <a href="{{ route('prm.training-category.index') }}">
                                <i class=" fa fa-list red"></i>
                                Categories List
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>

                </li>
                <li class="{{ request()->routeIs('prm.training*') ? 'open active' : ''}}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-info-circle red"></i>
                        <span class="menu-text">Training Details</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        {{-- 'Add Training' submenu of "Training" --}}
                        <li class="{{ request()->routeIs('prm.training.create') ? 'active' : '' }}">
                            <a href="{{ route('prm.training.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Training
                            </a>
                            <b class="arrow"></b>
                        </li>

                        {{-- 'Trainings List' submenu of "Training" --}}
                        <li class="{{ request()->routeIs('prm.training.index') ? 'active' : '' }}">
                            <a href="{{ route('prm.training.index') }}">
                                <i class=" fa fa-list red"></i>
                                Trainings List
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>

                </li>
            </ul>
        </li>

        {{-- 'Course' menu item --}}

        <li class="{{ request()->routeIs('prm.course*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-graduation-cap red"></i>
                <span class="menu-text">Course</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Assing Course' submenu of "Course" --}}
                <li class="{{ request()->routeIs('prm.assign-course') ? 'active' : '' }}">
                    <a href="{{ route('prm.assign-course') }}">
                        <i class=" fa fa-plus purple"></i>
                        Assign Course
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'Add Course' submenu of "Course" --}}
                <li class="{{ request()->routeIs('prm.course.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.course.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add Course
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Courses List' submenu of 'Course' --}}
                <li class="{{ request()->routeIs('prm.course.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.course.index') }}">
                        <i class=" fa fa-list red"></i>
                        Courses List
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

        {{-- store --}}
        <li class="nav-item">
            <a href="{{ route('prm.store.index') }}">
                <i class="menu-icon fa fa-shopping-cart"></i>
                <span class="menu-text"> Store </span>
            </a>

            <b class="arrow"></b>
        </li>
    </ul>
</li>
