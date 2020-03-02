    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-lg-12">
                <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Sub Menu</a>
                <?php if (validation_errors()) : ?>
                    <span> <i class="text-danger"><?= validation_errors(); ?></i></span>
                <?php endif; ?>

                <br>

                <?= $this->session->flashdata('pesan'); ?>

                <div class="table">

                    <table class="table-responsive" id="dataTable" width="100%" cellspacing="0">


                        <thead>
                            <tr class="bg-success">
                                <th class="text-white">No</th>
                                <th class="text-white">Menu </th>
                                <th class="text-white">Title</th>
                                <th class="text-white">Url</th>
                                <th class="text-white">Icons</th>
                                <th class="text-white">Active?</th>
                                <th class="text-white">Actions</th>

                            </tr>
                        </thead>


                        <?php $i = 1 ?>
                        <?php foreach ($submenu as $sm) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <th><?= $sm['menu']; ?></th>
                                <th><?= $sm['title']; ?></th>
                                <th><?= $sm['url']; ?></th>
                                <th><?= $sm['icons']; ?></th>
                                <th><?= $sm['is_activate']; ?></th>
                                <th>
                                    <a href="" class="badge badge-pill badge-danger">Hapus</a>
                                    <a href="" class="badge badge-pill badge-success">Edit menu</a>
                                </th>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>



            </div>


        </div>

        <!-- Logout Modal-->
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Add New Submenu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Menu/Submenu'); ?>" method="post">
                        <div class="modal-body">

                            <div class="form-group">

                                <label for="pilih menu">Pilih Menu</label>
                                <select class="form-control" name="menu" id="menu">

                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="form-group">

                                <label for="judul menu">Judul Menu</label>
                                <input type="text" class="form-control" name="title" id="judul menu">
                            </div>
                            <div class="form-group">

                                <label for="url">URL</label>
                                <input type="text" class="form-control" name="url" id="url">
                            </div>
                            <div class="form-group">

                                <label for="icons">Icons</label>
                                <input type="text" class="form-control" name="icons" id="icons">
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_activate" value="1" id="is_activate" checked>
                                <label class="form-check-label" for="defaultCheck1">Is Active?</label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>