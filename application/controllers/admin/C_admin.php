<?php

class C_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {

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

    // ====================================================================================================
    // Controller DASHBOARD
    public function dashboard()
    {
        $data['customer'] = $this->Model_admin->total_customer();
        $data['tenant'] = $this->Model_admin->total_tenant();
        $data['photographer'] = $this->Model_admin->total_photographer();
        $data['makeup'] = $this->Model_admin->total_makeup();
        $data['endorse'] = $this->Model_admin->total_endorse();
        $data['member'] = $this->Model_admin->total_member();
        $data['order'] = $this->Model_admin->total_order();
        $data['payment'] = $this->Model_admin->total_payment();
        $this->load->view('admin/dashboard/v_dashboard', $data);
    }
    // Controller DASHBOARD
    // ====================================================================================================



    // ====================================================================================================
    // Controller DATA MEMBER
    public function data_member()
    {
        $data['member'] = $this->Model_admin->data_member()->result();
        $this->load->view('admin/member/v_data_member', $data);
    }

    public function tambah_member()
    {
        $nama_pengguna      = $this->input->post('nama_pengguna');
        $password           = $this->input->post('password');
        $email              = $this->input->post('email');
        $telepon_pengguna   = $this->input->post('telepon_pengguna');
        $alamat_pengguna    = $this->input->post('alamat_pengguna');
        $foto               = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads_user';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama_pengguna'     => $nama_pengguna,
            'password'          => $password,
            'email'             => $email,
            'telepon_pengguna'  => $telepon_pengguna,
            'alamat_pengguna'   => $alamat_pengguna,
            'role_id'           => 3,
            'foto'              => $foto
        ];

        $this->Model_admin->tambah_member($data, 'tb_users');
        redirect('admin/c_admin/data_member');
    }

    public function edit_member($id)
    {
        $where = ['id_user' => $id];
        $data['member'] = $this->Model_admin->edit_member($where, 'tb_users')->result();
        // var_dump($data);
        // die;
        $this->load->view('admin/member/v_edit_member', $data);
    }

    public function update_member()
    {
        $id_user            = $this->input->post('id_user');
        $nama_pengguna      = $this->input->post('nama_pengguna');
        $password           = $this->input->post('password');
        $email              = $this->input->post('email');
        $telepon_pengguna   = $this->input->post('telepon_pengguna');
        $alamat_pengguna    = $this->input->post('alamat_pengguna');
        $foto               = $_FILES['foto']['name'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads_user';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama_pengguna'     => $nama_pengguna,
            'password'          => $password,
            'email'             => $email,
            'telepon_pengguna'  => $telepon_pengguna,
            'alamat_pengguna'   => $alamat_pengguna,
            'role_id'           => 3,
            'foto'              => $foto
        ];

        $where = ['id_user' => $id_user];

        // var_dump($where, $data);
        // die;
        $this->Model_admin->update_member($where, $data, 'tb_users');
        redirect('admin/c_admin/data_member');
    }

    public function hapus_member($id)
    {
        $where = ['id_user' => $id];
        $this->Model_admin->hapus_member($where, 'tb_users');
        redirect('admin/c_admin/data_member');
    }

    public function detail_member($id)
    {
        // Ini DESAIN CODING 1 ==========================================================
        $data['member'] = $this->Model_admin->detail_member($id)->result();
        $this->load->view('admin/member/v_detail_member', $data);
        // Ini DESAIN CODING 1 ==========================================================
    }


    // Controller DATA MEMBER
    // ====================================================================================================



    // ====================================================================================================
    // Controller DATA TENANT PHOTOGRAPHER
    public function data_photographer()
    {
        $data['photographer'] = $this->Model_admin->data_photographer()->result();
        $this->load->view('admin/tenant/v_data_photographer', $data);
    }

    public function tambah_photographer()
    {
        $nama_tenant    = $this->input->post('nama_tenant');
        $harga_tenant   = $this->input->post('harga_tenant');
        $qty            = $this->input->post('qty');
        $tanggal_masuk  = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $logo           = $this->input->post('logo');
        if ($logo = '') {
        } else {
            $config['upload_path'] = './uploads_tenant';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                echo "Gambar Gagal di Upload";
            } else {
                $logo = $this->upload->data('file_name');
            }
        }
        $alamat_tenant  = $this->input->post('alamat_tenant');
        $kecamatan      = $this->input->post('kecamatan');
        $kabupaten      = $this->input->post('kabupaten');
        $provinsi       = $this->input->post('provinsi');
        $id_user        = $this->input->post('id_user');

        $data = [
            'nama_tenant'       => $nama_tenant,
            'keterangan'        => "Aktif",
            'status'            => "Available",
            'kategori'          => "Photographer",
            'harga_tenant'      => $harga_tenant,
            'qty'               => $qty,
            'tanggal_masuk'     => $tanggal_masuk,
            'tanggal_keluar'    => $tanggal_keluar,
            'logo'              => $logo,
            'alamat_tenant'     => $alamat_tenant,
            'kecamatan'         => $kecamatan,
            'kabupaten'         => $kabupaten,
            'provinsi'          => $provinsi,
            'id_user'           => $id_user
        ];

        $this->Model_admin->tambah_photographer($data, 'tb_tenants');
        redirect('admin/c_admin/data_photographer');
    }

    public function edit_photographer($id)
    {
        $data['photographer'] = $this->Model_admin->edit_photographer($id);
        $data['keterangan'] = ['Aktif', 'Tidak Aktif'];
        $data['status'] = ['Available', 'Busy'];
        $data['kategori'] = ['Photographer', 'Makeup Artist', 'Endorse'];
        $this->load->view('admin/tenant/v_edit_photographer', $data);
    }

    public function update_photographer()
    {
        $kode_tenant    = $this->input->post('kode_tenant');
        $nama_tenant    = $this->input->post('nama_tenant');
        $keterangan     = $this->input->post('keterangan');
        $status         = $this->input->post('status');
        $kategori       = $this->input->post('kategori');
        $harga_tenant   = $this->input->post('harga_tenant');
        $qty            = $this->input->post('qty');
        $tanggal_masuk  = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $logo           = $this->input->post('logo');
        if ($logo = '') {
        } else {
            $config['upload_path'] = './uploads_tenant';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                echo "Gambar Gagal di Upload";
            } else {
                $logo = $this->upload->data('file_name');
            }
        }
        $alamat_tenant  = $this->input->post('alamat_tenant');
        $kecamatan      = $this->input->post('kecamatan');
        $kabupaten      = $this->input->post('kabupaten');
        $provinsi       = $this->input->post('provinsi');
        $id_user        = $this->input->post('id_user');

        $data = [
            'nama_tenant'       => $nama_tenant,
            'keterangan'        => $keterangan,
            'status'            => $status,
            'kategori'          => $kategori,
            'harga_tenant'      => $harga_tenant,
            'qty'               => $qty,
            'tanggal_masuk'     => $tanggal_masuk,
            'tanggal_keluar'    => $tanggal_keluar,
            'logo'              => $logo,
            'alamat_tenant'     => $alamat_tenant,
            'kecamatan'         => $kecamatan,
            'kabupaten'         => $kabupaten,
            'provinsi'          => $provinsi,
            'id_user'           => $id_user
        ];

        $where = ['kode_tenant' => $kode_tenant];

        $this->Model_admin->update_photographer($where, $data, 'tb_tenants');
        redirect('admin/c_admin/data_photographer');
    }

    public function hapus_photographer($id)
    {
        $where = ['kode_tenant' => $id];
        $this->Model_admin->hapus_photographer($where, 'tb_tenants');
        redirect('admin/c_admin/data_photographer');
    }

    public function detail_photographer($id)
    {
        $data['photo'] = $this->Model_admin->photo($id)->result();
        $data['video'] = $this->Model_admin->video($id)->result();
        $data['photographer'] = $this->Model_admin->detail_photographer($id);

        $this->load->view('admin/tenant/v_detail_photographer', $data);
        // Ini DESAIN CODING 2 ==========================================================
    }

    public function tambah_foto_photographer($id)
    {
        // var_dump($id);
        // die;
        $foto           = $this->input->post('foto');
        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads_gallery';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $kode_tenant = $this->input->post('kode_tenant');

        $data = [
            'foto'          => $foto,
            'kode_tenant'   => $kode_tenant
        ];

        $this->Model_admin->tambah_foto_photographer($data, 'tb_photos');
        redirect('admin/c_admin/detail_photographer/' . $id);
    }

    public function hapus_foto_photographer($id)
    {
        $where = ['kode_photo' => $id];
        $kode_tenant = $this->Model_admin->get_kode_foto_photographer($where, 'tb_photos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_admin->hapus_foto_photographer($where, 'tb_photos');
        redirect('admin/c_admin/detail_photographer/' . $kode);
    }

    public function tambah_video_photographer($id)
    {
        // var_dump($id);
        // die;
        $video      = $this->input->post('video');
        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("Y-m-d_");
            $configVideo['upload_path'] = './uploads_gallery';
            $configVideo['max_size'] = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date . $_FILES['video']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
            } else {
                $video = $this->upload->data('file_name');
            }
        } else {
            echo "Please select a file";
        }
        $kode_tenant = $this->input->post('kode_tenant');

        $data = [
            'video'         => $video,
            'kode_tenant'   => $kode_tenant
        ];

        // var_dump($data);
        // die;

        $this->Model_admin->tambah_video_photographer($data, 'tb_videos');
        redirect('admin/c_admin/detail_photographer/' . $id);
    }

    public function hapus_video_photographer($id)
    {
        $where = ['kode_video' => $id];
        $kode_tenant = $this->Model_admin->get_kode_video_photographer($where, 'tb_videos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_admin->hapus_video_photographer($where, 'tb_videos');
        redirect('admin/c_admin/detail_photographer/' . $kode);
    }
    // Controller DATA TENANT PHOTOGRAPHER
    // ====================================================================================================



    // ====================================================================================================
    // Controller DATA TENANT Makeup Artist
    public function data_makeup()
    {
        $data['makeup'] = $this->Model_admin->data_makeup('tb_tenants')->result();
        $this->load->view('admin/tenant/v_data_makeup', $data);
    }

    public function tambah_makeup()
    {
        $nama_tenant    = $this->input->post('nama_tenant');
        $harga_tenant   = $this->input->post('harga_tenant');
        $qty            = $this->input->post('qty');
        $tanggal_masuk  = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $logo           = $this->input->post('logo');
        if ($logo = '') {
        } else {
            $config['upload_path'] = './uploads_tenant';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                echo "Gambar Gagal di Upload";
            } else {
                $logo = $this->upload->data('file_name');
            }
        }
        $alamat_tenant  = $this->input->post('alamat_tenant');
        $kecamatan      = $this->input->post('kecamatan');
        $kabupaten      = $this->input->post('kabupaten');
        $provinsi       = $this->input->post('provinsi');
        $id_user        = $this->input->post('id_user');

        $data = [
            'nama_tenant'       => $nama_tenant,
            'keterangan'        => "Aktif",
            'status'            => "Available",
            'kategori'          => "Makeup Artist",
            'harga_tenant'      => $harga_tenant,
            'qty'               => $qty,
            'tanggal_masuk'     => $tanggal_masuk,
            'tanggal_keluar'    => $tanggal_keluar,
            'logo'              => $logo,
            'alamat_tenant'     => $alamat_tenant,
            'kecamatan'         => $kecamatan,
            'kabupaten'         => $kabupaten,
            'provinsi'          => $provinsi,
            'id_user'           => $id_user
        ];

        $this->Model_admin->tambah_makeup($data, 'tb_tenants');
        redirect('admin/c_admin/data_makeup');
    }

    public function edit_makeup($id)
    {
        $data['keterangan'] = ['Aktif', 'Tidak Aktif'];
        $data['status'] = ['Available', 'Busy'];
        $data['kategori'] = ['Photographer', 'Makeup Artist', 'Endorse'];
        $data['makeup'] = $this->Model_admin->edit_makeup($id, 'tb_tenants');
        $this->load->view('admin/tenant/v_edit_makeup', $data);
    }

    public function update_makeup()
    {
        $kode_tenant    = $this->input->post('kode_tenant');
        $nama_tenant    = $this->input->post('nama_tenant');
        $keterangan     = $this->input->post('keterangan');
        $status         = $this->input->post('status');
        $kategori       = $this->input->post('kategori');
        $harga_tenant   = $this->input->post('harga_tenant');
        $qty            = $this->input->post('qty');
        $tanggal_masuk  = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $logo           = $this->input->post('logo');
        if ($logo = '') {
        } else {
            $config['upload_path'] = './uploads_tenant';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                echo "Gambar Gagal di Upload";
            } else {
                $logo = $this->upload->data('file_name');
            }
        }
        $alamat_tenant  = $this->input->post('alamat_tenant');
        $kecamatan      = $this->input->post('kecamatan');
        $kabupaten      = $this->input->post('kabupaten');
        $provinsi       = $this->input->post('provinsi');
        $id_user        = $this->input->post('id_user');

        $data = [
            'nama_tenant'       => $nama_tenant,
            'keterangan'        => $keterangan,
            'status'            => $status,
            'kategori'          => $kategori,
            'harga_tenant'      => $harga_tenant,
            'qty'               => $qty,
            'tanggal_masuk'     => $tanggal_masuk,
            'tanggal_keluar'    => $tanggal_keluar,
            'logo'              => $logo,
            'alamat_tenant'     => $alamat_tenant,
            'kecamatan'         => $kecamatan,
            'kabupaten'         => $kabupaten,
            'provinsi'          => $provinsi,
            'id_user'           => $id_user
        ];

        // var_dump($data);
        // die;

        $where = ['kode_tenant' => $kode_tenant];

        $this->Model_admin->update_makeup($where, $data, 'tb_tenants');
        redirect('admin/c_admin/data_makeup');
    }

    public function hapus_makeup($id)
    {
        $where = array('kode_tenant' => $id);
        $this->Model_admin->hapus_makeup($where, 'tb_tenants');
        redirect('admin/c_admin/data_makeup');
    }

    public function detail_makeup($id)
    {
        // Ini DESAIN CODING 1 ==========================================================
        $data['photo'] = $this->Model_admin->photo($id)->result();
        $data['video'] = $this->Model_admin->video($id)->result();
        $data['makeup'] = $this->Model_admin->detail_makeup($id, 'tb_tenants');
        // var_dump($data);
        // die;
        $this->load->view('admin/tenant/v_detail_makeup', $data);
        // Ini DESAIN CODING 1 ==========================================================
    }

    public function tambah_foto_makeup($id)
    {
        $foto           = $this->input->post('foto');
        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads_gallery';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $kode_tenant = $this->input->post('kode_tenant');

        $data = [
            'foto'          => $foto,
            'kode_tenant'   => $kode_tenant
        ];

        // var_dump($data);
        // die;

        $this->Model_admin->tambah_foto_makeup($data, 'tb_photos');
        redirect('admin/c_admin/detail_makeup/' . $id);
    }

    public function hapus_video_makeup($id)
    {
        $where = ['kode_video' => $id];
        $kode_tenant = $this->Model_admin->get_kode_foto_photographer($where, 'tb_videos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_admin->hapus_video_makeup($where, 'tb_videos');
        redirect('admin/c_admin/detail_makeup/' . $kode);
    }

    public function hapus_foto_makeup($id)
    {
        $where = ['kode_photo' => $id];
        $kode_tenant = $this->Model_admin->get_kode_foto_photographer($where, 'tb_photos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_admin->hapus_foto_makeup($where, 'tb_photos');
        redirect('admin/c_admin/detail_makeup/' . $kode);
    }

    public function tambah_video_makeup($id)
    {
        // var_dump($id);
        // die;
        $video      = $this->input->post('video');
        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("Y-m-d_");
            $configVideo['upload_path'] = './uploads_gallery';
            $configVideo['max_size'] = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date . $_FILES['video']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
            } else {
                $video = $this->upload->data('file_name');
            }
        } else {
            echo "Please select a file";
        }
        $kode_tenant = $this->input->post('kode_tenant');

        $data = [
            'video'         => $video,
            'kode_tenant'   => $kode_tenant
        ];

        // var_dump($data);
        // die;

        $this->Model_admin->tambah_video_makeup($data, 'tb_videos');
        redirect('admin/c_admin/detail_makeup/' . $id);
    }
    // Controller DATA TENANT Makeup Artist
    // ====================================================================================================



    // ====================================================================================================
    // Controller DATA USER
    public function data_pelanggan()
    {
        $data['pelanggan'] = $this->Model_admin->data_pelanggan()->result();
        $this->load->view('admin/pelanggan/v_data_pelanggan', $data);
    }


    public function detail_pelanggan($id)
    {
        $data['pelanggan'] = $this->Model_admin->detail_pelanggan($id);
        $this->load->view('admin/pelanggan/v_detail_pelanggan', $data);
    }

    public function edit_pelanggan($id)
    {
        $data['pelanggan'] = $this->Model_admin->edit_pelanggan($id);
        $this->load->view('admin/pelanggan/v_edit_pelanggan', $data);
    }

    public function update_pelanggan()
    {
        $id_user            = $this->input->post('id_user');
        $nama_pengguna      = $this->input->post('nama_pengguna');
        $email              = $this->input->post('email');
        $password           = $this->input->post('password');
        $telepon_pengguna   = $this->input->post('telepon_pengguna');
        $alamat_pengguna    = $this->input->post('alamat_pengguna');
        $foto           = $this->input->post('foto');
        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads_user';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama_pengguna'     => $nama_pengguna,
            'email'             => $email,
            'password'          => $password,
            'telepon_pengguna'  => $telepon_pengguna,
            'alamat_pengguna'   => $alamat_pengguna,
            'foto'              => $foto
        ];

        $where = ['id_user' => $id_user];

        $this->Model_admin->update_pelanggan($where, $data, 'tb_users');
        redirect('admin/c_admin/data_pelanggan');
    }

    public function hapus_pelanggan($id)
    {
        $where = array('id_user' => $id);
        $this->Model_admin->hapus_makeup($where, 'tb_users');
        redirect('admin/c_admin/data_makeup');
    }
    // Controller DATA USER
    // ====================================================================================================


    // ====================================================================================================
    // Controller DATA Endorse
    public function data_endorse()
    {
        $data['endorse'] = $this->Model_admin->data_endorse('tb_tenants')->result();
        $this->load->view('admin/tenant/v_data_endorse', $data);
    }

    public function tambah_endorse()
    {
        $nama_tenant    = $this->input->post('nama_tenant');
        $harga_tenant   = $this->input->post('harga_tenant');
        $qty            = $this->input->post('qty');
        $tanggal_masuk  = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $logo           = $this->input->post('logo');
        if ($logo = '') {
        } else {
            $config['upload_path'] = './uploads_tenant';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                echo "Gambar Gagal di Upload";
            } else {
                $logo = $this->upload->data('file_name');
            }
        }
        $alamat_tenant  = $this->input->post('alamat_tenant');
        $kecamatan      = $this->input->post('kecamatan');
        $kabupaten      = $this->input->post('kabupaten');
        $provinsi       = $this->input->post('provinsi');
        $id_user        = $this->input->post('id_user');

        $data = [
            'nama_tenant'       => $nama_tenant,
            'keterangan'        => "Aktif",
            'status'            => "Available",
            'kategori'          => "Endorse",
            'harga_tenant'      => $harga_tenant,
            'qty'               => $qty,
            'tanggal_masuk'     => $tanggal_masuk,
            'tanggal_keluar'    => $tanggal_keluar,
            'logo'              => $logo,
            'alamat_tenant'     => $alamat_tenant,
            'kecamatan'         => $kecamatan,
            'kabupaten'         => $kabupaten,
            'provinsi'          => $provinsi,
            'id_user'           => $id_user
        ];

        $this->Model_admin->tambah_makeup($data, 'tb_tenants');
        redirect('admin/c_admin/data_endorse');
    }

    public function edit_endorse($id)
    {
        $data['keterangan'] = ['Aktif', 'Tidak Aktif'];
        $data['status'] = ['Available', 'Busy'];
        $data['kategori'] = ['Photographer', 'Makeup Artist', 'Endorse'];
        $data['makeup'] = $this->Model_admin->edit_makeup($id, 'tb_tenants');
        $this->load->view('admin/tenant/v_edit_endorse', $data);
    }

    public function update_endorse()
    {
        $kode_tenant    = $this->input->post('kode_tenant');
        $nama_tenant    = $this->input->post('nama_tenant');
        $keterangan     = $this->input->post('keterangan');
        $status         = $this->input->post('status');
        $kategori       = $this->input->post('kategori');
        $harga_tenant   = $this->input->post('harga_tenant');
        $qty            = $this->input->post('qty');
        $tanggal_masuk  = $this->input->post('tanggal_masuk');
        $tanggal_keluar = $this->input->post('tanggal_keluar');
        $logo           = $this->input->post('logo');
        if ($logo = '') {
        } else {
            $config['upload_path'] = './uploads_tenant';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                echo "Gambar Gagal di Upload";
            } else {
                $logo = $this->upload->data('file_name');
            }
        }
        $alamat_tenant  = $this->input->post('alamat_tenant');
        $kecamatan      = $this->input->post('kecamatan');
        $kabupaten      = $this->input->post('kabupaten');
        $provinsi       = $this->input->post('provinsi');
        $id_user        = $this->input->post('id_user');

        $data = [
            'nama_tenant'       => $nama_tenant,
            'keterangan'        => $keterangan,
            'status'            => $status,
            'kategori'          => $kategori,
            'harga_tenant'      => $harga_tenant,
            'qty'               => $qty,
            'tanggal_masuk'     => $tanggal_masuk,
            'tanggal_keluar'    => $tanggal_keluar,
            'logo'              => $logo,
            'alamat_tenant'     => $alamat_tenant,
            'kecamatan'         => $kecamatan,
            'kabupaten'         => $kabupaten,
            'provinsi'          => $provinsi,
            'id_user'           => $id_user
        ];

        // var_dump($data);
        // die;

        $where = ['kode_tenant' => $kode_tenant];

        $this->Model_admin->update_makeup($where, $data, 'tb_tenants');
        redirect('admin/c_admin/data_endorse');
    }

    public function hapus_endorse($id)
    {
        $where = array('kode_tenant' => $id);
        $this->Model_admin->hapus_endorse($where, 'tb_tenants');
        redirect('admin/c_admin/data_endorse');
    }

    public function detail_endorse($id)
    {
        // Ini DESAIN CODING 1 ==========================================================
        $data['photo'] = $this->Model_admin->photo($id)->result();
        $data['video'] = $this->Model_admin->video($id)->result();
        $data['endorse'] = $this->Model_admin->detail_endorse($id, 'tb_tenants');
        // var_dump($data);
        // die;
        $this->load->view('admin/tenant/v_detail_endorse', $data);
        // Ini DESAIN CODING 1 ==========================================================
    }

    public function tambah_foto_endorse($id)
    {
        $foto           = $this->input->post('foto');
        if ($foto = '') {
        } else {
            $config['upload_path'] = './uploads_gallery';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Gambar Gagal di Upload";
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $kode_tenant = $this->input->post('kode_tenant');

        $data = [
            'foto'          => $foto,
            'kode_tenant'   => $kode_tenant
        ];

        // var_dump($data);
        // die;

        $this->Model_admin->tambah_foto_endorse($data, 'tb_photos');
        redirect('admin/c_admin/detail_endorse/' . $id);
    }

    public function hapus_video_endorse($id)
    {
        $where = ['kode_video' => $id];
        $kode_tenant = $this->Model_admin->get_kode_foto_endorse($where, 'tb_videos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_admin->hapus_video_endorse($where, 'tb_videos');
        redirect('admin/c_admin/detail_makeup/' . $kode);
    }

    public function hapus_foto_endorse($id)
    {
        $where = ['kode_photo' => $id];
        $kode_tenant = $this->Model_admin->get_kode_foto_endorse($where, 'tb_photos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_admin->hapus_foto_endorse($where, 'tb_photos');
        redirect('admin/c_admin/detail_endorse/' . $kode);
    }

    public function tambah_video_endorse($id)
    {
        $video      = $this->input->post('video');
        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("Y-m-d_");
            $configVideo['upload_path'] = './uploads_gallery';
            $configVideo['max_size'] = '60000';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date . $_FILES['video']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
            } else {
                $video = $this->upload->data('file_name');
            }
        } else {
            echo "Please select a file";
        }
        $kode_tenant = $this->input->post('kode_tenant');

        $data = [
            'video'         => $video,
            'kode_tenant'   => $kode_tenant
        ];

        $this->Model_admin->tambah_video_endorse($data, 'tb_videos');
        redirect('admin/c_admin/detail_endorse/' . $id);
    }
    // Controller DATA Endorse
    // ====================================================================================================
}
