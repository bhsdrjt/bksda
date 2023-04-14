<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dokumen extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_dokumen)
    {
        $this->db->select("app_dokumen.*");
        $this->db->where("app_dokumen.id_dokumen",$id_dokumen);
        return $this->db->get('app_dokumen');
    }

    function lihatdatadokumen($id_kawasan)
    {
        $this->db->select("app_dokumen.*");
        $this->db->where("app_dokumen.id_kawasan",$id_kawasan);
        return $this->db->get('app_dokumen');
    }


    function lihatdata()
    {
        $this->db->select("app_dokumen.*");
        return $this->db->get('app_dokumen');
    }
    function cekdata($id_dokumen)
    {
        $this->db->where("id_dokumen",$id_dokumen);
        return $this->db->get('app_dokumen')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_dokumen',$array);
    }

    function editdata($id_dokumen,$array)
    {
        $this->db->where("id_dokumen",$id_dokumen);
        return $this->db->update('app_dokumen',$array);
    }
    function hapus($id_dokumen)
    {
        $this->db->where("id_dokumen",$id_dokumen);
        return $this->db->delete('app_dokumen');
    }
  
}
