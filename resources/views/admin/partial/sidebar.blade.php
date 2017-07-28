<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{URL::asset('')}}admin" class="site_title"><i class="fa fa-paw"></i> <span>ADMIN</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{URL::asset('')}}images/users/{{Session::get('avatar')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Hi,{{Session::get('username')}}</span>

            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-table"></i> Property management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{URL::asset('')}}admin/new-property">Add new property</a></li>
                            <li><a href="{{URL::asset('')}}admin">List of property</a></li>
                            <li><a href="{{URL::asset('')}}admin/status-feature-property">List of Feature</a></li>
                        </ul>
                    </li>
                    {{--<li><a href="{{URL::asset('')}}admin/menu-management"><i class="fa fa-bug"></i> Menu management</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="{{URL::asset('')}}admin/slider-management"><i class="fa fa-bug"></i> Sliders management</a>--}}
                    {{--</li>--}}
                    <li><a><i class="fa fa-bug"></i> News management
                            <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{URL::asset('')}}admin/create-news">Add news</a></li>
                            <li><a href="{{URL::asset('')}}admin/news-management">List of news</a></li>
                        </ul>
                    </li>
                    {{--<li><a href="{{URL::asset('')}}admin/about-management"><i class="fa fa-bug"></i>About management</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="{{URL::asset('')}}admin/contact-management"><i class="fa fa-bug"></i> Contact--}}
                            {{--management</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="{{URL::asset('')}}admin/agent-management"><i class="fa fa-bug"></i> Agent--}}
                            {{--management</a>--}}
                    {{--</li>--}}
                </ul>
            </div>
            <div class="menu_section">
                <h3>System config</h3>
                {!! \App\Http\Controllers\Admin\BaseController::Index() !!}
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