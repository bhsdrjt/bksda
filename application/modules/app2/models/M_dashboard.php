<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function jumlahlaporan()
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahlaporanvalid()
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("validasi","Tervalidasi");
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahlaporantolak()
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("validasi","Tertolak");
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahlaporanmenunggu()
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("validasi","Menunggu Validasi");
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahkawasan()
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('app_kawasan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahskw()
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('app_skw')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahresort()
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('app_resort')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function laporanjenis()
    {
        $this->db->select("COUNT(kategori) as jumlah, kategori");
        $this->db->group_by("kategori");
        return  $jumlah = $this->db->get('app_laporan');
    }

    function laporankawasan()
    {
        $this->db->select("COUNT(app_laporan.id_kawasan)  as jumlah, app_kawasan.namakawasan")
        ->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner")
        ->group_by("app_laporan.id_kawasan");
        
        return $this->db->get('app_laporan');
    }



    function jumlahlaporanuser($username)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("app_laporan.username",$username);
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahlaporanvaliduser($username)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("validasi","Tervalidasi");
        $this->db->where("app_laporan.username",$username);
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahlaporantolakuser($username)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("validasi","Tertolak");
        $this->db->where("app_laporan.username",$username);
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahlaporanmenungguuser($username)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("validasi","Menunggu Validasi");
        $this->db->where("app_laporan.username",$username);
        $jumlah = $this->db->get('app_laporan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahkawasanuser($username)
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('app_kawasan')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahskwuser($username)
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('app_skw')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahresortuser($username)
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('app_resort')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function laporanjenisuser($username)
    {
        $this->db->select("COUNT(kategori) as jumlah, kategori");
        $this->db->where("app_laporan.username",$username);
        $this->db->group_by("kategori");
        return  $jumlah = $this->db->get('app_laporan');
    }

    function laporankawasanuser($username) 
    {
        $this->db->select("COUNT(app_laporan.id_kawasan)  as jumlah, app_kawasan.namakawasan")
        ->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner")
        ->group_by("app_laporan.id_kawasan");
        $this->db->where("app_laporan.username",$username);
        
        return $this->db->get('app_laporan');
    }


    

}
