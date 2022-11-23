<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            <!-- pesan error -->
            <?= form_error(
                'menu',
                '<div class="alert alert-success" role="alert">
                </div>'
            ); ?>
            <?= $this->session->flashdata('message'); ?>
            <!-- akhir pesan error -->

            <!-- tombol tambah -->


            <!-- tabel -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gradient-danger">
                    <h6 class="m-0 font-waight-bold text-white "><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="col-md">
                        <a href="" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal" data-target="#logoutModal"><span class="fas fa-fw fa-plus"></span> Add Menu </a>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['menu'] ?></td>
                                        <td>
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expended="false"><i class="fas fa-cog"></i></button>
                                            <div class="dropdown-menu">

                                                <a href="<?= base_url('menu/edit'); ?>" class="dropdown-item has-icon" data-toggle="modal" data-target="#examplemodalmenuedit<?= $m['id']; ?>">
                                                    <span class="fas fa-fw fa-edit"></span>Edit</span></a>

                                                <button onclick="hapusMenu('<?= base_url('menu/hapusmenu/') . $m['id'] ?>')" class="dropdown-item has-icon">
                                                    <span class="fas fa-fw fa-trash-alt"></span>Delete</span></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

    <!-- modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                    <button type="button" class="btn-close" date-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('menu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="menu" id="menu" placeholder="Menu Name">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit -->

    <?php foreach ($menu as $m) : ?>

        <div class="modal fade" id="examplemodalmenuedit<?= $m['id']; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Edit Menu</h5>
                        <button type="button" class="btn-close" date-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('menu/menuedit'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" value="<?= $m['menu']; ?>" class="form-control" name="menu" id="menu" placeholder="menu">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" readonly value="<?= $m['id']; ?>" class="form-control" name="id" id="id">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="menuedit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;  ?>