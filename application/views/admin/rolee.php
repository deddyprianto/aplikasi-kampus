    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <div class="row">
            <div class="col-lg-10">

                <?= $this->session->flashdata('message', '<div class="alert alert-success">', '</div>'); ?>

                <h5 class="text-uppercase">role <?= $role['role']; ?></h5>

                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr class="bg-primary">
                                <th class="text-white">No</th>
                                <th class="text-white">Menu</th>
                                <th class="text-white">Menu Access</th>

                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <th><?= $m['menu']; ?></th>
                                <th>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?= menu_akses($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-m="<?= $m['id']; ?>">
                                    </div>
                                </th>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>


        </div>