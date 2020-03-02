<div class="container">

 
 <div class="pesan-saya" data-saya="<?= $this->session->flashdata('message'); ?>"></div>

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
                                    <h1 class="h4 text-primary text-bayangan mb-4">Atur Kata Sandi</h1>

                                </div>

                                

                                <form class="user" method="post" action="<?= base_url('auth/forgotpass'); ?>">

                                    <div class="form-group">

                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>" >

                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Atur Ulang Kata Sandi
                                    </button>
                                    <hr>


                                </form>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth'); ?>">Kembali ke Halaman Login</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</div>