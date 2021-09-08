<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {
  public function getKaryawan()
  {
    $query = "SELECT `karyawan`.*, `gedung`.`nama_gedung`
                FROM `karyawan` JOIN `gedung`
                  ON `karyawan`.`id_gedung` = `gedung`.`id`
            ";
    return $this->db->query($query)->result_array();
  }

  public function getGedung()
  {
    return $this->db->get('gedung')->result_array();
  }


  public function hapusDataKaryawan($id)
  {
    // $this->db->where('id', $id);
    $this->db->delete('karyawan', ['id' => $id]);
  }

  public function getKaryawanById($id)
  {
    return $this->db->get_where('karyawan', ['id' => $id])->row_array();
  }

  public function ubahDataKaryawan()
  {
    $data = [
    "id_karyawan" => $this->input->post("id_karyawan", true),
    "nama_karyawan" => $this->input->post("nama_karyawan", true),
    "jabatan" => $this->input->post("jabatan", true),
    "shift" => $this->input->post("shift", true),
    "id_gedung" => $this->input->post("id_gedung", true),
    ];

    $this->db->where('id',$this->input->post('id'));
    $this->db->update('karyawan', $data);

  }

}