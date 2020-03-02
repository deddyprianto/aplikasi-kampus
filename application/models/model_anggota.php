<?php

defined('BASEPATH') or exit('No direct script access allowed');


class model_anggota extends CI_Model
{

    public function getAnggota()
    {

        $data  = [

            'nama'    => $this->input->post('nama'),
            'umur'     => $this->input->post('umur'),
            'almt'     => $this->input->post('almt'),
            'status'   => $this->input->post('status'),
            'tanggalt' => $this->input->post('tanggalt'),
            'tanggalm' => $this->input->post('tanggalm'),
            'ayat'     => $this->input->post('ayat'),
            'weyk'     => $this->input->post('weyk'),
            'tanggaln' => $this->input->post('tanggaln'),
            'motivasi' => $this->input->post('motivasi'),
            'harapan'  => $this->input->post('harapan'),
            'suara'    => $this->input->post('suara')

        ];
        $this->db->insert('anggota', $data);
    }
}
