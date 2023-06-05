<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_izinTsl extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function lihatdatasatu($id)
    {
        $this->db->select("A.*, 
        CASE A.jenis  
            WHEN 'penangkar' THEN (SELECT B.pemilik FROM app_penangkar B WHERE B.id = A.id_reff) 
            WHEN 'pengedar' THEN (SELECT C.pemilik FROM app_pengedar C WHERE C.id = A.id_reff) 
            WHEN 'lembaga konservasi' THEN (SELECT D.pemilik FROM app_lemkon D WHERE D.id = A.id_reff) 
        END AS pemilik");
        $this->db->from('app_izin_tsl A');
        $this->db->where("app_izin_tsl.id", $id);
        return $this->db->get('app_izin_tsl');
    }


    function lihatdata()
    {
        $this->db->select("A.*, 
        CASE A.jenis  
            WHEN 'penangkar' THEN (SELECT B.pemilik FROM app_penangkar B WHERE B.id = A.id_reff) 
            WHEN 'pengedar' THEN (SELECT C.pemilik FROM app_pengedar C WHERE C.id = A.id_reff) 
            WHEN 'lembaga konservasi' THEN (SELECT D.pemilik FROM app_lemkon D WHERE D.id = A.id_reff) 
        END AS pemilik");
        $this->db->from('app_izin_tsl A');
        $this->db->order_by('A.id', 'asc');
        return $this->db->get();
    }


    function cekdata($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('app_izin_tsl')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('app_izin_tsl', $array);
    }

    function editdata($id, $array)
    {
        $this->db->where("id", $id);
        return $this->db->update('app_izin_tsl', $array);
    }
    function hapus($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete('app_izin_tsl');
    }


    function lihatdatafilter($jenis = 'null',$id_reff = 'null')
    {
        $this->db->select("A.*, 
        CASE A.jenis  
            WHEN 'penangkar' THEN (SELECT B.pemilik FROM app_penangkar B WHERE B.id = A.id_reff) 
            WHEN 'pengedar' THEN (SELECT C.pemilik FROM app_pengedar C WHERE C.id = A.id_reff) 
            WHEN 'lembaga konservasi' THEN (SELECT D.pemilik FROM app_lemkon D WHERE D.id = A.id_reff) 
        END AS pemilik");
        $this->db->from('app_izin_tsl A');
        $this->db->where("app_izin_tsl.jenis = IFNULL(".$jenis.",app_izin_tsl.jenis)");
        $this->db->where("app_izin_tsl.id_reff = IFNULL(".$id_reff.",app_izin_tsl.id_reff)");
        return $this->db->get('app_izin_tsl');
    }
}
