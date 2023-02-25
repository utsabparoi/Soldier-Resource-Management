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
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text">
                    Biodata
                </span>
                {{-- <b class="arrow fa fa-angle-down"></b> --}}
            </a>
        </li>
        {{-- PRM sidebar from module --}}
        @include('partials.sidebars.__sidebar_prm')

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
