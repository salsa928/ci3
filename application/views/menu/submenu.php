<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg">
            <!-- pesan error -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-success" role="alert">
                    <?php validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <!-- akhir pesan error -->

            <!-- tombol tambah -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gradient-danger">
                    <h6 class="m-0 font-waight-bold text-white "><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="col-md">
                        <a href="" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal" data-target="#logoutModal"><span class="fas fa-fw fa-plus"></span> Add Sub Menu </a>

                        <!-- tabel -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Url</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($submenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title'] ?></td>
                                        <td><?= $sm['menu_id'] ?></td>
                                        <td><?= $sm['url'] ?></td>
                                        <td><?= $sm['icon'] ?></td>
                                        <td><?= $sm['is_active'] ?></td>
                                        <td>
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expended="false"><i class="fas fa-cog"></i></button>
                                            <div class="dropdown-menu">
                                                <a href="" class="dropdown-item has-icon" data-toggle="modal" data-target="#examplemodalsubedit<?= $sm['id']; ?>"><span class="fas fa-fw fa-edit"></span>Edit</span></a>

                                                <button onclick="hapusSubMenu('<?= base_url('menu/hapus/') . $sm['id'] ?>')" class="dropdown-item has-icon"> <span class="fas fa-fw fa-trash-alt"></span>Delete</span></button>
                                                </button>
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

    <!-- modal tambah -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Add Sub New Menu</h5>
                    <button type="button" class="btn-close" date-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="" class="value">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="url" id="url" placeholder="Submenu url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="icon" id="icon" placeholder="Submenu icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" aria-label="Checkbox for following text input" checked>
                                <label for="is_active" class="form_check_label">Active ?</label>
                            </div>
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

    <?php foreach ($submenu as $sm) : ?>

        <div class="modal fade" id="examplemodalsubedit<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMenuModalLabel">Edit SubMenu</h5>
                        <button type="button" class="btn-close" date-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="<?= base_url('menu/submenuedit/'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" value="<?= $sm['title']; ?>" class="form-control" name="title" id="title" placeholder="Submenu title">
                            </div>

                            <div class="form-group">
                                <input type="hidden" readonly value="<?= $sm['id']; ?>" class="form-control" name="id" id="id">
                            </div>

                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="<?= $sm['menu_id']; ?>"><?= $sm['menu']; ?></option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach;  ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" value="<?= $sm['url']; ?>" class="form-control" name="url" id="url" placeholder="Submenu url">
                            </div>

                            <div class="form-group">
                                <input type="text" value="<?= $sm['icon']; ?>" class="form-control" name="icon" id="icon" placeholder="Submenu icon">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                                    <label for="is_active" class="form_check_label">Active ?</label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;  ?>