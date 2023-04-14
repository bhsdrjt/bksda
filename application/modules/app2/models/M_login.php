<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function ceklogin($username,$password)
    {
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        return $this->db->get('app_user');
    }
}
