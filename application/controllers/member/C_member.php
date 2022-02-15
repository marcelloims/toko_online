<?php

class C_member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '3') {

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
    // ==========================================================================
    // Dashboard
    public function dashboard()
    {
        $data['customer'] = $this->Model_member->total_customer();
        $data['tenant'] = $this->Model_member->total_tenant();
        $data['photographer'] = $this->Model_member->total_photographer();
        $data['makeup'] = $this->Model_member->total_makeup();
        $data['endorse'] = $this->Model_member->total_endorse();
        $data['member'] = $this->Model_member->total_member();
        $data['order'] = $this->Model_member->total_order();
        $data['payment'] = $this->Model_member->total_payment();
        $this->load->view('member/v_dashboard', $data);
    }
    // Dashboard
    // ==========================================================================

    // ==========================================================================
    // Data Photographer
    public function data_photographer()
    {
        $data['photographer'] = $this->Model_member->data_photographer()->result();
        $this->load->view('member/v_data_photographer', $data);
    }

    public function edit_photographer($id)
    {
        $data['photographer'] = $this->Model_member->edit_photographer($id);
        $data['keterangan'] = ['Aktif', 'Tidak Aktif'];
        $data['status'] = ['Available', 'Busy'];
        $data['kategori'] = ['Photographer', 'Makeup Artist', 'Endorse'];
        $this->load->view('member/v_edit_photographer', $data);
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

        $this->Model_member->update_photographer($where, $data, 'tb_tenants');
        redirect('member/c_member/data_photographer');
    }

    public function detail_photographer($id)
    {
        $data['photo'] = $this->Model_member->photo($id)->result();
        $data['video'] = $this->Model_member->video($id)->result();
        $data['photographer'] = $this->Model_member->detail_photographer($id);

        $this->load->view('member/v_detail_photographer', $data);
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

        $this->Model_member->tambah_foto_photographer($data, 'tb_photos');
        redirect('member/c_member/detail_photographer/' . $id);
    }

    public function hapus_foto_photographer($id)
    {
        $where = ['kode_photo' => $id];
        $kode_tenant = $this->Model_member->get_kode_foto_photographer($where, 'tb_photos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_member->hapus_foto_photographer($where, 'tb_photos');
        redirect('member/c_member/detail_photographer/' . $kode);
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

        $this->Model_member->tambah_video_photographer($data, 'tb_videos');
        redirect('member/c_member/detail_photographer/' . $id);
    }

    public function hapus_video_photographer($id)
    {
        $where = ['kode_video' => $id];
        $kode_tenant = $this->Model_member->get_kode_video_photographer($where, 'tb_videos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_member->hapus_video_photographer($where, 'tb_videos');
        redirect('member/c_member/detail_photographer/' . $kode);
    }
    // Data Photographer
    // ==========================================================================



    // ==========================================================================
    // Data Makeup Artist
    public function data_makeup()
    {
        $data['makeup'] = $this->Model_member->data_makeup()->result();
        $this->load->view('member/v_data_makeup', $data);
    }

    public function edit_makeup($id)
    {
        $data['makeup'] = $this->Model_member->edit_makeup($id);
        $data['keterangan'] = ['Aktif', 'Tidak Aktif'];
        $data['status'] = ['Available', 'Busy'];
        $data['kategori'] = ['Photographer', 'Makeup Artist', 'Endorse'];
        $this->load->view('member/v_edit_makeup', $data);
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

        $where = ['kode_tenant' => $kode_tenant];

        $this->Model_member->update_makeup($where, $data, 'tb_tenants');
        redirect('member/c_member/data_makeup');
    }

    public function detail_makeup($id)
    {
        $data['photo'] = $this->Model_member->photo($id)->result();
        $data['video'] = $this->Model_member->video($id)->result();
        $data['makeup'] = $this->Model_member->detail_makeup($id);

        $this->load->view('member/v_detail_makeup', $data);
        // Ini DESAIN CODING 2 ==========================================================
    }

    public function tambah_foto_makeup($id)
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

        $this->Model_member->tambah_foto_makeup($data, 'tb_photos');
        redirect('member/c_member/detail_makeup/' . $id);
    }

    public function hapus_foto_makeup($id)
    {
        $where = ['kode_photo' => $id];
        $kode_tenant = $this->Model_member->get_kode_foto_makeup($where, 'tb_photos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_member->hapus_foto_makeup($where, 'tb_photos');
        redirect('member/c_member/detail_makeup/' . $kode);
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

        $this->Model_member->tambah_video_makeup($data, 'tb_videos');
        redirect('member/c_member/detail_makeup/' . $id);
    }

    public function hapus_video_makeup($id)
    {
        $where = ['kode_video' => $id];
        $kode_tenant = $this->Model_member->get_kode_video_makeup($where, 'tb_videos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_member->hapus_video_makeup($where, 'tb_videos');
        redirect('member/c_member/detail_makeup/' . $kode);
    }
    // Data Makeup Artist
    // ==========================================================================





    // =========================================================================
    // Data Makeup Artist
    public function data_endorse()
    {
        $data['endorse'] = $this->Model_member->data_endorse()->result();
        $this->load->view('member/v_data_endorse', $data);
    }

    public function edit_endorse($id)
    {
        $data['endorse'] = $this->Model_member->edit_endorse($id);
        $data['keterangan'] = ['Aktif', 'Tidak Aktif'];
        $data['status'] = ['Available', 'Busy'];
        $data['kategori'] = ['Photographer', 'Makeup Artist', 'Endorse'];
        $this->load->view('member/v_edit_endorse', $data);
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

        $where = ['kode_tenant' => $kode_tenant];

        $this->Model_member->update_endorse($where, $data, 'tb_tenants');
        redirect('member/c_member/data_endorse');
    }

    public function detail_endorse($id)
    {
        $data['photo'] = $this->Model_member->photo($id)->result();
        $data['video'] = $this->Model_member->video($id)->result();
        $data['endorse'] = $this->Model_member->detail_endorse($id);

        $this->load->view('member/v_detail_endorse', $data);
        // Ini DESAIN CODING 2 ==========================================================
    }

    public function tambah_foto_endorse($id)
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

        $this->Model_member->tambah_foto_endorse($data, 'tb_photos');
        redirect('member/c_member/detail_endorse/' . $id);
    }

    public function hapus_foto_endorse($id)
    {
        $where = ['kode_photo' => $id];
        $kode_tenant = $this->Model_member->get_kode_foto_endorse($where, 'tb_photos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_member->hapus_foto_endorse($where, 'tb_photos');
        redirect('member/c_member/detail_endorse/' . $kode);
    }

    public function tambah_video_endorse($id)
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

        $this->Model_member->tambah_video_endorse($data, 'tb_videos');
        redirect('member/c_member/detail_endorse/' . $id);
    }

    public function hapus_video_endorse($id)
    {
        $where = ['kode_video' => $id];
        $kode_tenant = $this->Model_member->get_kode_video_endorse($where, 'tb_videos')->row();
        $kode = $kode_tenant->kode_tenant;
        $this->Model_member->hapus_video_endorse($where, 'tb_videos');
        redirect('member/c_member/detail_endorse/' . $kode);
    }
    // Data Makeup Artist
    // ==========================================================================
}
