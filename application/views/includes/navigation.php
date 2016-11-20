<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= URL::site('dashboard', $protocol); ?>">Music in Cloud</a>
    </div>
    <!-- /.navbar-header -->

    <?php include APPPATH . 'views/includes/navbar.php'; ?>
    <?php include APPPATH . 'views/includes/sidebar.php'; ?>
    
</nav>