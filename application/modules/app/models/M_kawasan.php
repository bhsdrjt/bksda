<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kawasan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_kawasan)
    {
        $this->db->select("app_kawasan.*, app_skw.namawilayah")
        ->join("app_skw","app_skw.id_skw=app_kawasan.id_skw","inner");
        $this->db->where("app_kawasan.id_kawasan",$id_kawasan);
        return $this->db->get('app_kawasan');
    }


    function lihatdata()
    {
        $this->db->select("app_kawasan.*, app_skw.namawilayah")
        ->join("app_skw","app_skw.id_skw=app_kawasan.id_skw","inner");
        return $this->db->get('app_kawasan');
    }
    function cekdata($id_kawasan)
    {
        $this->db->where("id_kawasan",$id_kawasan);
        return $this->db->get('app_kawasan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_kawasan',$array);
    }

    function editdata($id_kawasan,$array)
    {
        $this->db->where("id_kawasan",$id_kawasan);
        return $this->db->update('app_kawasan',$array);
    }
    function hapus($id_kawasan)
    {
        $this->db->where("id_kawasan",$id_kawasan);
        return $this->db->delete('app_kawasan');
    }
  
}
