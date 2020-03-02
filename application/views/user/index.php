    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="flash-data" data-flash="<?= $this->session->flashdata('message'); ?>"></div>

      <small class="text-danger"><?php echo validation_errors(); ?></small>

      <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-5">


          <h5 class="text-primary text-center mb-3 text-bayangan"> <small class="font-weight-bold">Selamat Datang <?= $nama['name']; ?> Diharapkan Mengisi data Sebelum Menekan Tombol Absen</small> </h5>

          <img class="img-profile gambar-bapak img-thumbnail mb-3" src="<?= base_url('asset/img/') . $nama['img'] ?>">

          <a href="" class="btn btn-primary tambahData btn-block" data-toggle="modal" data-target="#modalData"><i class="fas fa-user">Lengkapi Data Saya</i></a>

          <a href="<?= base_url('user/proses'); ?>" class="btn btn-info btn-block" id="absenlu"><i class="fas fa-calendar-check">ABSEN SEKARANG</i></a>

        </div>
      </div>

      <div class="row">
        <div class="col-md-6">

          <div class="table-responsive mt-4">

            <small class="text-muted font-weight-bold text-center"> <i>Data Saya & Teman Lain nya yang Sudah menaati Peraturan dengan Mengisi List Data.
                Cek Apakah Nama Kamu Sudah ada apa Belom?
              </i> </small>

            <table class="table mt-3" id="dataTable" width="100%" cellspacing="0">

              <thead>

                <tr class="table-success">

                  <td scope="col">NO</td>
                  <td scope="col">Data Saya & Anggota</td>
                  <td scope="col">Menu Action</td>
                </tr>


              </thead>


              <tbody>

                <?php $i = 1  ?>
                <?php foreach ($anggotanh as $a) : ?>
                  <tr>

                    <td><?= $i; ?></td>
                    <td><?= $a['nama']; ?></td>

                    <td>
                      <a href="" data-toggle="modal" data-target="#modalDataTeman" data-id="<?= $a['id']; ?>" class="badge badge-success saya">Lihat data</a>
                    </td>

                  </tr>
                  <?php $i++ ?>
                <?php endforeach; ?>



              </tbody>


            </table>

          </div>

        </div>
      </div>


      <!-- Modal Untuk Tambah DATA -->
      <div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="modalDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="modalDataLabel">List Pengisian Data Keanggotaan</h5>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form action="<?= base_url('user'); ?>" method="post">

              <input type="hidden" id="id" name="id">

              <div class="modal-body">

                <div class="form-group">

                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" id="nama">

                </div>

                <div class="form-group">

                  <label for="umur">Umur/Tglhr</label>
                  <input type="text" class="form-control" name="umur" id="umur">
                </div>
                <div class="form-group">

                  <label for="almt">Alamat Rumah</label>
                  <input type="text" class="form-control" name="almt" id="almt">
                </div>

                <div class="form-group">

                  <label for="suara">Status Pendidikan</label>
                  <select class="custom-select" name="status" id="status">
                    <option>Masih SMP</option>
                    <option>Masih SMA/SMK</option>
                    <option>Tamat SMA/SMK</option>
                    <option>Sedang Kuliah/Universitas</option>
                    <option>Diploma/D3</option>
                    <option>Sarjana/S1</option>
                    <option>Sarjana/S2</option>
                  </select>

                </div>

                <div class="form-group">

                  <label for="tanggalt">Tangal Tardidi</label>
                  <input type="date" class="form-control" name="tanggalt" id="tanggalt">
                </div>

                <div class="form-group">

                  <label for="tanggalm">Tangal Malua</label>
                  <input type="date" class="form-control" name="tanggalm" id="tanggalm">
                </div>

                <div class="form-group">

                  <label for="ayat">Ayat Alkitab Malua</label>
                  <input type="text" class="form-control" name="ayat" id="ayat">

                </div>
                <div class="form-group">

                  <label for="weyk">Weyk Saat ini</label>
                  <select class="custom-select" name="weyk" id="weyk">
                    <option>Tesalonika</option>
                    <option>Kolose</option>
                    <option>Epesus</option>
                    <option>Jerusalem</option>
                    <option>Roma</option>
                    <option>Galatia</option>
                    <option>Heber</option>
                    <option>Pilipi</option>
                    <option>Tiberias</option>
                    <option>Betlehem</option>
                    <option>Galilea</option>
                    <option>Korintus</option>
                  </select>
                </div>

                <div class="form-group">

                  <label for="tanggaln">Tahun Masuk Naposo</label>
                  <input type="text" class="form-control" name="tanggaln" id="tanggaln">
                </div>

                <div class="form-group">

                  <label for="motivasi">Motivasi Masuk Nh</label>
                  <input type="text" class="form-control" name="motivasi" id="motivasi">

                </div>

                <div class="form-group">

                  <label for="harapan">Harapan Untuk memajukan Nh</label>
                  <input type="text" class="form-control" name="harapan" id="harapan">

                </div>


                <div class="form-group">

                  <label for="suara">Suara Dalam PADUS</label>
                  <select class="custom-select" name="suara" id="suara">
                    <option>SOPRAN</option>
                    <option>ALTO</option>
                    <option>TENOR</option>
                    <option>BASS</option>
                  </select>
                </div>



              </div>

              <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary">Lengkapi Data</button>
              </div>

            </form>
          </div>
        </div>
      </div>

      <!-- akhir Modal Untuk Tambah data -->



      <!-- Modal Untuk DATA TEMAN-->

      <div class="modal fade" id="modalDataTeman" tabindex="-1" role="dialog" aria-labelledby="modalDataTemanLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <div class="table-responsive">
                <small class="modal-title text-bayangan  font-weight-bold " id="modalDataTemanLabel">Data N-HKBP Hatopan <?= date('Y', $nama['date']); ?></small>

                <table class="table" id="dataTable" width="100%" cellspacing="0" cellpadding="0">
                  <thead>

                    <tr>

                      <th scope="col">Nama Lengkap</th>
                      <th scope="col">Umur/Tglhr</th>
                      <th scope="col">Alamat Rumah</th>
                      <th scope="col">Status Pendidikan</th>
                      <th scope="col">Tanggal Tardidi</th>
                      <th scope="col">Tanggal Malua</th>
                      <th scope="col">Ayat Alkitab Malua</th>
                      <th scope="col">Weyk Saat ini</th>
                      <th scope="col">Tahun Masuk Naposobulung</th>
                      <th scope="col">Motivasi Masuk Naposobulung</th>
                      <th scope="col">Harapan Untuk Organisasi</th>
                      <th scope="col">Suara Padus</th>



                    </tr>


                  </thead>


                  <tbody>


                    <tr>
                      <td id="saya"></td>
                      <td id="sayaa"></td>
                      <td id="sayaaa"></td>
                      <td id="sayaaaa"></td>
                      <td id="sayaaaaa"></td>
                      <td id="sayaaaaaa"></td>
                      <td id="sayaaaaaaa"></td>
                      <td id="sayaaaaaaaa"></td>
                      <td id="sayaaaaaaaaa"></td>
                      <td id="sayaaaaaaaaaa"></td>
                      <td id="sayaaaaaaaaaaa"></td>
                      <td id="sayaaaaaaaaaaaa"></td>
                    </tr>

                  </tbody>


                </table>

              </div>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


          </div>
        </div>
      </div>

      <!-- akhir Modal Untuk Tambah data -->