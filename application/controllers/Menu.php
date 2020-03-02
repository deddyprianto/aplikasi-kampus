<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    // SEBAGAI SESSION KETIKA LOGIN
    public function __construct()
    {
        parent::__construct();

        menu_apa();
    }

    public function index()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();
        // QUERY KE DATABASE TERLEBIH DAHULU 
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'trim|required',  [
            'required' => 'Field Wajib Diisi !!!'
        ]);


        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Kelola Menu';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {

            $data = [

                'menu' => $this->input->post('menu')

            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu  berhasil di tambah</div>');
            redirect('menu');
        }
    }
    public function Submenu()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();
        // QUERY KE DATABASE TERLEBIH DAHULU 
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('model_menu', 'menu');

        $data['submenu'] = $this->menu->getmenu();

        $data['judul'] = 'Kelola Submenu';

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'trim|required', [
            'required' => 'Field Title Wajib di isi'
        ]);
        $this->form_validation->set_rules('url', 'Url', 'trim|required', [
            'required' => 'Field URL wajib di isi'
        ]);
        $this->form_validation->set_rules('icons', 'Icons', 'trim|required', [
            'required' => 'Field Icons Wajib di isi'
        ]);


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('submenu/index', $data);
            $this->load->view('template/footer');
        } else {


            $data =  [

                'menu_id' => $this->input->post('menu'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icons' => $this->input->post('icons'),
                'is_activate' => $this->input->post('is_activate')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"> SubMenu Berhasil ditambah </div>');
            redirect('Menu/Submenu');
        }
    }
}
