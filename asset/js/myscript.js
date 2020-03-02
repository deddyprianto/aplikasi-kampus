const flash = $('.flash-data').data('flash');

if (flash) {

	Swal.fire({

		title: 'Data',
		text: 'Berhasil ' + flash,
		type: 'success'

	});
}

const jangan = $('.flash-data').data('flash');

if (jangan == "Kamu Berbohong") {

	Swal.fire({
		title: 'Maaf Tidak bisa ' + jangan,
		animation: false,
		customClass: {
			popup: 'animated tada'
		}
	})
}

const abs = $('.flash-data').data('flash');

if (abs == "Diabsen") {
	Swal.fire({

		title: 'Selamat',
		text: 'Kamu Telah ' + abs,
		type: 'success'

	});
}

const flas = $('.flas-data').data('flash');

if (flas) {

	Swal.fire({

		title: 'Anda Berhasil',
		text: flas,
		type: 'success'

	});

}

const logdata = $('.flas-data').data('flash');

if (logdata == "Kata Sandi Salah! Harap Periksa Kembali") {

	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: logdata

	});
}

const logakun = $('.flas-data').data('flash');

if (logakun == "Akun Belom Active Silahkan Aktivasi Melalui Email Kamu") {
	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: logakun

	});

}

const logreg = $('.flas-data').data('flash');

if (logreg == "Email Belom Teregistrasi! , Harap Registrasi Terlebih Dahulu") {
	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: logreg

	});

}

const token = $('.flas-data').data('flash');

if (token == "Token expired!!!") {
	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: token

	});

}

const kestoken = $('.flas-data').data('flash');

if (kestoken == "Wrong Token , token Has Not Valid") {
	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: kestoken

	});

}

const gagalsandi = $('.flas-data').data('flash');

if (gagalsandi == "Gagal mengubah kata sandi ,Token salah!") {
	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: gagalsandi

	});

}

const gagalsan = $('.flas-data').data('flash');

if (gagalsan == "Gagal mengubah kata sandi , Email salah!") {
	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: gagalsan

	});

}
const verify = $('.pesan-saya').data('saya');

if (verify) {
	Swal.fire({

		title: 'Anda Berhasil',
		text: verify,
		type: 'success'

	});

}

const everify = $('.pesan-saya').data('saya');

if (everify == "Email kamu Tidak Terdaftar /Email kamu belom Active") {
	Swal.fire({
		type: 'error',
		title: 'Oops... Ada Kesalahan !',
		text: verify

	});
}


const kilatt = $('.kilat-data').data('flashh');

if (kilatt) {

	Swal.fire({

		title: 'Kata Sandi',
		text: 'Berhasil' + kilatt,
		type: 'success'

	});

}

const hapus = $('.hapus').data('hapus');

if (hapus == "Dihapus") {

	Swal.fire({

		title: 'Absensi Anggota',
		text: 'Berhasil ' + hapus,
		type: 'success'

	});
}
