    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="flash-data" data-flash="<?= $this->session->flashdata('message'); ?>"></div>

        <div class="row">
            <div class="col md-6 sm-12">
                <h6 class="mt-4 font-weight-bold text-primary"><u>Data Anggota N-HKBP Hatopan Tahun <?= date('Y', $nama['date']); ?></u></h6>

                <div class="table-responsive">
                    <table class="table mt-3" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="table-warning">

                                <td>Nama Lengkap</td>
                                <td>Umur/Tglhr</td>
                                <td>Alamat Rumah</td>
                                <td>Tanggal Tardidi</td>
                                <td>Tanggal Malua</td>
                                <td>Ayat Alkitab Malua</td>

                            </tr>
                        </thead>


                        <tbody>

                            <tr>

                                <td><?= $nhanggota['nama']; ?></td>
                                <td><?= $nhanggota['umur']; ?></td>
                                <td><?= $nhanggota['almt']; ?></td>
                                <td><?= $nhanggota['tanggalt']; ?></td>
                                <td><?= $nhanggota['tanggalm']; ?></td>
                                <td><?= $nhanggota['ayat']; ?></td>

                            </tr>


                        </tbody>
                    </table>
                </div>



            </div>
        </div>

        <div class="row">

            <div class="col md-6 sm-12">

                <div class="table-responsive">
                    <table class="table mt-2" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="table-warning">
                                <td>Weyk Saat ini</td>
                                <td>Tahun Masuk Naposobulung</td>
                                <td>Motivasi Masuk Naposobulung</td>
                                <td>Harapan untuk Memajukan Organisasi ini</td>
                                <td>Suara Dalam Paduan Suara</td>

                            </tr>
                        </thead>

                        <tbody>

                            <tr>

                                <td><?= $nhanggota['weyk']; ?></td>
                                <td><?= $nhanggota['tanggaln']; ?></td>
                                <td><?= $nhanggota['motivasi']; ?></td>
                                <td><?= $nhanggota['harapan']; ?></td>
                                <td><?= $nhanggota['suara']; ?></td>

                            </tr>

                        </tbody>

                    </table>
                </div>




            </div>

        </div>

        <!-- End of Main Content -->
    </div>