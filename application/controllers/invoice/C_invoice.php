<?php

class C_invoice extends CI_Controller
{
    //  Controller Invoice Admin
    public function data_pesanan_admin()
    {
        $data['pesanan'] = $this->Model_invoice->data_pesanan_admin()->result();
        $this->load->view('invoice/v_data_pesanan_admin', $data);
    }

    public function detail_pesanan_admin($id)
    {
        $data['detail'] = $this->Model_invoice->detail_pesanan_admin($id, 'tb_orders')->result();
        $data['detail_orders']  = $this->Model_invoice->detail_orders($id)->result();
        $this->load->view('invoice/v_detail_pesanan_admin', $data);
    }

    public function data_pembayaran_admin()
    {
        $data['pembayaran'] = $this->Model_invoice->data_pembayaran_admin();
        $this->load->view('invoice/v_data_pembayaran_admin', $data);
    }
    // Controller Invoice Admin


    // ================================================================================


    // Conttoller Invoice Pelanggan
    public function data_pesanan_pelanggan()
    {
        $data['pesanan'] = $this->Model_invoice->data_pesanan_pelanggan()->result();
        $this->load->view('invoice/v_data_pesanan_pelanggan', $data);
    }

    public function detail_pesanan_pelanggan($id)
    {
        $data['detail'] = $this->Model_invoice->detail_pesanan_pelanggan($id, 'tb_orders')->result();
        $data['detail_orders']  = $this->Model_invoice->detail_orders($id)->result();
        $this->load->view('invoice/v_detail_pesanan_pelanggan', $data);
    }

    public function data_pembayaran_pelanggan()
    {
        $data['pembayaran'] = $this->Model_invoice->data_pembayaran_pelanggan();
        $this->load->view('invoice/v_data_pembayaran_pelanggan', $data);
    }

    public function form_pembayaran($id)
    {
        $data['pembayaran'] = $this->Model_invoice->form_pembayaran($id);
        $this->load->view('invoice/v_form_pembayaran', $data);
    }

    public function process_payment_dp()
    {
        $kode_pembayaran    = $this->input->post('kode_pembayaran');
        $no_invoice         = $this->input->post('no_invoice');
        $bukti_pembayaran   = $_FILES['bukti_dp']['name'];
        if ($bukti_pembayaran = '') {
        } else {
            $config['upload_path'] = './uploads_pembayaran';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_dp')) {
                echo "Gambar Gagal di Upload";
            } else {
                $bukti_pembayaran = $this->upload->data('file_name');
            }
        }

        $this->Model_invoice->process_payment_dp($kode_pembayaran, $no_invoice, $bukti_pembayaran);
        redirect('invoice/c_invoice/data_pesanan_pelanggan');
    }

    public function process_payment_pelunasan()
    {
        $kode_pembayaran    = $this->input->post('kode_pembayaran');
        $bukti_pembayaran   = $_FILES['bukti_pelunasan']['name'];
        if ($bukti_pembayaran = '') {
        } else {
            $config['upload_path'] = './uploads_pembayaran';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_pelunasan')) {
                echo "Gambar Gagal di Upload";
            } else {
                $bukti_pembayaran = $this->upload->data('file_name');
            }
        }

        $this->Model_invoice->process_payment_pelunasan($kode_pembayaran, $bukti_pembayaran);
        redirect('invoice/c_invoice/data_pesanan_pelanggan');
    }

    public function payment_pelunasan()
    {
        $kode_pembayaran    = $this->input->post('kode_pembayaran');
        $no_invoice         = $this->input->post('no_invoice');
        $bukti_pembayaran   = $_FILES['bukti_pelunasan']['name'];
        if ($bukti_pembayaran = '') {
        } else {
            $config['upload_path'] = './uploads_pembayaran';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_pelunasan')) {
                echo "Gambar Gagal di Upload";
            } else {
                $bukti_pembayaran = $this->upload->data('file_name');
            }
        }

        $this->Model_invoice->payment_pelunasan($kode_pembayaran, $no_invoice, $bukti_pembayaran);
        redirect('invoice/c_invoice/data_pesanan_pelanggan');
    }
    // Controller Invoice Pelanggan


    // ================================================================================


    // Print Invoice
    public function print_invoice($id)
    {
        $data['detail'] = $this->Model_invoice->detail_pesanan_pelanggan($id, 'tb_orders')->result();
        $data['detail_orders']  = $this->Model_invoice->detail_orders($id)->result();
        $this->load->view('invoice/v_print_invoice', $data);
    }
    //  Print Invoice


    // ================================================================================


    // Print Invoice
    public function delete_invoice($id)
    {
        $where = ['no_invoice' => $id];
        $this->Model_invoice->delete_invoice($where, 'tb_orders');
        redirect('invoice/c_invoice/data_pesanan_admin');
    }
    // Print Invoice


    // ================================================================================


    // Controller Invoice Member
    public function data_pesanan_member()
    {
        $data['pesanan'] = $this->Model_invoice->data_pesanan_member()->result();
        $this->load->view('invoice/v_data_pesanan_member', $data);
    }

    public function detail_pesanan_member($id)
    {
        $data['detail'] = $this->Model_invoice->detail_pesanan_member($id, 'tb_orders')->result();
        $data['detail_orders']  = $this->Model_invoice->detail_orders($id)->result();
        $this->load->view('invoice/v_detail_pesanan_member', $data);
    }

    public function reject_pesanan($id)
    {
        $data['detail_orders']  = $this->Model_invoice->reject_pesanan($id)->result();
        $this->load->view('invoice/v_reject_pesanan', $data);
    }

    public function reject($id)
    {
        $this->Model_invoice->reject($id);
        redirect('invoice/c_invoice/data_pesanan_member');
    }

    public function accept()
    {
        $id = $this->input->post('kode_tenant');
        $kode_pembayaran = $this->input->post('kode_pembayaran');
        $data = ['status_order' => 'Accept'];
        $where = ['kode_tenant' => $id];
        $this->Model_invoice->accept($where, $data, $kode_pembayaran);
        redirect('invoice/c_invoice/data_pesanan_member');
    }

    public function data_pembayaran_member()
    {
        $data['pembayaran'] = $this->Model_invoice->data_pembayaran_member()->result();
        $this->load->view('invoice/v_data_pembayaran_member', $data);
    }

    public function detail_pembayaran_member($id)
    {
        $data['pembayaran'] = $this->Model_invoice->detail_pembayaran_member($id);
        $this->load->view('invoice/v_detail_pembayaran_member', $data);
    }
    // Controller Invoice Member
}
