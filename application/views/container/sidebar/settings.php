<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <?php include APPPATH . 'views/container/sidebar/include_search.php'; ?>
        <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> Preferences<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a class="ajax" href="user_interface">Interface</a></li>
                <li><a class="ajax" href="user_info">User Info</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-gear fa-fw"></i> Admin<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a class="ajax" href="admin_catalog">Catalog</a></li>
                <li><a class="ajax" href="admin_users">Users</a></li>
                <li><a class="ajax" href="admin_options">Options</a></li>
            </ul>
        </li>
    </ul>
</div>