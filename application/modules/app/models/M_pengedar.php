<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengedar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function lihatdatasatu($id)
    {
        $this->db->select("app_pengedar.*");
        $this->db->where("app_pengedar.id", $id);
        return $this->db->get('app_pengedar');
    }
    function getdataPemilik()
    {
        $this->db->select("app_pengedar.pemilik, app_pengedar.id");
        $this->db->order_by('id', 'asc');
        $this->db->where('app_pengedar.pemilik != ""');
        return $this->db->get('app_pengedar');
    }
    function lihatdata()
    {
        $this->db->select("app_pengedar.*");
        $this->db->order_by('id', 'asc');
        return $this->db->get('app_pengedar');
    }
    function cekdata($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('app_pengedar')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_pengedar', $array);
    }

    function editdata($id, $array)
    {
        $this->db->where("id", $id);
        return $this->db->update('app_pengedar', $array);
    }
    function hapus($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete('app_pengedar');
    }
}
