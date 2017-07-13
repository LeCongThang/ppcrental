<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ADMIN</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{URL::asset('')}}images/users/default.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Hi,{{Session::get('username')}}</span>

            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="index2.html">Dashboard2</a></li>
                            <li><a href="index3.html">Dashboard3</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="tables.html">Tables</a></li>
                            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                        </ul>
                    </li>
                    <li><a href="{{URL::asset('')}}admin/1-menu-management"><i class="fa fa-bug"></i> Menu management</a>
                    </li>
                    <li><a href="{{URL::asset('')}}admin/1-menu-management"><i class="fa fa-bug"></i> Send mail example</a>
                    </li>
                    <li><a href="{{URL::asset('')}}admin/resize-image"><i class="fa fa-bug"></i> Resize image example</a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>System config</h3>
                <ul class="nav side-menu">
                    <li><a href="{{URL::asset('')}}admin/system-config"><i class="fa fa-bug"></i> System information</a>
                    </li>
                    <li><a href="{{URL::asset('')}}admin/system-language"><i class="fa fa-windows"></i> System language</a>

                    </li>
                    <li><a href="{{URL::asset('')}}admin/system-permission"><i class="fa fa-sitemap"></i> System permission</a>

                    </li>
                    <li><a href="{{URL::asset('')}}/admin/theme"><i class="fa fa-laptop"></i> System theme</a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{URL::asset('')}}admin/log-out">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>