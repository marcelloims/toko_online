<?php

class C_auth extends CI_Controller
{

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => "Email Tidak Boleh Kosong!"]);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => "Password Tidak Boleh Kosong!"]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/form_login');
        } else {

            $auth = $this->Model_auth->cek_login();

            if ($auth == false) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Gagal</strong>. Email atau Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('auth/c_auth/login');
            } else {
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('role_id', $auth->role_id);
                $this->session->set_userdata('nama_panggilan', $auth->nama_panggilan);
                $this->session->set_userdata('id_user', $auth->id_user);
                $this->session->set_userdata('foto', $auth->foto);
                $this->session->set_userdata('nama_pengguna', $auth->nama_pengguna);
                $this->session->set_userdata('alamat_pengguna', $auth->alamat_pengguna);
                $this->session->set_userdata('telepon_pengguna', $auth->telepon_pengguna);

                // var_dump($auth);
                // die;

                switch ($auth->role_id) {
                    case 1:
                        redirect('admin/c_admin/dashboard');
                        break;
                    case 2:
                        redirect('pelanggan/c_pelanggan/data_photographer');
                        break;
                    case 3:
                        redirect('member/c_member/dashboard');
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/c_auth/login');
    }

    public function form_register()
    {
        $this->load->view('auth/form_register');
    }

    public function register()
    {

        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim', ['required' => "Nama Lengkap Tidak Boleh Kosong"]);
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required|trim', ['required' => "Nama Panggilan Tidak Boleh Kosong"]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_users.email]', [
            'required' => "Email Tidak Boleh Kosong",
            'is_unique' => "Email sudah terdaftar",
            'valid_email' => "Email Salah!"
        ]);
        $this->form_validation->set_rules('telepon_pengguna', 'Telepon', 'required|trim', ['required' => "Telepon Tidak Boleh Kosong"]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'required' => "Password tidak boleh kosong",
            'min_length' => "Password minimal 4 digit",
            'matches' => "Passoword tidak Sama!"
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/form_register');
        } else {
            $data = [
                'nama_pengguna'     => $this->input->post('nama_pengguna'),
                'nama_panggilan'    => $this->input->post('nama_panggilan'),
                'email'             => $this->input->post('email'),
                'password'          => $this->input->post('password1'),
                'telepon_pengguna'  => $this->input->post('telepon_pengguna'),
                'alamat_pengguna'   => "",
                'foto'              => "avatar5.png",
                'role_id '            => 2
            ];

            $this->Model_auth->register($data, 'tb_users');
            redirect('auth/c_auth/login');
        }
    }
}
