{{-- biodata module --}}
<li class="{{ request()->url('/') ? 'open active' : '' }} custom-item-color" style="font-family:Varela;">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-user-secret red"></i>
        <span class="menu-text">
            {{-- PRM --}}
            Perfect Ten
        </span>
        {{-- <b class="arrow fa fa-angle-down"></b> --}}
    </a>
    <b class="arrow"></b>
    <ul class="submenu">
        {{-- Leave Details menu item --}}
        <li class="{{ request()->routeIs('prm.leave-applications*') ? 'open active' : ''}} ">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-minus-circle red bigger-130"></i>
                Leave
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- <li class="{{ request()->routeIs('prm.leave-category*') ? 'open active' : ''}}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-list-alt red"></i>
                        <span class="menu-text">Category</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        <li class="{{ request()->routeIs('prm.leave-category.create') ? 'active' : '' }}">
                            <a href="{{ route('prm.leave-category.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Category
                            </a>
                            <b class="arrow"></b>
                        </li>


                        <li class="{{ request()->routeIs('prm.leave-category.index') ? 'active' : '' }}">
                            <a href="{{ route('prm.leave-category.index') }}">
                                <i class=" fa fa-list blue"></i>
                                Category List
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li> --}}
                {{-- Create a leave application submenu of leave --}}
                <li class="{{ request()->routeIs('prm.leave-applications.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.leave-applications.create') }}">
                        <i class="fa fa-paper-plane blue"></i>
                        Application
                    </a>
                </li>

                <li class="{{ request()->routeIs('prm.leave-applications.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.leave-applications.index') }}">
                        <i class="fa fa-tasks blue"></i>
                        List
                    </a>
                </li>
            </ul>

        </li>

        {{-- Camp menu item --}}

        <li class="{{ request()->routeIs('prm.parade-camp-migrate','prm.bulk-camp-migrate', 'prm.parade-migrate*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-exchange red bigger-130"></i>
                <span class="menu-text">Soldier Migration</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Migrate Camp' submenu of "Migration" --}}
                <li class="{{ request()->routeIs('prm.parade-camp-migrate') ? 'active' : '' }}">
                    <a href="{{ route('prm.parade-camp-migrate') }}">
                        <i class="fa fa-exchange blue"></i>
                        Soldier Camp-Migration
                    </a>
                    <b class="arrow"></b>
                </li>
                {{-- 'Migrate Rank' submenu of "Migration" --}}
                <li class="{{ request()->routeIs('prm.bulk-camp-migrate') ? 'active' : '' }}">
                    <a href="{{ route('prm.bulk-camp-migrate') }}">
                        <i class="fa fa-exchange blue"></i>
                        Bulk Camp-Migration
                    </a>

                    <b class="arrow"></b>
                </li>

                <li class="{{ request()->routeIs('prm.parade-migrate.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.parade-migrate.index') }}">
                        <i class="fa fa-exchange blue"></i>
                        All Migration List
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- Appointment Holder menu item --}}

        <li class="{{ request()->routeIs('prm.appointment-holder*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-tasks red bigger-130"></i>
                <span class="menu-text">Appointment Holder</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add AppointmentHolder' submenu of "Appointment Holder" --}}
                <li class="{{ request()->routeIs('prm.appointment-holder.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.appointment-holder.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add New
                    </a>

                    <b class="arrow"></b>
                </li>
                {{-- 'AppointmentHolders list' submenu of "Appointment Holder" --}}
                <li class="{{ request()->routeIs('prm.appointment-holder.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.appointment-holder.index') }}">
                        <i class=" fa fa-list red"></i>
                        List
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- Person menu item --}}

        <li class="{{ request()->routeIs('prm.parade*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user bigger-130"></i>
                <span class="menu-text">Soldier</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="{{ request()->routeIs('prm.parade.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.parade.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add New
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Persons List' submenu of "Person" --}}
                <li class="{{ request()->routeIs('prm.parade.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.parade.index') }}">
                        <i class=" fa fa-list red"></i>
                        List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- 'Training' menu item --}}

        <li class="{{ request()->routeIs('prm.training*') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-info-circle red bigger-130"></i>
                <span class="menu-text">Training</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Training' submenu of "Training" --}}
                <li class="{{ request()->routeIs('prm.training.create') ? 'active' : '' }}">
                    <a href="{{ route('prm.training.create') }}">
                        <i class=" fa fa-plus purple"></i>
                        Add New
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Trainings List' submenu of "Training" --}}
                <li class="{{ request()->routeIs('prm.training.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.training.index') }}">
                        <i class=" fa fa-list red"></i>
                        List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>

        </li>

        {{-- 'Course' menu item --}}

        <li class="{{ request()->routeIs('prm.parade-courses*', 'prm.assign-course') ? 'open active' : ''}}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-graduation-cap red bigger-130"></i>
                <span class="menu-text">Soldier Course</span>
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

                <li class="{{ request()->routeIs('prm.parade-courses.index') ? 'active' : '' }}">
                    <a href="{{ route('prm.parade-courses.index') }}">
                        <i class=" fa fa-list red"></i>
                        List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- add punishment --}}
        <li class="nav-item">
            <a href="#">
                <i class="menu-icon fa fa-plus-circle bigger-130"></i>
                <span class="menu-text"> Add Punishment </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- store --}}
        <li class="nav-item">
            <a href="{{ route('prm.store.index') }}">
                <i class="menu-icon fa fa-shopping-cart bigger-130"></i>
                <span class="menu-text"> Store </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="{{ request()->routeIs('prm.leave-category*', 'prm.camp*', 'prm.training-category*', 'prm.course*') ? 'open active' : ''}}">
            <a href="" class="dropdown-toggle">
                <i class="menu-icon fa fa-gear fa-spin red bigger-130"></i>
                <span class="menu-text">All Settings</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- Leave Setting --}}
                <li class="{{ request()->routeIs('prm.leave-category*') ? 'open active' : ''}}">
                    <a href="" class="dropdown-toggle">
                        <i class="menu-icon fa fa-minus-circle red"></i>
                        <span class="menu-text">Leave Category</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        {{-- 'Add Category' submenu of "Leave Category" --}}
                        <li class="{{ request()->routeIs('prm.leave-category.create') ? 'active' : '' }}">
                            <a href="{{ route('prm.leave-category.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add New
                            </a>

                        </li>

                        {{-- 'Categories List' submenu of "Leave Category" --}}
                        <li class="{{ request()->routeIs('prm.leave-category.index') ? 'active' : '' }}">
                            <a href="{{ route('prm.leave-category.index') }}">
                                <i class=" fa fa-list blue"></i>
                                List
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                {{-- Camp Setting --}}
                <li class="{{ request()->routeIs('prm.camp*') ? 'open active' : ''}}">
                    <a href="" class="dropdown-toggle">
                        <i class="menu-icon fa fa-campground red"></i>
                        <span class="menu-text">Camp</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li class="{{ request()->routeIs('prm.camp.create') ? 'active' : '' }}">
                            <a href="{{ route('prm.camp.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add New
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{{ request()->routeIs('prm.camp.index') ? 'active' : '' }}">
                            <a href="{{ route('prm.camp.index') }}">
                                <i class=" fa fa-list red"></i>
                                List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                {{-- Training Setting --}}
                <li class="{{ request()->routeIs('prm.training-category*') ? 'open active' : ''}}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-list-alt red"></i>
                        <span class="menu-text">Training Category</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    {{-- <b class="arrow"></b> --}}
                    <ul class="submenu">
                        {{-- 'Add Category' submenu of "Training Management" --}}
                        <li class="{{ request()->routeIs('prm.training-category.create') ? 'active' : '' }}">
                            <a href="{{ route('prm.training-category.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add New
                            </a>
                            <b class="arrow"></b>
                        </li>

                        {{-- 'Trainings List' submenu of "Training Management" --}}
                        <li class="{{ request()->routeIs('prm.training-category.index') ? 'active' : '' }}">
                            <a href="{{ route('prm.training-category.index') }}">
                                <i class=" fa fa-list red"></i>
                                List
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>

                </li>

                <li class="{{ request()->routeIs('prm.course*') ? 'open active' : ''}}">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-graduation-cap red"></i>
                        <span class="menu-text">Course</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li class="{{ request()->routeIs('prm.course.create') ? 'active' : '' }}">
                            <a href="{{ route('prm.course.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add New
                            </a>
                            <b class="arrow"></b>
                        </li>


                        <li class="{{ request()->routeIs('prm.course.index') ? 'active' : '' }}">
                            <a href="{{ route('prm.course.index') }}">
                                <i class=" fa fa-list red"></i>
                                List
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                {{-- 'Trainings List' submenu of "Training Management" --}}
                <li class="">
                    <a href="" class="dropdown-toggle">
                        <i class="menu-icon fa fa-minus-circle red"></i>
                        <span class="menu-text">APR</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        {{-- 'Add Category' submenu of "Leave Category" --}}
                        <li class="">
                            <a href="{{ route('prm.apr.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Report
                            </a>

                        </li>

                        {{-- 'Categories List' submenu of "Leave Category" --}}
                        <li class="">
                            <a href="{{ route('prm.apr.index') }}">
                                <i class=" fa fa-list blue"></i>
                                All Report
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                {{-- vehicle --}}
                <li class="">
                    <a href="" class="dropdown-toggle">
                        <i class="menu-icon fa fa-minus-circle red"></i>
                        <span class="menu-text">Vehicle</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li class="">
                            <a href="{{ route('prm.vehicle.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Vehicle
                            </a>

                        </li>
                        <li class="">
                            <a href="{{ route('prm.vehicle.index') }}">
                                <i class=" fa fa-list blue"></i>
                                All Vehicle
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
</li>
