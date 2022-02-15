<?php

class C_pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Harus Login</strong>. Silahkan Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/c_auth/login');
        }
    }


    public function data_photographer()
    {
        date_default_timezone_set('Asia/Makassar');
        $data['tanggal_mulai'] = $this->input->get('tanggal_mulai');
        $data['tanggal_akhir'] = $this->input->get('tanggal_akhir');
        $data['query'] = [];

        if (empty($this->input->get('tanggal_mulai')) && empty($this->input->get('tanggal_akhir'))) {
            $data['error'] = "<strong>Silahkan Pilih Tanggal</strong>";
        } elseif (empty($this->input->get('tanggal_mulai')) && strtotime($this->input->get('tanggal_akhir'))) {
            $data['error'] = "Maaf, <strong>Tanggal Mulai</strong> Masih Kosong!";
        } elseif (empty($this->input->get('tanggal_akhir')) && strtotime($this->input->get('tanggal_mulai'))) {
            $data['error'] = "Maaf, <strong>Tanggal Akhir</strong> Masih Kosong!";
        } elseif (!empty($this->input->get('tanggal_akhir')) && strtotime($this->input->get('tanggal_mulai')) > strtotime($this->input->get('tanggal_akhir'))) {
            $data['error'] = "Maaf, Tanggal Anda Salah!";
        } elseif (!empty($this->input->get('tanggal_mulai')) && strtotime($this->input->get('tanggal_mulai')) <= strtotime(date('Y-m-d'))) {
            $data['error'] = "Maaf, Tanggal Anda Sudah Lewat!";
        } else {
            $data['query'] = $this->Model_pelanggan->data_photographer()->result();
        }
        // var_dump($data);
        // die;

        $this->load->view('pelanggan/v_data_photographer', $data);
    }

    public function data_makeup()
    {
        date_default_timezone_set('Asia/Makassar');
        $data['tanggal_mulai'] = $this->input->get('tanggal_mulai');
        $data['tanggal_akhir'] = $this->input->get('tanggal_akhir');
        $data['query'] = [];

        if (empty($this->input->get('tanggal_mulai')) && empty($this->input->get('tanggal_akhir'))) {
            $data['error'] = "<strong>Silahkan Pilih Tanggal</strong>";
        } elseif (empty($this->input->get('tanggal_mulai')) && strtotime($this->input->get('tanggal_akhir'))) {
            $data['error'] = "Maaf, <strong>Tanggal Mulai</strong> Masih Kosong!";
        } elseif (empty($this->input->get('tanggal_akhir')) && strtotime($this->input->get('tanggal_mulai'))) {
            $data['error'] = "Maaf, <strong>Tanggal Akhir</strong> Masih Kosong!";
        } elseif (!empty($this->input->get('tanggal_akhir')) && strtotime($this->input->get('tanggal_mulai')) > strtotime($this->input->get('tanggal_akhir'))) {
            $data['error'] = "Maaf, Tanggal Anda Salah!";
        } elseif (!empty($this->input->get('tanggal_mulai')) && strtotime($this->input->get('tanggal_mulai')) <= strtotime(date('Y-m-d'))) {
            $data['error'] = "Maaf, Tanggal Anda Sudah Lewat!";
        } else {
            $data['query'] = $this->Model_pelanggan->data_makeup()->result();
        }
        $this->load->view('pelanggan/v_data_makeup', $data);
    }

    public function data_endorse()
    {
        date_default_timezone_set('Asia/Makassar');
        $data['tanggal_mulai'] = $this->input->get('tanggal_mulai');
        $data['tanggal_akhir'] = $this->input->get('tanggal_akhir');
        $data['query'] = [];

        if (empty($this->input->get('tanggal_mulai')) && empty($this->input->get('tanggal_akhir'))) {
            $data['error'] = "<strong>Silahkan Pilih Tanggal</strong>";
        } elseif (empty($this->input->get('tanggal_mulai')) && strtotime($this->input->get('tanggal_akhir'))) {
            $data['error'] = "Maaf, <strong>Tanggal Mulai</strong> Masih Kosong!";
        } elseif (empty($this->input->get('tanggal_akhir')) && strtotime($this->input->get('tanggal_mulai'))) {
            $data['error'] = "Maaf, <strong>Tanggal Akhir</strong> Masih Kosong!";
        } elseif (!empty($this->input->get('tanggal_akhir')) && strtotime($this->input->get('tanggal_mulai')) > strtotime($this->input->get('tanggal_akhir'))) {
            $data['error'] = "Maaf, Tanggal Anda Salah!";
        } elseif (!empty($this->input->get('tanggal_mulai')) && strtotime($this->input->get('tanggal_mulai')) <= strtotime(date('Y-m-d'))) {
            $data['error'] = "Maaf, Tanggal Anda Sudah Lewat!";
        } else {
            $data['query'] = $this->Model_pelanggan->data_endorse()->result();
        }
        $this->load->view('pelanggan/v_data_endorse', $data);
    }

    public function tambah_ke_keranjang($id)
    {
        $tanggal_mulai = $this->input->get('tanggal_mulai');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        $photographer = $this->Model_pelanggan->tambah_ke_keranjang($id);

        $data = array(
            'id'            => $photographer->kode_tenant,
            'qty'           => 1,
            'price'         => $photographer->harga_tenant,
            'name'          => $photographer->nama_tenant,
            'kategori'      => $photographer->kategori,
            'tanggal_mulai' => date('d-M-Y', strtotime($tanggal_mulai)),
            'tanggal_akhir' => date('d-M-Y', strtotime($tanggal_akhir))
        );


        $this->cart->insert($data);
        redirect('pelanggan/c_pelanggan/data_photographer');
    }

    public function detail_keranjang()
    {
        $this->load->view('pelanggan/v_detail_keranjang');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('pelanggan/c_pelanggan/data_photographer');
    }

    public function pemesanan()
    {
        $this->load->view('pelanggan/v_pemesanan');
    }

    public function proses_pesanan()
    {
        $is_processed = $this->Model_pelanggan->proses_pesanan();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('pelanggan/v_proses_pesanan');
        } else {
            echo "Maaf, Pesanan Anda Gagal Di Proses";
        }
    }

    public function detail_photographer($id)
    {
        $data['photo'] = $this->Model_admin->photo($id)->result();
        $data['video'] = $this->Model_admin->video($id)->result();
        $data['photographer'] = $this->Model_admin->detail_photographer($id);

        $this->load->view('pelanggan/v_detail_photographer', $data);
        // Ini DESAIN CODING 2 ==========================================================
    }

    public function detail_makeup($id)
    {
        // Ini DESAIN CODING 1 ==========================================================
        $data['photo'] = $this->Model_admin->photo($id)->result();
        $data['video'] = $this->Model_admin->video($id)->result();
        $data['makeup'] = $this->Model_admin->detail_makeup($id, 'tb_tenants');
        // var_dump($data);
        // die;
        $this->load->view('pelanggan/v_detail_makeup', $data);
        // Ini DESAIN CODING 1 ==========================================================
    }

    public function detail_endorse($id)
    {
        // Ini DESAIN CODING 1 ==========================================================
        $data['photo'] = $this->Model_admin->photo($id)->result();
        $data['video'] = $this->Model_admin->video($id)->result();
        $data['endorse'] = $this->Model_admin->detail_endorse($id, 'tb_tenants');
        // var_dump($data);
        // die;
        $this->load->view('pelanggan/v_detail_endorse', $data);
        // Ini DESAIN CODING 1 ==========================================================
    }
}
