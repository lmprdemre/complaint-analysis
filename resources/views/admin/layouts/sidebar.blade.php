<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<div class="navbar-default sidebar" role="navigation">


    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div><img src="/img/no-avatar.png" alt="user-img" class="img-circle"></div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@if(isset($user) && $user['company_name']){{ucfirst($user['company_name'])}}@endif<span class="caret"></span></a>
                <ul class="dropdown-menu animated flipInY">
                    <li><a href="/admin/profile"><i class="ti-user"></i> Profilim</a></li>
                    <li><a href="/" target="_blank"><i class="ti-home"></i> Ön Siteye Git</a></li>
                    <li><a href="/admin/profile"><i class="ti-settings"></i> Kullanıcı Ayarları</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <ul class="nav" id="side-menu">
            <li> <a href="/admin/analysis"><i class="fa-fw">A</i><span class="hide-menu">Analysis</span></a> </li>
            <li><a href="javascript:void(0)" class="waves-effect"><i class="fa-fw">M</i><span class="hide-menu">Management</span><span class="fa arrow"></span></a>
                <ul class="nav nav-third-level">
                    <li> <a href="/admin/categories"><i class="fa-fw">C</i><span class="hide-menu">Categories</span></a> </li>
                    <li> <a href="/admin/products"><i class="fa-fw">P</i><span class="hide-menu">Products</span></a> </li>
                    <li> <a href="/admin/branches"><i class="fa-fw">B</i><span class="hide-menu">Branches</span></a> </li>
                </ul>
            </li>
            <li> <a href="/admin/stats"><i class="mdi mdi-chart-bar fa-fw"></i><span class="hide-menu">Stats</span></a> </li>
            <li class="devider"></li>
            <li><a href="/logout" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Logout</span></a></li>
        </ul>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->