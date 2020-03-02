    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-lg-10">
                <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Menu</a>

            
                        <?= $this->session->flashdata('message', '<div class="alert alert-success">', '</div>'); ?>
                        <?= form_error('menu', '<div class="text-danger mt-2">', '</div>'); ?>
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
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th><?= $i; ?></th>
                                        <th><?= $m['menu']; ?></th>
                                        <th>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Add New Menu</h5>
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