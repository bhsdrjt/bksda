<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_resort extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_resort)
    {
        $this->db->select("app_resort.*, app_skw.namawilayah")
        ->join("app_skw","app_skw.id_skw=app_resort.id_skw","inner");
        $this->db->where("app_resort.id_resort",$id_resort);
        return $this->db->get('app_resort');
    }


    function lihatdata()
    {
        $this->db->select("app_resort.*");
        return $this->db->get('app_resort');
    }
    function cekdata($id_resort)
    {
        $this->db->where("id_resort",$id_resort);
        return $this->db->get('app_resort')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_resort',$array);
    }

    function editdata($id_resort,$array)
    {
        $this->db->where("id_resort",$id_resort);
        return $this->db->update('app_resort',$array);
    }
    function hapus($id_resort)
    {
        $this->db->where("id_resort",$id_resort);
        return $this->db->delete('app_resort');
    }
  
}
