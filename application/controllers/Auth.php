<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Login';
            $this->load->view('login/header', $data);
            $this->load->view('login/login');
            $this->load->view('login/footer');
        } else {
            // KETIKA LULUS PENGECEKAN FORM EMAIL

            $email = $this->input->post('email');
            $pass = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            // CEK EMAIL TERDAFTAR APA TIDAK 
            if ($user) {

                // CEK EMAIL AKTIF ATAU TIDAK

                if ($user['is_active'] == 1) {

                    if (password_verify($pass, $user['pass'])) {

                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id'],
                            'name' => $user['name']
                        ];

                        $this->session->set_userdata($data);

                        if ($user['role_id'] == 1) {

                            redirect('admin');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Kata Sandi Salah! Harap Periksa Kembali');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Akun Belom Active Silahkan Aktivasi Melalui Email Kamu');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', 'Email Belom Teregistrasi! , Harap Registrasi Terlebih Dahulu');
                redirect('auth');
            }
        }
    }


    public function regis()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email hass been created'
        ]);

        $this->form_validation->set_rules('pass1', 'Password', 'required|matches[pass2]|trim|min_length[6]', [

            'matches' => 'This password not same!',
            'min_length' => 'password too short!'

        ]);

        $this->form_validation->set_rules('pass2', 'Password', 'matches[pass1]');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Registration';
            $this->load->view('login/header', $data);
            $this->load->view('login/regis');
            $this->load->view('login/footer');
        } else {

            $email = $this->input->post('email');
            $data = [

                'name' => $this->input->post('name'),
                'email' => $email,
                'pass' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
                'img' => 'default.png',
                'role_id' => '2',
                'is_active' => '0',
                'date' => time()
            ];

            // Siapkan Bilangan Token

            $token = base64_encode(random_bytes(32));

            $user_token = [

                'email' => $email,
                'token' => $token,
                'date_create' => time()
            ];

            $this->db->insert('user_token', $user_token);

            $this->db->insert('user', $data);

            $this->_sendEmail($token, 'verify');


            $this->session->set_flashdata('message', 'Selamat anda berhasil mendaftar Silahkan Cek Email kamu untuk mengaktivkan akun kamu');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {

        $config = [

            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rnhkbphatopan@gmail.com',
            'smtp_pass' => 'berkat1212',
            'smtp_port' => '465',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from('rnhkbphatopan@gmail.com', 'R-NHKBP HATOPAN');

        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Verification Email apl R-nhkbp Hatopan');

            $this->email->message('Click Disini untuk Verifikasi <a href="  ' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . ' " >Activate Account</a> ');
        } else if ($type == 'forgot') {

            $this->email->subject('Ubah kata sandi');

            $this->email->message('Click Disini untuk mengubah kata sandi <a href="  ' . base_url() . 'auth/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token) . ' " >ubah kata sandi</a> ');
        }



        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verifikasi()
    {


        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $user_email = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user_email) {


            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {

                if (time() - $user_token['date_create'] < (60 * 60 * 24)) {

                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message',  $email . ' sudah active , Silahkan Login Sekarang !');
                    redirect('auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', 'Token expired!!!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', 'Wrong Token , token Has Not Valid');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('message', 'Wrong Email , Email Has Not Valid');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', 'Kamu Telah Keluar');
        redirect('auth');
    }

    public function blokir()
    {
        $this->load->view('user/blokir');
    }

    public function forgotpass()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [

            'valid_email' => 'Penulisan email harus benar',
            'required'    => 'inputan harus diisi'

        ]);

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Lupa password';
            $this->load->view('login/header', $data);
            $this->load->view('login/forgot-pass');
            $this->load->view('login/footer');
        } else {

            $email = $this->input->post('email');

            $user =  $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {

                $token = base64_encode(random_bytes(32));

                $data = [

                    'email' => $email,
                    'token' => $token,
                    'date_create' => time()
                ];

                $this->db->insert('user_token', $data);

                $this->_sendEmail($token, 'forgot');


                $this->session->set_flashdata('message', 'Cek Email kamu untuk mengubah kata sandi');

                redirect('auth/forgotpass');
            } else {

                $this->session->set_flashdata('message', 'Email kamu Tidak Terdaftar /Email kamu belom Active');

                redirect('auth/forgotpass');
            }
        }
    }
    public function reset()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $user  =  $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {


            $token =  $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($token) {

                $this->session->set_userdata('reset_email', $email);

                $this->ubahpass();
            } else {
                $this->session->set_flashdata('message', 'Gagal mengubah kata sandi ,Token salah!');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('message', 'Gagal mengubah kata sandi , Email salah!');
            redirect('auth');
        }
    }
    public function ubahpass()
    {

        if (!$this->session->userdata('reset_email')) {

            redirect('auth');
        }

        $this->form_validation->set_rules('pass1', 'Sandi Baru', 'required|trim|min_length[3]|matches[pass2]', [

            'matches' => 'sandi pertama tidak sama dengan sandi kedua',
            'required' => 'inputan tidak boleh kosong'

        ]);
        $this->form_validation->set_rules('pass2', 'Ulang Kata Sandi', 'required|trim|min_length[3]|matches[pass1]', [

            'matches' => 'sandi kedua tidak sama dengan sandi pertama',
            'required' => 'inputan tidak boleh kosong'

        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Ubah password';
            $this->load->view('login/header', $data);
            $this->load->view('login/ubah-pass');
            $this->load->view('login/footer');
        } else {

            $sandi = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);

            $email = $this->session->userdata('reset_email');

            $this->db->set('pass', $sandi);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', 'Kata Sandi Berhasil Diubah ,Silahkan Login');
            redirect('auth');
        }
    }
}
