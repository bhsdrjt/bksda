<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_lemkon extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function lihatdatasatu($id)
    {
        $this->db->select('a.*, (SELECT CONCAT(\'[\', GROUP_CONCAT(CONCAT(
            \'{\"satwa\":\"\', REPLACE(b.satwa, \'\\"\', \'\\\\\\\"\'), \'\\",\',
            \'"tahun\":\"\', REPLACE(b.tahun, \'\\"\', \'\\\\\\\"\'), \'\\",\',
            \'"jantan\":\"\', IFNULL(REPLACE(b.jantan, \'\\"\', \'\\\\\\\"\'), \'0\'), \'\\",\',
            \'"betina\":\"\', IFNULL(REPLACE(b.betina, \'\\"\', \'\\\\\\\"\'), \'0\'), \'\\",\',
            \'"tidaktahu\":\"\', IFNULL(REPLACE(b.tidaktahu, \'\\"\', \'\\\\\\\"\'), \'0\'), \'\\",\',
            \'"id_detail\":\"\', REPLACE(b.id, \'\\"\', \'\\\\\\\"\'), \'\\",\',
            \'"jumlah\":\"\', REPLACE(b.jumlah, \'\\"\', \'\\\\\\\"\'), \'"}\'
        )
        ORDER BY b.id ASC
        SEPARATOR \',\'
        ), \']\')
        FROM app_lemkon_detail b WHERE b.id_lembaga = a.id) as detail', FALSE);
        $this->db->from('app_lemkon a');

        $this->db->where('a.id', $id);
        return $this->db->get();
    }

    function getdataPemilik()
    {
        $this->db->select("app_lemkon.pemilik, app_lemkon.id ");
        $this->db->order_by('id', 'asc');
        $this->db->where('app_lemkon.pemilik != ""');
        return $this->db->get('app_lemkon');
    }

    function lihatdata()
    {
        $this->db->select("app_lemkon.*");
        $this->db->order_by('id', 'desc');
        return $this->db->get('app_lemkon');
    }


    function cekdata($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('app_lemkon')->num_rows();
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


    function editdata($id, $array, $arrayDetail, $arrayDeleted)
    {
        $this->db->trans_start();

        try {
            $this->db->where("id", $id);
            $this->db->update('app_lemkon', $array);

            foreach ($arrayDetail as $data) {
                $id_detail = $data['id_detail'];
                if ($id_detail != null) {
                    $newData = array(
                        "satwa" => $data['satwa'],
                        "tahun" => $data['tahun'],
                        "jumlah" => $data['jumlah'],
                        "jantan" => $data['jantan'],
                        "betina" => $data['betina'],
                        "tidaktahu" => $data['tidaktahu']
                    );
                    $this->db->where("id", $id_detail);
                    $this->db->update('app_lemkon_detail', $newData);
                } else {
                    $newData = array(
                        "id_lembaga" => $id,
                        "satwa" => $data['satwa'],
                        "tahun" => $data['tahun'],
                        "jumlah" => $data['jumlah'],
                        "jantan" => $data['jantan'],
                        "betina" => $data['betina'],
                        "tidaktahu" => $data['tidaktahu']
                    );
                    $this->db->insert('app_lemkon_detail', $newData);
                }
            }

            if (count($arrayDeleted) > 0) {
                foreach ($arrayDeleted as $data2) {
                    $this->db->where("id", $data2);
                    $this->db->delete('app_lemkon_detail');
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

    function hapus($id)
    {

        $this->db->trans_start();

        try {
            $this->db->where("id", $id);
            $this->db->delete('app_lemkon');
            $this->db->where("id_lembaga", $id);
            $this->db->delete('app_lemkon_detail');
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
