<canvas class="background"></canvas>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto bg-transparent">

        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->

                <div class="col-lg">

                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-light font-weight-bold text-bayangan mb-4 text-uppercase">Buat akun baru!</h1>
                        </div>


                        <form class="user" method="post" action="<?= base_url(); ?>auth/regis">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" placeholder="Username Akun Kamu" name="name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-light">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-light">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">

                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass1">
                                    <?= form_error('pass1', '<small class="text-light">', '</small>'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="pass2">
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>

                            <hr>

                        </form>

                        <div class="text-center">
                            <a class="small text-light" href="<?= base_url('auth/forgotpass'); ?>">Lupa kata Sandi?</a>
                        </div>
                        <div class="text-center">
                            <a class="small text-light" href="<?= base_url(); ?>auth">Sudah punya akun? Masuk sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>