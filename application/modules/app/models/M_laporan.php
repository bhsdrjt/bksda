<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_laporan)
    {
        $this->db->select("app_laporan.*, app_kawasan.namakawasan")
        ->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner");
        $this->db->where("app_laporan.id_laporan",$id_laporan);
        return $this->db->get('app_laporan');
    }


    function lihatdata()
    {
        $this->db->select("app_laporan.*, app_kawasan.namakawasan")
        ->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner")
        ->order_by("app_laporan.waktu","desc");
        
        return $this->db->get('app_laporan');
    }
    function lihatdatafilter($kategori = 'null',$validasi = 'null',$id_kawasan = 'null')
    {
        $this->db->select("app_laporan.*, app_kawasan.namakawasan")
        ->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner")
        ->order_by("app_laporan.waktu","desc");
        $this->db->where("app_laporan.kategori = IFNULL(".$kategori.",app_laporan.kategori)");
        $this->db->where("app_laporan.id_kawasan = IFNULL(".$id_kawasan.",app_laporan.id_kawasan)");
        $this->db->where("app_laporan.validasi = IFNULL(".$validasi.",app_laporan.validasi)");
        return $this->db->get('app_laporan');
    }
    function lihatdatakategori($kategori,$validasi,$id_kawasan)
    {
        $this->db->select("app_laporan.*, app_kawasan.namakawasan")
        ->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner")
        ->order_by("app_laporan.waktu","desc");
        $this->db->where("app_laporan.kategori",$kategori);
        $this->db->where("app_laporan.validasi",$validasi);
        $this->db->where("app_laporan.id_kawasan",$id_kawasan);
        return $this->db->get('app_laporan');
    }
    function lihatdata2()
    {
        $this->db->select("app_laporan.*, app_kawasan.namakawasan");
        $this->db->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner");
        $this->db->where("app_laporan.kategori = IFNULL(null,app_laporan.kategori)");
        $this->db->order_by("app_laporan.waktu","desc");
      
        return $this->db->get('app_laporan');
    }

    function lihatdatauser($username)
    {
        $this->db->select("app_laporan.*, app_kawasan.namakawasan")
        ->join("app_kawasan","app_kawasan.id_kawasan=app_laporan.id_kawasan","inner")
        ->order_by("app_laporan.waktu","desc");
        $this->db->where("app_laporan.username",$username);
        return $this->db->get('app_laporan');
    }
    function cekdata($id_laporan)
    {
        $this->db->where("id_laporan",$id_laporan);
        return $this->db->get('app_laporan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_laporan',$array);
    }

    function editdata($id_laporan,$array)
    {
        $this->db->where("id_laporan",$id_laporan);
        return $this->db->update('app_laporan',$array);
    }
    function hapus($id_laporan)
    {
        $this->db->where("id_laporan",$id_laporan);
        return $this->db->delete('app_laporan');
    }
  
}
