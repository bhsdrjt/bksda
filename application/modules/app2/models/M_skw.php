<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_skw extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_skw)
    {
        $this->db->select("app_skw.*");
        $this->db->where("app_skw.id_skw",$id_skw);
        return $this->db->get('app_skw');
    }

   

    function lihatdata()
    {
        $this->db->select("app_skw.*");
        return $this->db->get('app_skw');
    }
    function cekdata($id_skw)
    {
        $this->db->where("id_skw",$id_skw);
        return $this->db->get('app_skw')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_skw',$array);
    }

    function editdata($id_skw,$array)
    {
        $this->db->where("id_skw",$id_skw);
        return $this->db->update('app_skw',$array);
    }
    function hapus($id_skw)
    {
        $this->db->where("id_skw",$id_skw);
        return $this->db->delete('app_skw');
    }
  
}
