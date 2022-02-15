<?php

class Model_Member extends CI_Model
{
    // ====================================================================================================
    // Model Dashboard
    public function total_customer()
    {
        $this->db->where('role_id', 2);
        $query = $this->db->get('tb_users');
        return $query->num_rows();
    }

    public function total_tenant()
    {
        $query = $this->db->get('tb_tenants');
        return $query->num_rows();
    }

    public function total_photographer()
    {
        $query = $this->db->get_where('tb_tenants', ['kategori' => 'Photographer']);
        return $query->num_rows();
    }

    public function total_makeup()
    {
        $query = $this->db->get_where('tb_tenants', ['kategori' => 'Makeup Artist']);
        return $query->num_rows();
    }

    public function total_endorse()
    {
        $query = $this->db->get_where('tb_tenants', ['kategori' => 'Endorse']);
        return $query->num_rows();
    }

    public function total_member()
    {
        $this->db->where('role_id =', 3);
        $query = $this->db->get('tb_users');
        return $query->num_rows();
    }

    public function total_order()
    {
        $query = $this->db->get('tb_orders');
        return $query->num_rows();
    }

    public function total_payment()
    {
        $query = $this->db->get('tb_payments');
        return $query->num_rows();
    }
    // Model Dashboard
    // ====================================================================================================




    // ====================================================================================================
    // Data Photographer
    public function data_photographer()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_tenants');
        $this->db->where('kategori', 'Photographer');
        $this->db->where('id_user', $id);
        $query = $this->db->get();

        return $query;
    }

    public function edit_photographer($id)
    {
        return $this->db->get_where('tb_tenants', ['kode_tenant' => $id])->row_array();
    }

    public function update_photographer($where, $data, $table)
    {
        if ($data['logo'] == NULL) {
            unset($data['logo']);
        } else {
            unlink('uploads_tenant/' . $table['logo']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_photographer($id)
    {
        return $this->db->get_where('tb_tenants', ['kode_tenant' => $id])->row();
    }

    public function tambah_foto_photographer($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_foto_photographer($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_kode_foto_photographer($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }

    public function tambah_video_photographer($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_video_photographer($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_kode_video_photographer($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }
    // Data Photographer
    // ====================================================================================================



    // ====================================================================================================
    // Data Makeup Artist
    public function data_makeup()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_tenants');
        $this->db->where('kategori', 'Makeup Artist');
        $this->db->where('id_user', $id);
        $query = $this->db->get();

        return $query;
    }

    public function edit_makeup($id)
    {
        return $this->db->get_where('tb_tenants', ['kode_tenant' => $id])->row_array();
    }

    public function update_makeup($where, $data, $table)
    {
        if ($data['logo'] == NULL) {
            unset($data['logo']);
        } else {
            unlink('uploads_tenant/' . $table['logo']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_makeup($id)
    {
        return $this->db->get_where('tb_tenants', ['kode_tenant' => $id])->row();
    }

    public function tambah_foto_makeup($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_foto_makeup($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_kode_foto_makeup($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }

    public function tambah_video_makeup($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_video_makeup($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_kode_video_makeup($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }
    // Data Makeup Artist
    // ====================================================================================================




    // ====================================================================================================
    // Data Makeup Endorse
    public function data_endorse()
    {
        $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_tenants');
        $this->db->where('kategori', 'Endorse');
        $this->db->where('id_user', $id);
        $query = $this->db->get();

        return $query;
    }

    public function edit_endorse($id)
    {
        return $this->db->get_where('tb_tenants', ['kode_tenant' => $id])->row_array();
    }

    public function update_endorse($where, $data, $table)
    {
        if ($data['logo'] == NULL) {
            unset($data['logo']);
        } else {
            unlink('uploads_tenant/' . $table['logo']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_endorse($id)
    {
        return $this->db->get_where('tb_tenants', ['kode_tenant' => $id])->row();
    }

    public function tambah_foto_endorse($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_foto_endorse($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_kode_foto_endorse($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }

    public function tambah_video_endorse($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus_video_endorse($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_kode_video_endorse($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }
    // Data Endorse
    // ====================================================================================================


    // Controller Galleries
    public function photo($id)
    {
        $this->db->order_by('kode_photo', 'DESC');
        $this->db->where('kode_tenant', $id);
        return $this->db->get('tb_photos');
    }

    public function video($id)
    {
        $this->db->order_by('kode_video', 'DESC');
        $this->db->where('kode_tenant', $id);
        return $this->db->get('tb_videos');
    }
    // Controller Galleries



}
