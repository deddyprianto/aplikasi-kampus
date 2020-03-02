<div class="container-fluid">

    <div class="hapus" data-hapus="<?= $this->session->flashdata('message'); ?>"></div>

    <!-- Page Heading -->
    <h6 class="mb-3 font-weight-bold text-success">Absensi Anggota N-HKBP HATOPAN </h6>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Absensi Latihan Jumat & Sabtu</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="50%" cellspacing="0">

                <thead>
                    <tr>

                        <th scope="col">Nama</th>
                        <th scope="col">Hadir Latihan</th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($absen as $abs) : ?>
                        <tr>
                            <td><?= $abs['nama']; ?></td>
                            <td><?= $abs['hadir']; ?></td>
                            <td>
                                <a href=" <?= base_url('Data/hapus/') . $abs['id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>