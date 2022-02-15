<?php

class Model_admin extends CI_Model
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
    //Model Data Member
    public function data_member()
    {
        $this->db->where('role_id', 3);
        return $this->db->get('tb_users');
    }

    public function tambah_member($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_member($where, $id)
    {
        return $this->db->get_where($id, $where);
    }

    public function update_member($where, $data, $table)
    {
        if ($data['foto'] == NULL) {
            unset($data['foto']);
        } else {
            unlink('uploads_user/' . $table['foto']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_member($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_member($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('tb_users');
        return $query;
    }
    //Model Data Member
    // ====================================================================================================



    // ====================================================================================================
    //Model Data Photographer
    public function data_photographer()
    {
        $this->db->select('*');
        $this->db->from('tb_tenants');
        $this->db->where('kategori', 'Photographer');
        $query = $this->db->get();

        return $query;
    }

    public function tambah_photographer($data, $table)
    {
        $this->db->insert($table, $data);
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

    public function hapus_photographer($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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
    //Model Data Photogpraher
    // ====================================================================================================



    // ====================================================================================================
    //Model Data Makeup
    public function data_makeup($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('kategori', 'Makeup Artist');
        return $this->db->get();
    }

    public function  tambah_makeup($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_makeup($id, $table)
    {
        $this->db->where('kode_tenant', $id);
        return $this->db->get($table)->row_array();
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

    public function hapus_makeup($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_makeup($id, $table)
    {
        $this->db->where('kode_tenant', $id);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function tambah_foto_makeup($data, $table)
    {
        $this->db->insert($table, $data);
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

    public function hapus_foto_makeup($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_kode_video_makeup($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }

    public function get_kode_foto_makeup($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }
    //Model Data Makeup
    // ====================================================================================================


    // ====================================================================================================
    // Model Data User
    public function data_pelanggan()
    {
        $this->db->where('role_id', 2);
        return $this->db->get('tb_users');
    }

    public function detail_pelanggan($id)
    {
        return $this->db->get_where('tb_users', ['id_user' => $id])->row();
    }

    public function edit_pelanggan($id)
    {
        return $this->db->get_where('tb_users', ['id_user' => $id])->row_array();
    }

    public function update_pelanggan($where, $data, $table)
    {
        if ($data['foto'] == NULL) {
            unset($data['foto']);
        } else {
            unlink('uploads_user/' . $table['foto']);
        }
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_pelanggan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    // Model Data User
    // ====================================================================================================

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

    // ====================================================================================================
    //Model Data Endorse
    public function data_endorse($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('kategori', 'Endorse');
        return $this->db->get();
    }

    public function  tambah_endorse($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_endorse($id, $table)
    {
        $this->db->where('kode_tenant', $id);
        return $this->db->get($table)->row_array();
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

    public function hapus_endorse($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function detail_endorse($id, $table)
    {
        $this->db->where('kode_tenant', $id);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function tambah_foto_endorse($data, $table)
    {
        $this->db->insert($table, $data);
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

    public function hapus_foto_endorse($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // public function get_kode_video_makeup($where, $table)
    // {
    //     $this->db->select('kode_tenant');
    //     return $this->db->get_where($table, $where);
    // }

    public function get_kode_foto_endorse($where, $table)
    {
        $this->db->select('kode_tenant');
        return $this->db->get_where($table, $where);
    }
    //Model Data Endorse
    // ====================================================================================================
}
