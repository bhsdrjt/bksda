<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        $this->db->where("app_user.rule != 'administrator'");
        return $this->db->get('app_user');
    }
   
    function lihatdatasatu($username)
    {
        $this->db->where("app_user.username",$username);
        return $this->db->get('app_user');
    }
    function cekdata($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('app_user')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_user',$array);
    }

    function editdata($username,$array)
    {
        $this->db->where("username",$username);
        return $this->db->update('app_user',$array);
    }
    function hapus($username)
    {
        $this->db->where("username",$username);
        return $this->db->delete('app_user');
    }
  
}
