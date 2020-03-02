<?php

defined('BASEPATH') or exit('No direct script access allowed');

class chat extends CI_Controller
{
    public function index()
    {

        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $data['chatt'] = $this->db->select('*')->order_by('waktu', 'ASC')->get('chat')->result();

        $data['judul'] = 'Live Chat';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('chat/index', $data);
        $this->load->view('template/footer');
    }

    public function kirim()
    {
        date_default_timezone_set('Asia/Jakarta');

        $waktu = date('Y-m-d H:i:s');

        $data = [
            'pengirim' => $this->session->userdata('name'),
            'waktu' => $waktu,
            'teks' => $this->input->post('pesan')

        ];
        $this->db->insert('chat', $data);
        redirect('chat');
    }
}
