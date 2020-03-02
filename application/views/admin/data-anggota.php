<div class="container-fluid">

    <div class="flash-data" data-flash="<?= $this->session->flashdata('message'); ?>"></div>

    <!-- Page Heading -->
    <h6 class="mb-3 font-weight-bold text-success">Table Anggota N-HKBP HATOPAN TAHUN <?= date('Y', $nama['date']); ?></h6>

    <div class="table">

        <table class="table-responsive" width="50%" cellspacing="0">

            <?php foreach ($saya as $s) : ?>
                <thead>

                    <tr class="bg-success">

                        <th class="text-white">Nama Lengkap</th>
                        <th class="text-white">Umur/Tglhr</th>
                        <th class="text-white">Alamat Rumah</th>
                        <th class="text-white">Status Pendidikan</th>
                        <th class="text-white">Tanggal Tardidi</th>
                        <th class="text-white">Tanggal Malua</th>
                        <th class="text-white">Ayat Malua</th>
                        <th class="text-white">Weyk </th>
                        <th class="text-white">Tahun Masuk NH</th>
                        <th class="text-white">Motivasi Masuk NH</th>
                        <th class="text-white">Harapan Saya Buat Nh</th>
                        <th class="text-white">Suara Padus</th>
                        <th class="text-white">Tombol Aksi</th>
                    </tr>
                </thead>
                <tbody>



                    <tr>
                        <td><?= $s['nama']; ?></td>
                        <td><?= $s['umur']; ?></td>
                        <td><?= $s['almt']; ?></td>
                        <td><?= $s['status']; ?></td>
                        <td><?= $s['tanggalt']; ?></td>
                        <td><?= $s['tanggalm']; ?></td>
                        <td><?= $s['ayat']; ?></td>
                        <td><?= $s['weyk']; ?></td>
                        <td><?= $s['tanggaln']; ?></td>
                        <td><?= $s['motivasi']; ?></td>
                        <td><?= $s['harapan']; ?></td>
                        <td><?= $s['suara']; ?></td>

                        <td>
                            <a href="<?= base_url('Data/delete/') . $s['id']; ?>" class="badge badge-danger delet">Hapus</a>

                            <a href="" data-toggle="modal" data-target="#modalData" data-id="<?= $s['id']; ?>" class="badge badge-success friend">Edit data</a>
                        </td>
                    </tr>


                </tbody>
            <?php endforeach; ?>

        </table>
    </div>

</div>

<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="modalDataLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="modalDataLabel">List Edit Data </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('Data/edit'); ?>" method="post">

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

                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>

            </form>
        </div>
    </div>
</div>