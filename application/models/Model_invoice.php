<?php

class Model_invoice extends CI_Model
{
    // Model Invoice Admin
    public function data_pesanan_admin()
    {
        $result = $this->db->get('tb_orders');
        return $result;
    }

    public function detail_pesanan_admin($id)
    {
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_orders.no_invoice', $id);
        $this->db->join('tb_detail_orders', 'tb_detail_orders.no_invoice = tb_orders.no_invoice');
        $this->db->join('tb_payments', 'tb_payments.kode_pembayaran = tb_orders.kode_pembayaran');
        $query = $this->db->get();
        return $query;
    }

    public function data_pembayaran_admin()
    {
        $result = $this->db->get('tb_payments');
        return $result->result();
    }

    public function delete_invoice($id, $table)
    {
        $this->db->where($id);
        $this->db->delete($table);
    }
    // Model Invoice Admin


    // ================================================================================


    // Model Invoice Pelanggan
    public function data_pesanan_pelanggan()
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('id_user', $id);
        $result = $this->db->get('tb_orders');
        return $result;
    }

    public function detail_pesanan_pelanggan($id)
    {
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_orders.no_invoice', $id);
        $this->db->join('tb_detail_orders', 'tb_detail_orders.no_invoice = tb_orders.no_invoice');
        $this->db->join('tb_payments', 'tb_payments.kode_pembayaran = tb_orders.kode_pembayaran');
        $query = $this->db->get();
        return $query;
    }

    public function detail_orders($id)
    {
        $this->db->select('*');
        $this->db->from('tb_detail_orders');
        $this->db->where('no_invoice', $id);
        $this->db->join('tb_tenants', 'tb_detail_orders.kode_tenant = tb_tenants.kode_tenant');
        $query = $this->db->get();
        return $query;
    }

    public function data_pembayaran_pelanggan()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_orders.id_user', $id);
        $this->db->join('tb_payments', 'tb_payments.kode_pembayaran = tb_orders.kode_pembayaran');
        // $this->db->join('tb_detail_orders', 'tb_payments.kode_pembayaran = tb_detail_orders.kode_pembayaran');
        $result = $this->db->get();
        return $result->result();
    }

    public function form_pembayaran($id)
    {
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_orders.no_invoice', $id);
        $this->db->join('tb_payments', 'tb_orders.kode_pembayaran = tb_payments.kode_pembayaran');
        $this->db->join('tb_detail_orders', 'tb_orders.no_invoice = tb_detail_orders.no_invoice');
        $this->db->join('tb_tenants', 'tb_detail_orders.kode_tenant = tb_tenants.kode_tenant');
        $result = $this->db->get();
        return $result->result();
    }

    public function process_payment_dp($kode_pembayaran, $no_invoice, $bukti_pembayaran)
    {
        $payment = [
            'tanggal_pembayaran' => date('d-M-Y'),
            'status_pembayaran'  => "Diterima",
            'bukti_dp'   => $bukti_pembayaran
        ];
        $this->db->where('kode_pembayaran', $kode_pembayaran);
        $this->db->update('tb_payments', $payment);


        $invoice = ['status_pesanan' => "Diproses"];
        $this->db->where('no_invoice', $no_invoice);
        $this->db->update('tb_orders', $invoice);
    }

    public function process_payment_pelunasan($kode_pembayaran, $bukti_pembayaran)
    {
        $payment = [
            'tanggal_pembayaran' => date('d-M-Y'),
            'bukti_pelunasan'    => $bukti_pembayaran
        ];
        $this->db->where('kode_pembayaran', $kode_pembayaran);
        $this->db->update('tb_payments', $payment);
    }

    public function payment_pelunasan($kode_pembayaran, $no_invoice, $bukti_pembayaran)
    {
        $payment = [
            'tanggal_pembayaran' => date('d-M-Y'),
            'status_pembayaran'  => "Diterima",
            'bukti_pelunasan'   => $bukti_pembayaran
        ];
        $this->db->where('kode_pembayaran', $kode_pembayaran);
        $this->db->update('tb_payments', $payment);


        $invoice = ['status_pesanan' => "Diproses"];
        $this->db->where('no_invoice', $no_invoice);
        $this->db->update('tb_orders', $invoice);
    }
    // Model Invoice Pelanggan


    // ================================================================================


    // Print Invoice
    public function print_invoice($id)
    {
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_orders.no_invoice', $id);
        $this->db->join('tb_invoices', 'tb_invoices.no_invoice = tb_orders.no_invoice');
        $this->db->join('tb_tenants', 'tb_tenants.kode_tenant = tb_orders.kode_tenant');
        $this->db->join('tb_payments', 'tb_payments.kode_pembayaran = tb_orders.kode_pembayaran');
        $query = $this->db->get();
        return $query;
    }
    // Print Invoice


    // ================================================================================



    // Model Invoice Member
    public function data_pesanan_member()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_tenants.id_user', $id);
        $this->db->join('tb_detail_orders', 'tb_detail_orders.no_invoice = tb_orders.no_invoice');
        $this->db->join('tb_tenants', 'tb_detail_orders.kode_tenant = tb_tenants.kode_tenant');
        $result = $this->db->get();
        return $result;
    }

    public function detail_pesanan_member($id)
    {
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_orders.no_invoice', $id);
        $this->db->join('tb_detail_orders', 'tb_detail_orders.no_invoice = tb_orders.no_invoice');
        $this->db->join('tb_payments', 'tb_payments.kode_pembayaran = tb_orders.kode_pembayaran');
        $query = $this->db->get();
        return $query;
    }

    public function reject_pesanan($id)
    {
        $kode = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_detail_orders');
        $this->db->where('no_invoice', $id);
        $this->db->where('id_user', $kode);
        $this->db->join('tb_tenants', 'tb_detail_orders.kode_tenant = tb_tenants.kode_tenant');
        $query = $this->db->get();
        return $query;
    }

    public function reject($id)
    {
        $this->db->where('kode_tenant', $id);
        $this->db->delete('tb_detail_orders');
    }

    public function accept($where, $data, $kode_pembayaran)
    {
        $this->db->where($where);
        $this->db->update('tb_detail_orders', $data);

        // $payment = ['status_order' => 'Accept'];
        // $this->db->where('kode_pembayaran', $kode_pembayaran);
        // $this->db->update('tb_payments', $payment);
    }


    public function data_pembayaran_member()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_tenants');
        $this->db->where('tb_tenants.id_user', $id);
        $this->db->join('tb_detail_orders', 'tb_tenants.kode_tenant = tb_detail_orders.kode_tenant');
        $this->db->join('tb_payments', 'tb_payments.kode_pembayaran = tb_detail_orders.kode_pembayaran');
        $result = $this->db->get();
        return $result;
    }

    public function detail_pembayaran_member($id)
    {
        $this->db->select('*');
        $this->db->from('tb_orders');
        $this->db->where('tb_orders.no_invoice', $id);
        $this->db->join('tb_payments', 'tb_orders.kode_pembayaran = tb_payments.kode_pembayaran');
        $this->db->join('tb_detail_orders', 'tb_orders.no_invoice = tb_detail_orders.no_invoice');
        $this->db->join('tb_tenants', 'tb_detail_orders.kode_tenant = tb_tenants.kode_tenant');
        $result = $this->db->get();
        return $result->result();
    }
    // Model Invoice Member
}
