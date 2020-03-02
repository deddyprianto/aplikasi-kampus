<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">

    <h6 class="m-0 font-weight-bold text-primary">DASHBOARD APLIKASI N-HKBP HATOPAN <img class="rounded-circle" src="<?= base_url('asset/img/logo_hkbp.jpg'); ?>" width="50"> </h6>

    <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm tombol-unduh"><i class="fas fa-download fa-sm text-white-50"></i>Unduh Data Anggota S.A.T.B</a>
  </div>

  <!-- Content Row -->
  <div class="row">


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Keseluruhan Anggota (SATB)</div>
              <?php foreach ($queryanggota as $qa) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-user"></i> <?= $qa['COUNT(nama)']; ?> Anggota </div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SUARA SOPRAN</div>

              <?php foreach ($querys as $query) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-user"></i> <?= $query['COUNT(suara)']; ?> Anggota</div>
              <?php endforeach; ?>

            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">SUARA ALTO</div>
              <?php foreach ($querya as $queryy) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-user"></i> <?= $queryy['COUNT(suara)']; ?> Anggota</div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">

              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">SUARA TENOR</div>
              <div class="row no-gutters align-items-center">

                <div class="col-auto">
                  <?php foreach ($queryt as $queryyy) : ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-user"></i> <?= $queryyy['COUNT(suara)']; ?> Anggota</div>
                  <?php endforeach; ?>


                </div>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>


      </div>

    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">SUARA BASS</div>
              <?php foreach ($queryb as $queryyyy) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="fas fa-user"></i> <?= $queryyyy['COUNT(suara)']; ?> Anggota</div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

    <div class="col-md-6">

      <!-- Area Chart -->
      <div class="card shadow mb-4">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Program Kerja BPH NAPOSO BULUNG HKBP HATOPAN PERIODE 2019-2020</h6>
        </div>

        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
          <hr>
          <i class="text-info">Program kerja BPH(Badan Pengurus Harian)</i>
        </div>

      </div>
    </div>


    <div class="col-md-6">

      <div class="card shadow mb-4">

        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Diagram Absen Tiap Suara Anggota N-HKBP Hatopan Dari bulan April Sampai bulan September</h6>
        </div>

        <!-- Card Body -->
        <div class="card-body">

          <div class="chart-bar">
            <canvas id="myBarChart" width="400" height="400"></canvas>
          </div>

          <hr>
          <i class="text-primary text-bayangan">Diagram Paling Tinggi Merupakan , Anggota SATB yang Hadir Paling banyak</i>

        </div>

      </div>

    </div>

  </div>


  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Anggota Baru Tahun 2018 Sampai Tahun <?= date('Y', $nama['date']); ?> </h6>
        </div>

        <div class="card-body">

          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
          <hr>
          <i class="text-info">Anggota BARU</i>
        </div>

      </div>


      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Seksi Seksi Pengurus N-HKBP HATOPAN</h6>
        </div>
        <div class="card-body">

          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
          <hr>
          <i class="text-info">Seksi Seksi Pengurus NAPOSO BULUNG HKBP HATOPAN</i>
        </div>

      </div>

    </div>



    <div class="col-lg-6 mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">llustrations Koor N-HKBP HATOPAN</h6>
        </div>
        <div class="card-body">
          <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('asset/img/paduan-suara.gif'); ?>">
          </div>
          <p>Bernyanyilah Untuk Tuhan , Bukan Untuk Manusia . Hidup Ini Adalah Kesempatan Jangan Sia sia kan Kehidupan mu sekarang Layanilah dia dengan Tubuh mu , sebelum dia datang yang kedua Kali nya </p>

        </div>
      </div>


      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">VISI & MISI Badan Pengurus Harian(BPH) N-HKBP HATOPAN PERIODE 2019 - 2020 <img src=" <?= base_url('asset/img/') . $nama['img']; ?>" width="40" class="rounded-circle"> </h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
          <hr>
          <i class="text-info">Seksi Seksi Pengurus NAPOSO BULUNG HKBP HATOPAN</i>
        </div>
      </div>

    </div>



  </div>

</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->