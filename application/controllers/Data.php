<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function index()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();
        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['saya'] = $this->db->get('anggota')->result_array();

        $data['judul'] = 'Data Anggota N-HKBP';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/data-anggota', $data);
        $this->load->view('template/footer');
    }
    public function suara()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = "SELECT id , nama , suara  FROM anggota";
        $data['suaraa'] = $this->db->query($query)->result_array();

        $data['judul'] = 'Data SATB/list Absen';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/data-suara', $data);
        $this->load->view('template/footer');
    }
    public function absen()
    {
        $query = "SELECT COUNT(pengirim) FROM chat";

        $data['jumlah'] = $this->db->query($query)->result_array();

        $data['nama'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['absen'] = $this->db->get('absen')->result_array();

        $data['judul'] = 'Daftar Hadir';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/data-absen', $data);
        $this->load->view('template/footer');
    }
    public function hapus($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('absen');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('Data/absen');
    }

    public function delete($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('anggota');
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('Data');
    }
    public function tampilkan()
    {
        echo json_encode($this->db->get_where('anggota', ['id' => $_POST['id']])->row_array());
    }

    public function edit()
    {

        $data = [

            'nama' => $this->input->post('nama'),
            'umur' => $this->input->post('umur'),
            'almt' => $this->input->post('almt'),
            'status' => $this->input->post('status'),
            'tanggalt' => $this->input->post('tanggalt'),
            'tanggalm' => $this->input->post('tanggalm'),
            'ayat' => $this->input->post('ayat'),
            'weyk' => $this->input->post('weyk'),
            'tanggaln' => $this->input->post('tanggaln'),
            'motivasi' => $this->input->post('motivasi'),
            'harapan' => $this->input->post('harapan'),
            'suara' => $this->input->post('suara')
        ];
        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('anggota');

        $this->session->set_flashdata('message', 'Diedit');
        redirect('Data');
    }
}
