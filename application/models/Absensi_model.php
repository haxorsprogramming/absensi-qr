<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {
  public function getAbsensi()
  {
    $query = "SELECT `presensi`.*, `karyawan`.`nama_karyawan`
                FROM `presensi` JOIN `karyawan`
                  ON `presensi`.`id_karyawan` = `karyawan`.`id`
            ";
    return $this->db->query($query)->result_array();
  }

  public function getGedung()
  {
    return $this->db->get('gedung')->result_array();
  }

  public function getKaryawan()
  {
    return $this->db->get('karyawan')->result_array();
  }

  public function getKehadiran()
  {
    return $this->db->get('kehadiran')->result_array();
  }

  public function getStatus()
  {
    return $this->db->get('status')->result_array();
  }
}