<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pencarian extends CI_Controller
{
    public function index()
    {
        $dataa =  $this->input->post('data');

        $query = "SELECT id,nama,suara FROM anggota WHERE suara LIKE '%$dataa%' ";
        echo json_encode($this->db->query($query)->result_array());
    }




    public function data()
    {
        $id = $this->input->post('id');

        $myquery = "SELECT 
                    `anggota`.`nama` , `umur` ,`almt` , `user`.`img` 
                    FROM `anggota` JOIN `user` ON `anggota`.`id` = `user`.`id`
                    WHERE `user`.`id` = $id";

        echo json_encode($this->db->query($myquery)->row_array());
    }
}
