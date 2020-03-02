<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    // SEBAGAI SESSION KETIKA LOGIN

    public function __construct()
    {
        parent::__construct();

        menu_apa();
    }


    public function index()
    {
        // QUERY KE DATABASE TERLEBIH DAHULU 
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['anggotanh'] = $this->db->get('anggota')->result_array();
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim');
        $this->form_validation->set_rules('almt', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('tanggalt', 'tanggal tardidi', 'required|trim');
        $this->form_validation->set_rules('tanggalm', 'tanggal malua', 'required|trim');
        $this->form_validation->set_rules('ayat', 'ayat', 'required|trim');
        $this->form_validation->set_rules('weyk', 'weyk', 'required|trim');
        $this->form_validation->set_rules('tanggaln', 'tanggal masuk nh', 'required|trim');
        $this->form_validation->set_rules('motivasi', 'motivasi', 'required|trim|min_length[100]', [
            'min_length' => 'Motivasi Harus sesuai di hati dan minimal motivasi kamu 100 kata'
        ]);
        $this->form_validation->set_rules('harapan', 'harapan', 'required|trim|min_length[100]', [
            'min_length' => 'Harapan Harus sesuai di hati dan minimal Harapan kamu 100 kata'
        ]);
        $this->form_validation->set_rules('suara', 'suara', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Data Anggota';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->load->model('model_anggota', 'anggota');

            $data['anggota'] = $this->anggota->getAnggota();

            $this->session->set_flashdata('message', 'Data Sudah MASUK KE DATABASE SERVER');
            redirect('user');
        }
    }

    public function datalengkap($id)
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['nhanggota'] = $this->db->get_where('anggota', ['id' => $id])->row_array();

        $data['judul'] = 'Data Anggota';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/data-lengkap', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        // QUERY KE DATABASE TERLEBIH DAHULU 
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('name', 'Name', 'required|trim', [

            'required' => 'Field Nama Wajib Diisi!'

        ]);

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Edit User Profile';


            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('name');

            $email = $this->input->post('email');

            $gambar = $_FILES['image']['name'];

            if ($gambar) {

                $config['upload_path'] = './asset/img';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '1024';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    // UNLINK BIAR DI FOLDER IMAGE GAMBAR TIDAK PENUH
                    $imgDatabase =  $data['nama']['img'];

                    if ($imgDatabase != 'default.png') {
                        unlink(FCPATH . '/asset/img/' . $imgDatabase);
                    }

                    // UPDATE NAMA KE DATABASE
                    $namaGambar = $this->upload->data('file_name');

                    $this->db->set('img', $namaGambar);
                    
                } else {

                    $this->upload->display_errors('<p class="text-danger"> Harus Gambar', '</p>');
                }
            }

            $this->db->set('name', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', ' Di Perbaharui');
            redirect('user');
        }
    }



    public function ubahpassword()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();
        // QUERY KE DATABASE TERLEBIH DAHULU 
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]');

        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Ubah Password';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('template/footer');
        } else {

            $password = $this->input->post('password');
            $passwordBaru = $this->input->post('password1');

            if (!password_verify($password, $data['nama']['pass'])) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Harap Masukan Password Lama yang benar </div>');
                redirect('user/ubahpassword');
            } else {

                if ($passwordBaru == $password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Password baru tidak boleh sama dengan password lama</div>');
                    redirect('user/ubahpassword');
                } else {

                    $hash_password = password_hash($passwordBaru, PASSWORD_DEFAULT);

                    $this->db->set('pass', $hash_password);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('pesan', 'Diubah');
                    redirect('user/ubahpassword');
                }
            }
        }
    }

    public function tampilteman()
    {

        echo json_encode($this->db->get_where('anggota', ['id' => $_POST['id']])->row_array());
    }

    public function proses()
    {

        $result = $this->db->get_where('absen', ['nama' => $this->session->userdata('name')]);

        if ($result->num_rows() < 1) {
            $this->session->set_flashdata('message', 'Kamu Berbohong');
            redirect('user');
        } else {
            $this->session->set_flashdata('message', 'Diabsen');
            redirect('user');
        }
    }
}
