<!-- Begin Page Content -->
<div class="container-fluid">

    <h5 class="mb-5"><?= $judul; ?></h5>


    <div class="kilat-data" data-flashh="<?= $this->session->flashdata('pesan'); ?>"></div>

    <div class="row">


        <div class="col-lg-6">


            <form action="<?= base_url('user/ubahpassword'); ?>" method="post">


                <div class="form-group">
                    <label for="password">Password Lama</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password1">Password Baru</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="password2">Ulangi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                </div>


                <div class="form-group">

                    <button type="submit" class="mt-4 btn btn-primary">Ubah Password</button>

                </div>




            </form>

        </div>


    </div>



</div>
<!-- /.container-fluid -->