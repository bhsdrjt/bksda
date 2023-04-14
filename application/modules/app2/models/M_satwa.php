<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_satwa extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_satwa)
    {
        $this->db->select("app_satwa.*");
        $this->db->where("app_satwa.id_satwa",$id_satwa);
        return $this->db->get('app_satwa');
    }

   

    function lihatdata()
    {
        $this->db->select("app_satwa.*");
        return $this->db->get('app_satwa');
    }
    function cekdata($id_satwa)
    {
        $this->db->where("id_satwa",$id_satwa);
        return $this->db->get('app_satwa')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_satwa',$array);
    }

    function editdata($id_satwa,$array)
    {
        $this->db->where("id_satwa",$id_satwa);
        return $this->db->update('app_satwa',$array);
    }
    function hapus($id_satwa)
    {
        $this->db->where("id_satwa",$id_satwa);
        return $this->db->delete('app_satwa');
    }
  
}
