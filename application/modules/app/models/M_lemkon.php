<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_lemkon extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function lihatdatasatu($id)
    {
        $this->db->select("app_penangkar.*");
        $this->db->where("app_penangkar.id", $id);
        return $this->db->get('app_penangkar');
    }



    function lihatdata()
    {
        $this->db->select("app_lemkon.*");
        $this->db->order_by('id', 'DESC');
        return $this->db->get('app_lemkon');
    }


    function cekdata($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('app_penangkar')->num_rows();
    }

    function tambahdata($array, $arrayDetail)
    {
        $this->db->trans_start();

        try {
            $this->db->insert('app_lemkon', $array);
            $id_lembaga = $this->db->insert_id();
            foreach ($arrayDetail as $detail) {
                $detail = array_merge((array) $detail, array(
                    "id_lembaga" => $id_lembaga
                ));

                $this->db->insert('app_lemkon_detail', $detail);
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                return array('status' => false, 'message' => 'Terjadi kesalahan saat menambahkan data.');
            } else {
                return array('status' => true, 'message' => 'Data berhasil ditambahkan.');
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Terjadi kesalahan saat menambahkan data. ' . $e->getMessage());
        }
    }


    function editdata($id, $array)
    {
        $this->db->where("id", $id);
        return $this->db->update('app_penangkar', $array);
    }
    function hapus($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete('app_penangkar');
    }
}
