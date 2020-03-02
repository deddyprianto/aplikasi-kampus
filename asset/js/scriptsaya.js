function cari() {
	$('.jumbotron .tulis-putih').on('keyup', function () {

		let data = $('.tulis-putih').val();
		// untuk mengubah data string jadi array
		// let datasaya = data.split();

		$.ajax({

			url: "http://localhost/aplikasi_kampus/Pencarian",
			data: {
				data: data
			},
			method: "post",

			success: function (response) {


				if (response.length == "0") {

					$('.container .tempat-saya').append(`
					<div class="card">
							<div class="card-body">
					Data Tidak Ditemukan !
					</div>
					</div>

					`);
				} else {
					$.each(response, function (i, data) {
						$('.container .tempat-saya').append(`
						<div class="card">
								<div class="card-body">
								<a href="" class="text-uppercase jelas" data-id="` + data.id + `" data-toggle="modal" data-target="#exampleModal">` + data.nama + `</a>
						</div>
						</div>

						`);
					});
				}
			}
		});

	});
}

$('.jumbotron .tulis-putih').on('keyup', function () {


	let input = $(this).val();

	if (input) {
		cari();
	} else {
		if (input == "") {
			$('.tempat-saya').hide();
			$('.tulisan-kecil').append('Harap Refresh Halaman Ketika Pencarian Gagal Dilakukan <br>');
		}
	}

});

$('.tempat-saya').on('click', '.jelas', function () {

	let id = $(this).data('id');

	$.ajax({
		url: 'http://localhost/aplikasi_kampus/Pencarian/data',
		method: 'post',
		dataType: 'json',
		data: {
			id: id
		},
		success: function (data) {

			$('.modal-body').html(`

				<div class="container-fluid">
			    <div class="row">

				<div class="col-lg-4">
						<img src="http://localhost/aplikasi_kampus/asset/img/` + data.img + `" class="img-fluid">
					</div>

					<div class="col-lg-8">
						<div class="table-responsive">
						<table class="table table-striped" id="dataTable" width="100%" cellspacing="0" cellpadding="0">
							<thead>
							<tr>
								<td>Nama</td>
								<td>Umur</td>
								<td>Tempat Tinggal</td>
							</tr>
							</thead>
							<tbody>
							<tr>
							<td>` + data.nama + `</td>
							<td>` + data.umur + `</td>
							<td>` + data.almt + `</td>
							</tr>
							</tbody>
						</table>
						</div>
					</div>

			    </div>
			  </div>



				`);

		}

	});

});
