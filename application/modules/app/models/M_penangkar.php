<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_penangkar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    // function lihatdatasatu($id)
    // {
    //     $this->db->select("app_penangkar.*");
    //     $this->db->where("app_penangkar.id",$id);
    //     return $this->db->get('app_penangkar');
    // }

    function lihatdatasatu($id)
    {
        $this->db->query("SET SESSION group_concat_max_len = 1000000");
        $this->db->select('a.*, (SELECT CONCAT(\'[\', GROUP_CONCAT(CONCAT(
            \'{\"satwa\":\"\', REPLACE(b.satwa, \'\\"\', \'\\\\\\\"\'), \'\\",\',
            \'"id_detail\":\"\', REPLACE(b.id, \'\\"\', \'\\\\\\\"\'), \'\\",\',
            \'"jumlah\":\"\', REPLACE(b.jumlah, \'\\"\', \'\\\\\\\"\'), \'"}\'
        )
        ORDER BY b.id ASC
        SEPARATOR \',\'
        ), \']\')
        FROM app_penangkar_detail b WHERE b.id_header = a.id ) as detail', FALSE);
        $this->db->from('app_penangkar a');
        $this->db->where('a.id', $id);
        return $this->db->get();
    }

   

    function lihatdata()
    {
        $this->db->select("app_penangkar.*");
        $this->db->order_by('id', 'desc');
        return $this->db->get('app_penangkar');
    }
    function getdataPemilik()
    {
        $this->db->select("app_penangkar.pemilik, app_penangkar.id ");
        $this->db->order_by('id', 'asc');
        $this->db->where('app_penangkar.pemilik != ""');
        return $this->db->get('app_penangkar');
    }
    function cekdata($id)
    {
        $this->db->where("id",$id);
        return $this->db->get('app_penangkar')->num_rows();
    }

    // function tambahdata($array)
    // {
    //     return $this->db->insert('app_penangkar',$array);
    // }
    function tambahdata($array, $arrayDetail)
    {
        $this->db->trans_start();

        try {
            $this->db->insert('app_penangkar', $array);
            $id_header = $this->db->insert_id();
            foreach ($arrayDetail as $detail) {
                $detail = array_merge((array) $detail, array(
                    "id_header" => $id_header
                ));
                $this->db->insert('app_penangkar_detail', $detail);
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
    // function editdata($id,$array)
    // {
    //     $this->db->where("id",$id);
    //     return $this->db->update('app_penangkar',$array);
    // }

    function editdata($id, $array, $arrayDetail, $arrayDeleted)
    {
        $this->db->trans_start();
        try {
            $this->db->where("id", $id);
            $this->db->update('app_penangkar', $array);

            foreach ($arrayDetail as $data) {
                $id_detail = $data['id_detail'];
                if ($id_detail != null){
                    $newData = array(
                        "satwa" => $data['satwa'],
                        "jumlah" => $data['jumlah']
                    );
                    $this->db->where("id", $id_detail);
                    $this->db->update('app_penangkar_detail', $newData);
                }else{
                    $newData = array(
                        "id_header" => $id,
                        "satwa" => $data['satwa'],    
                        "jumlah" => $data['jumlah']
                    );
                    $this->db->insert('app_penangkar_detail', $newData);
                }
            }

            if (count($arrayDeleted) > 0) {
                foreach ($arrayDeleted as $data2) {
                    $this->db->where("id", $data2);
                    $this->db->delete('app_penangkar_detail');
                }
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                return array('status' => false, 'message' => 'Terjadi kesalahan saat menambahkan data.');
            } else {
                return array('status' => true, 'message' => 'Data berhasil ditambahkan.');
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return array('status' => false, 'message' => 'Terjadi kesalahan saat memperbarui data. ' . $e->getMessage());
        }
    }
    // function hapus($id)
    // {
    //     $this->db->where("id",$id);
    //     return $this->db->delete('app_penangkar');
    // }
    function hapus($id)
    {

        $this->db->trans_start();

        try {
            $this->db->where("id", $id);
            $this->db->delete('app_penangkar');
            $this->db->where("id_header", $id);
            $this->db->delete('app_penangkar_detail');
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
  
}
