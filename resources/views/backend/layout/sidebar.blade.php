<div id="sidebar" class="sidebar responsive ace-save-state" data-sidebar="true"
    data-sidebar-scroll="true" data-sidebar-hover="true">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>

    {{-- Dashboard --}}
    <ul class="nav nav-list" style="top: 0px;font-family:Varela;">
        <li class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
            <a href="/">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>

        {{-- This include is comming from module sidebar all menu items --}}
        @include('partials.sidebars.__sidebar_prm')

        <li>
            <a href="{{ route('prm.organization_info') }}">
                <i class="menu-icon fa fa-info"></i>
                Organization Info
                {{-- <b class="arrow fa fa-angle-down"></b> --}}
            </a>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-user"></i>
                Admin-User
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li>
                    <a href="">
                        <i class="menu-icon fa fa-plus"></i>
                        Add
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="menu-icon fa fa-list"></i>
                        List
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                </li>
            </ul>
        </li>

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
                data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
</div>
