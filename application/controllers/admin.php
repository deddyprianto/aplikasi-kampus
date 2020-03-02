<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
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



        $queryS = "SELECT COUNT(suara) FROM anggota WHERE suara LIKE '%SOPRAN%' ";
        $queryA = "SELECT COUNT(suara) FROM anggota WHERE suara LIKE '%ALTO%' ";
        $queryT = "SELECT COUNT(suara) FROM anggota WHERE suara LIKE '%TENOR%' ";
        $queryB = "SELECT COUNT(suara) FROM anggota WHERE suara LIKE '%BASS%' ";

        $queryanggota = "SELECT COUNT(nama) FROM anggota";

        $data['querys'] = $this->db->query($queryS)->result_array();
        $data['querya'] = $this->db->query($queryA)->result_array();
        $data['queryt'] = $this->db->query($queryT)->result_array();
        $data['queryb'] = $this->db->query($queryB)->result_array();
        $data['queryanggota'] = $this->db->query($queryanggota)->result_array();
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $data['judul'] = 'Dashboard';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
    public function role()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['role'] = $this->db->get('role')->result_array();

        $data['judul'] = 'Admin Role';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer');
    }
    public function rolee($id)
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('role', ['id' => $id])->row_array();

        $this->db->where('id != 1');

        $data['menu'] = $this->db->get('user_menu')->result_array();


        $data['judul'] = 'Admin Access Role';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/rolee', $data);
        $this->load->view('template/footer');
    }

    public function roleaccess()
    {

        $role = $this->input->post('role');
        $m = $this->input->post('m');

        $data = [

            "role_id" => $role,
            "menu_id" => $m

        ];

        $checked = $this->db->get_where('user_access_menu', $data);

        if ($checked->num_rows() < 1) {

            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-info">You have been changed </div>');
    }

    public function isiabsen($nama)
    {
        $namaku = urldecode($nama);

        $data = [
            'nama' => $namaku,
            'hadir' => 'hadir'
        ];

        $this->db->insert('absen', $data);
        $this->session->set_flashdata('message', 'anggota telah diabsen');
        redirect('Data/suara');
    }
}
