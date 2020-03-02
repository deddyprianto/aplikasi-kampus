<div class="container-fluid">

    <div class="flash-data" data-flash="<?= $this->session->flashdata('message'); ?>"></div>

    <!-- Page Heading -->
    <h6 class="mb-3 font-weight-bold text-success">Table Persuara Anggota N-HKBP Hatopan Tahun <?= date('Y', $nama['date']); ?></h6>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Absensi Anggota N-HKBP</h6>
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="50%" cellspacing="0">

                <thead>
                    <tr>

                        <th scope="col">Nama</th>
                        <th scope="col">Suara</th>
                        <th scope="col">Absensi</th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($suaraa as $sr) : ?>
                        <tr>

                            <td><?= $sr['nama']; ?></td>
                            <td><?= $sr['suara']; ?></td>
                            <td>
                                <a href=" <?= base_url('admin/isiabsen/') . $sr['nama']; ?>" class="btn btn-success">Absen</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </div>

</div>