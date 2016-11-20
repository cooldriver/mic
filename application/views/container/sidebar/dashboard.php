
<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <?php include APPPATH . 'views/container/sidebar/include_search.php'; ?>

        <li>
            <a href="#"><i class="fa fa-music fa-fw"></i> Music<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a class="ajax" href="#" data-url="library_songs">Songs</a></li>
                <li><a class="ajax" href="#" data-url="library_artists">Artists</a></li>
                <li><a class="ajax" href="#" data-url="library_albums">Albums</a></li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-list fa-fw"></i> Playlists<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">Kickin' Country</a>
                </li>
                <li>
                    <a href="#">Roadtrip</a>
                </li>
                <li>
                    <a href="#">Decades <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li><a href="#">Best of 80s</a></li>
                        <li><a href="#">Best of 90s</a></li>
                        <li><a href="#">Best of 00s</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="#">...</a></li>
                <li><a href="#">...</a></li>
            </ul>
        </li>

    </ul>
</div>