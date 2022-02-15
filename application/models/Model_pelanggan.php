<?php

class Model_pelanggan extends CI_Model
{

    public function data_photographer()
    {
        $tanggal_mulai = $this->input->get('tanggal_mulai');
        $tanggal_akhir = $this->input->get('tanggal_akhir');


        $_SESSION['tanggal_mulai'] = $tanggal_mulai;
        $_SESSION['tanggal_akhir'] = $tanggal_akhir;

        if ($tanggal_mulai == NULL && $tanggal_akhir == NULL) {
            $query = $this->db->query("SELECT * 
								   FROM tb_tenants
								   WHERE kategori ='Photographer'
								   AND qty < 0");
        } else {
            $query = $this->db->query("SELECT * 
								   FROM tb_tenants 
								   WHERE kategori ='Photographer'
								   AND qty > 0
								   AND status != 'Busy' 
								   AND kode_tenant NOT IN
								   (SELECT kode_tenant
								   FROM tb_detail_orders 
								   WHERE tanggal_mulai >= $tanggal_mulai
								   AND tanggal_akhir <= $tanggal_akhir
								   )
								  ");
        }
        return $query;

        // $this->db->where('kategori', 'Photographer');
        // return $this->db->get('tb_tenants');
    }

    public function data_makeup()
    {
        $tanggal_mulai = $this->input->get('tanggal_mulai');
        $tanggal_akhir = $this->input->get('tanggal_akhir');


        $_SESSION['tanggal_mulai'] = $tanggal_mulai;
        $_SESSION['tanggal_akhir'] = $tanggal_akhir;

        if ($tanggal_mulai == NULL && $tanggal_akhir == NULL) {
            $query = $this->db->query("SELECT * 
								   FROM tb_tenants
								   WHERE kategori ='Makeup Artist'
								   AND qty < 0");
        } else {
            $query = $this->db->query("SELECT * 
								   FROM tb_tenants 
								   WHERE kategori ='Makeup Artist'
								   AND qty > 0
								   AND status != 'Busy' 
								   AND kode_tenant NOT IN
								   (SELECT kode_tenant
								   FROM tb_detail_orders 
								   WHERE tanggal_mulai >= $tanggal_mulai
								   AND tanggal_akhir <= $tanggal_akhir
								   )
								  ");
        }
        return $query;

        // $this->db->where('kategori', 'Photographer');
        // return $this->db->get('tb_tenants');
    }

    public function data_endorse()
    {
        $tanggal_mulai = $this->input->get('tanggal_mulai');
        $tanggal_akhir = $this->input->get('tanggal_akhir');


        $_SESSION['tanggal_mulai'] = $tanggal_mulai;
        $_SESSION['tanggal_akhir'] = $tanggal_akhir;

        if ($tanggal_mulai == NULL && $tanggal_akhir == NULL) {
            $query = $this->db->query("SELECT * 
								   FROM tb_tenants
								   WHERE kategori ='Endorse'
								   AND qty < 0");
        } else {
            $query = $this->db->query("SELECT * 
								   FROM tb_tenants 
								   WHERE kategori ='Endorse'
								   AND qty > 0
								   AND status != 'Busy' 
								   AND kode_tenant NOT IN
								   (SELECT kode_tenant
								   FROM tb_detail_orders 
								   WHERE tanggal_mulai >= $tanggal_mulai
								   AND tanggal_akhir <= $tanggal_akhir
								   )
								  ");
        }
        return $query;
    }

    public function tambah_ke_keranjang($id)
    {
        $result = $this->db
            ->where('kode_tenant', $id)
            ->limit(1)
            ->get('tb_tenants');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function proses_pesanan()
    {
        date_default_timezone_set('Asia/Makassar');
        $nama_pemesan       = $this->input->post('nama_pemesan');
        $alamat_pemesan     = $this->input->post('alamat_pemesan');
        $telepon_pemesan    = $this->input->post('telepon_pemesan');
        $metode_pembayaran  = $this->input->post('metode_pembayaran');
        $total_pembayaran   = $this->input->post('total_pembayaran');
        // $total_bayar        = $this->input->post('total_bayar');
        $bank               = $this->input->post('bank');


        $payments = [
            'tanggal_pembayaran'    => '',
            'metode_pembayaran'     => $metode_pembayaran,
            'status_pembayaran'     => 'Belum Bayar',
            'total_pembayaran'      => $total_pembayaran,
            // 'total_bayar'           => $total_bayar,
            'bukti_pelunasan'       => "",
            'bukti_dp'              => "",
            'bank'                  => $bank,
            'batas_pembayaran'      => date(
                'd-M-Y H:i:s',
                mktime(
                    date('H') + 2,
                    date('i'),
                    date('s'),
                    date('m'),
                    date('d'),
                    date('Y')
                )
            )
        ];

        $this->db->insert('tb_payments', $payments);
        $kode_pembayaran = $this->db->insert_id();


        $orders = [
            'kode_pembayaran'   => $kode_pembayaran,
            'tanggal_pesanan'   => date('d-M-Y'),
            'tanggal_invoice'   => date('d-M-Y'),
            'status_pesanan'    => 'Menunggu Pembayaran',
            'nama_pemesan'      => $nama_pemesan,
            'alamat_pemesan'    => $alamat_pemesan,
            'telepon_pemesan'   => $telepon_pemesan,
            'id_user'           => $this->session->userdata('id_user')
        ];

        $this->db->insert('tb_orders', $orders);
        $no_invoice = $this->db->insert_id();


        // var_dump($this->cart->contents());
        // die;
        foreach ($this->cart->contents() as $item) {
            $total = 0;

            $detail_orders = [
                'kode_tenant'   => $item['id'],
                'tanggal_mulai' => $item['tanggal_mulai'],
                'tanggal_akhir' => $item['tanggal_akhir'],
                'harga_tenant'  => $item['price'],
                'grand_total'   => $total += $item['subtotal'],
                'no_invoice'    => $no_invoice,
                'kode_pembayaran' => $kode_pembayaran
            ];

            $this->db->insert('tb_detail_orders', $detail_orders);
        }

        return true;
    }


    public function detail_photographer($id)
    {
        return $this->db->get_where('tb_tenants', ['kode_tenant' => $id])->row();
    }

    public function detail_makeup($id, $table)
    {
        $this->db->where('kode_tenant', $id);
        $query = $this->db->get($table);
        return $query->row();
    }
}
