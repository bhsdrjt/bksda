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


    function lihatdatafilter($jenis = null, $id_reff = null)
    {
        $this->db->select("A.*, 
            CASE A.jenis  
            WHEN 'penangkar' THEN (SELECT B.pemilik FROM app_penangkar B WHERE B.id = A.id_reff) 
            WHEN 'pengedar' THEN (SELECT C.pemilik FROM app_pengedar C WHERE C.id = A.id_reff) 
            WHEN 'lembaga konservasi' THEN (SELECT D.pemilik FROM app_lemkon D WHERE D.id = A.id_reff) 
            END AS pemilik");
        $this->db->from('app_izin_tsl A');

        if ($jenis) {
            $this->db->where('A.jenis', $jenis);
        }

        if ($id_reff) {
            $this->db->where('A.id_reff', $id_reff);
        }
        $query = $this->db->get();

        return $query;
    }





    function lihatdatafilterExport($jenis = 'null', $id_reff = 'null')
    {
        if ($jenis == 'penangkar') {
            $this->db->select('A.*, B.pemilik , B.nosk, B.alamat , B.tglawal_berlaku, B.tglakhir_berlaku,
                (SELECT CONCAT(\'[\', GROUP_CONCAT(CONCAT(
                \'{\"satwa\":\"\', REPLACE(C.satwa, \'\\"\', \'\\\\\\\"\'), \'\\",\',
                \'\"jumlah\":\"\', REPLACE(C.jumlah, \'\\"\', \'\\\\\\\"\'), \'\"}\' )
            ORDER BY C.id ASC SEPARATOR \',\'), \']\')
            FROM app_penangkar_detail C WHERE C.id_header = B.id) as detail', FALSE);
            $this->db->from('app_izin_tsl A');
            $this->db->where('A.jenis', 'penangkar');
            if ($id_reff) {
                $this->db->where('A.id_reff', $id_reff);
            }
            $this->db->join('app_penangkar B', 'B.id = A.id_reff');
            return $this->db->get();
        } else if ($jenis == 'pengedar') {
            $this->db->select('A.*, B.pemilik , B.nosk, B.alamat , B.tglawal_berlaku, B.tglakhir_berlaku, B.jenis_komoditi, B.tentang_sk', FALSE);
            $this->db->from('app_izin_tsl A');
            $this->db->where('A.jenis', 'pengedar');
            if ($id_reff) {
                $this->db->where('A.id_reff', $id_reff);
            }
            $this->db->join('app_pengedar B', 'B.id = A.id_reff');
            return $this->db->get();
        } else if ($jenis == 'lembaga konservasi') {
            $this->db->select('A.*, B.pemilik , B.nosk, B.alamat , B.tglawal_berlaku, B.tglakhir_berlaku,  (SELECT CONCAT(\'[\', GROUP_CONCAT(CONCAT(
                \'{\"satwa\":\"\', REPLACE(C.satwa, \'\\"\', \'\\\\\\\"\'), \'\\",\',
                \'\"tahun\":\"\', REPLACE(C.tahun, \'\\"\', \'\\\\\\\"\'), \'\\",\',
                \'\"jumlah\":\"\', REPLACE(C.jumlah, \'\\"\', \'\\\\\\\"\'), \'\"}\')
            ORDER BY C.id ASC SEPARATOR \',\'), \']\')
            FROM app_lemkon_detail C WHERE C.id_lembaga = B.id) as detail', FALSE);
            $this->db->from('app_izin_tsl A');
            $this->db->where('A.jenis', 'lembaga konservasi');
            if ($id_reff) {
                $this->db->where('A.id_reff', $id_reff);
            }
            $this->db->join('app_lemkon B', 'B.id = A.id_reff');
            return $this->db->get();
        } else {
            $this->db->select("A.*, 
                CASE A.jenis  
                WHEN 'penangkar' THEN (SELECT B.pemilik FROM app_penangkar B WHERE B.id = A.id_reff) 
                WHEN 'pengedar' THEN (SELECT C.pemilik FROM app_pengedar C WHERE C.id = A.id_reff) 
                WHEN 'lembaga konservasi' THEN (SELECT D.pemilik FROM app_lemkon D WHERE D.id = A.id_reff) 
                END AS pemilik");
            $this->db->from('app_izin_tsl A');
            $this->db->join('app_penangkar B', 'B.id = A.id_reff', 'left');
            $this->db->join('app_pengedar C', 'C.id = A.id_reff', 'left');
            $this->db->join('app_lemkon D', 'D.id = A.id_reff', 'left');
            return $this->db->get();
        }
    }
}
