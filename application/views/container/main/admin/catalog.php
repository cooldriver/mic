<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Catalog</h1>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current catalogs
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Path</th>
                                        <th>Creation date</th>
                                        <th>Modification date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($catalogs as $catalog) { ?>
                                    <tr>
                                        <td><?= $catalog->id; ?></td>
                                        <td><?= $catalog->name; ?></td>
                                        <td><?= $catalog->path; ?></td>
                                        <td><?= $catalog->creation_date; ?></td>
                                        <td><?= $catalog->modification_date; ?></td>
                                        <td><?= $catalog->status; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <p>
                            <button type="button" class="btn btn-primary ajax" data-url="admin_catalog/add">Add new catalog</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>