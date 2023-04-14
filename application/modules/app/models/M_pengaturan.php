<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengaturan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        $this->db->where("app_pengaturan.rule != 'administrator'");
        return $this->db->get('app_pengaturan');
    }
   
    function lihatdatasatu($id_pengaturan)
    {
        $this->db->where("app_pengaturan.id_pengaturan",$id_pengaturan);
        return $this->db->get('app_pengaturan');
    }
    function cekdata($id_pengaturan)
    {
        $this->db->where("id_pengaturan",$id_pengaturan);
        return $this->db->get('app_pengaturan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_pengaturan',$array);
    }

    function editdata($id_pengaturan,$array)
    {
        $this->db->where("id_pengaturan",$id_pengaturan);
        return $this->db->update('app_pengaturan',$array);
    }
    function hapus($id_pengaturan)
    {
        $this->db->where("id_pengaturan",$id_pengaturan);
        return $this->db->delete('app_pengaturan');
    }
  
}
