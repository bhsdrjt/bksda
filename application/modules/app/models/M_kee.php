<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kee extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_kee)
    {
        $this->db->select("app_kee.*");
        $this->db->where("app_kee.id_kee",$id_kee);
        return $this->db->get('app_kee');
    }

   

    function lihatdata()
    {
        $this->db->select("app_kee.*");
        return $this->db->get('app_kee');
    }
    function cekdata($id_kee)
    {
        $this->db->where("id_kee",$id_kee);
        return $this->db->get('app_kee')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_kee',$array);
    }

    function editdata($id_kee,$array)
    {
        $this->db->where("id_kee",$id_kee);
        return $this->db->update('app_kee',$array);
    }
    function hapus($id_kee)
    {
        $this->db->where("id_kee",$id_kee);
        return $this->db->delete('app_kee');
    }
  
}
