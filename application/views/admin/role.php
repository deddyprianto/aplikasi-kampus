    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-lg-10">
                <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#role">Tambah Role Admin</a>


                <?= $this->session->flashdata('message', '<div class="alert alert-success">', '</div>'); ?>

                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr class="bg-primary">
                                <th class="text-white">No</th>
                                <th class="text-white">Menu</th>
                                <th class="text-white">Actions</th>

                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <th><?= $r['role']; ?></th>
                                
                                <th>
                                    <a href="<?= base_url('admin/rolee/') . $r['id']; ?>" class="badge badge-warning">Role Menu</a>
                                    <a href="" class="badge badge-danger">Hapus</a>
                                    <a href="" class="badge badge-success">Edit</a>
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
        <div class="modal fade" id="role" tabindex="-1" role="dialog" aria-labelledby="roleLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="roleLabel">Form Add New Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('menu'); ?>" method="post">
                        <div class="modal-body">

                            <div class="form-group">

                                <label for="formGroupExampleInput">Add New Menu</label>
                                <input type="text" class="form-control" name="menu" id="formGroupExampleInput" placeholder="..." value="<?= set_value('menu'); ?>">
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