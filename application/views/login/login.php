<canvas class="background"></canvas>
<div class="container">
  <div class="flas-data" data-flash="<?= $this->session->flashdata('message'); ?>"></div>



  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-11 col-lg-12 col-md">

      <div class="card o-hidden border-0 shadow-lg my-5 col-lg-8 mx-auto bg-transparent">

        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->

          <div class="row">

            <!-- <div class="col-lg-6session_flasdatad-none d-lg-block bg-login-image"></div> -->

            <div class="col-lg">

              <div class="p-5">
                <div class="text-center">
                  <i>

                    <h1 class="text-center font-weight-bold text-light garis animasi-ketikan mb-3 ">APLIKASI NHKBP HATOPAN</h1>

                  </i>
                  <h1 class="h4 text-light  mb-4 text-uppercase font-weight-bold">Halaman Login Aplikasi</h1>

                </div>



                <form class="user" method="post" action="<?= base_url('auth'); ?>">

                  <div class="form-group">

                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">

                    <?= form_error('email', '<small class="text-light">', '</small>'); ?>

                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    <?= form_error('password', '<small class="text-light">', '</small>'); ?>
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                  <hr>


                </form>

                <div class="text-center">
                  <a class="small text-light" href=" <?= base_url('auth/forgotpass'); ?>">Lupa Kata Sandi?</a>
                </div>

                <div class="text-center">
                  <a class="small text-light" href="<?= base_url(); ?>auth/regis">Buat akun baru!</a>

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