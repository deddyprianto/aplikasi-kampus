  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; N-HKBP HATOPAN <?= date('Y', $nama['date']); ?> </span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Siap Meninggalkan Halaman?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">Apakah Kamu Yakin ingin Keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="">Keluar</a>
        </div>
      </div>
    </div>
  </div> -->

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('asset/'); ?>jq/jquery.min.js"></script>
  <script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('asset/'); ?>js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('asset/'); ?>js/myscript.js"></script>



  <!-- Page level plugins -->
  <script src="<?= base_url('asset/'); ?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('asset/'); ?>js/demo/chart-bar-demo.js"></script>





  <!-- Page level custom scripts -->

  <script>
    $('.friend').on('click', function() {

      const frie = $(this).data('id');

      $.ajax({

        url: '<?= base_url('Data/tampilkan'); ?>',
        data: {
          id: frie
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {

          $('#id').val(data.id);
          $('#nama').val(data.nama);
          $('#umur').val(data.umur);
          $('#almt').val(data.almt);
          $('#status').val(data.status);
          $('#tanggalt').val(data.tanggalt);
          $('#tanggalm').val(data.tanggalm);
          $('#ayat').val(data.ayat);
          $('#weyk').val(data.weyk);
          $('#tanggaln').val(data.tanggaln);
          $('#motivasi').val(data.motivasi);
          $('#harapan').val(data.harapan);
          $('#suara').val(data.suara);
        }
      });

    });


    $('.saya').on('click', function() {

      const id = $(this).data('id');

      $.ajax({

        url: '<?= base_url('user/tampilteman'); ?>',
        data: {
          id: id
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {

          $('#saya').html(data.nama);
          $('#sayaa').html(data.umur);
          $('#sayaaa').html(data.almt);
          $('#sayaaaa').html(data.status);
          $('#sayaaaaa').html(data.tanggalt);
          $('#sayaaaaaa').html(data.tanggalm);
          $('#sayaaaaaaa').html(data.ayat);
          $('#sayaaaaaaaa').html(data.weyk);
          $('#sayaaaaaaaaa').html(data.tanggaln);
          $('#sayaaaaaaaaaa').html(data.motivasi);
          $('#sayaaaaaaaaaaa').html(data.harapan);
          $('#sayaaaaaaaaaaaa').html(data.suara);

        }
      });

    });


    $('.custom-file-input').on('change', function() {

      let filename = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(filename);

    });

    $('.form-check-input').on('click', function() {


      const role = $(this).data('role');
      const m = $(this).data('m');

      $.ajax({

        url: "<?= base_url('admin/roleaccess'); ?>",
        type: "post",
        data: {

          role: role,
          m: m

        },
        success: function() {

          document.location.href = " <?= base_url('admin/rolee/') ?>" + role;
        }

      });


    });

    $('.tombol-keluar').on('click', function(e) {

      e.preventDefault();

      const href = $(this).attr('href');


      Swal.fire({
        title: 'Yakin akan keluar?',
        text: "Keluar , Username dan pass kamu!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya Keluar!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })

    });

    $('.tombol-tkeluar').on('click', function(event) {

      event.preventDefault();

      const keluar = $(this).attr('href');


      Swal.fire({
        title: 'Yakin akan keluar?',
        text: "Keluar , Username dan pass kamu!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya Keluar!'
      }).then((result) => {
        if (result.value) {
          document.location.href = keluar;
        }
      })

    });



    $('.delet').on('click', function(e) {

      e.preventDefault();

      const data = $(this).attr('href');

      Swal.fire({
        title: 'Yakin Data Dihapus?',
        text: "Hapus , Data akan Hilang!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya Hapus!'
      }).then((result) => {
        if (result.value) {
          document.location.href = data
        }
      })



    });

    $('#absenlu').on('click', function(event) {

      event.preventDefault();

      const absen = $(this).attr('href');

      Swal.fire({
        title: 'Apakah Kamu Hadir Latihan???',
        text: "Jika Hadir , Pilihlah Tombol Hadir . Jika Tidak , Jangan Bohong",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya Hadir!'
      }).then((result) => {
        if (result.value) {
          document.location.href = absen
        }
      })
    });
  </script>



  </body>

  </html>