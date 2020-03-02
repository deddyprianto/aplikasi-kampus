<?php

function menu_apa()
{


    $instandulu = get_instance();

    if (!$instandulu->session->userdata('role_id')) {

        redirect('auth');
    } else {
        // HAL PERTAMA YANG DILAKUKAN CEK ROLE/ATURAN DARI USER

        $aturan_user = $instandulu->session->userdata('role_id');
        // CEK NAMA DARI URL

        $cek_nama = $instandulu->uri->segment(1);
        // QUERY DAN CEK USER ROLLE
        $QueryMenu = $instandulu->db->get_where('user_menu', ['menu' => $cek_nama])->row_array();

        // YANG DI BUTUHKAN ID NYA
        $idMenu = $QueryMenu['id'];

        $accessMenu = $instandulu->db->get_where('user_access_menu', ['role_id' => $aturan_user, 'menu_id' => $idMenu]);
    }
    //funsi num_rows = sangat cocok digunakan jika kita akan melakukan konfirmasi terkait..... ada atau tidak sebuah data di dalam database berdasarkan variable tertentu. ingat kalau ada DATA bernilai 1 sedangkan tidak ada DATA bernilai 0

    // Pengkondisian ini di kerjakan ketika member mencoba mengakses menu admin
    // INGAT PENGKONDISIAN SELALU BETUL
    if ($accessMenu->num_rows() < 1) {
        redirect('auth/blokir');
    }





    function menu_akses($role, $m)
    {

        $code = get_instance();


        $result = $code->db->get_where('user_access_menu', ['role_id' => $role, 'menu_id' => $m]);

        if ($result->num_rows() > 0) {
            return " checked ='checked'";
        }
    }
}
