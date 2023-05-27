<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penangkar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id)
    {
        $this->db->select("app_penangkar.*");
        $this->db->where("app_penangkar.id",$id);
        return $this->db->get('app_penangkar');
    }

   

    function lihatdata()
    {
        $this->db->select("app_penangkar.*");
        $this->db->order_by('id', 'desc');
        return $this->db->get('app_penangkar');
    }
    function cekdata($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('app_penangkar')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_penangkar',$array);
    }

    function editdata($id,$array)
    {
        $this->db->where("id",$id);
        return $this->db->update('app_penangkar',$array);
    }
    function hapus($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete('app_penangkar');
    }
  
}
