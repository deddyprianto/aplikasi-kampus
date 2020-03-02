<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-11 col-lg-12 col-md">

            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto ">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->

                    <div class="row">

                        <div class="col-lg">

                            <div class="p-5">


                                <div class="text-center">
                                    <i>

                                    </i>
                                    <h1 class="h4 text-primary text-bayangan">Ubah Kata Sandi untuk email</h1>
                                    <h5 class="mb-4"> <?= $this->session->userdata('reset_email'); ?> </h5>

                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth/ubahpass'); ?>">

                                    <div class="form-group">

                                        <input type="password" class="form-control form-control-user" id="pass1" aria-describedby="emailHelp" placeholder="Masukkan Kata sandi Baru"  name="pass1">

                                        <?= form_error('pass1', '<small class="text-danger">', '</small>'); ?>

                                    </div>

                                    <div class="form-group mt-3">

                                        <input type="password" class="form-control form-control-user" id="pass2" aria-describedby="emailHelp" placeholder="Ulang Kata sandi"  name="pass2">

                                        <?= form_error('pass2', '<small class="text-danger">', '</small>'); ?>

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                            Ubah Kata Sandi
                                    </button>
                                    <hr>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>