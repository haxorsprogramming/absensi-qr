<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
  public function hitungJumlahKaryawan()
  {
    $query = $this->db->get('karyawan');
    if($query->num_rows() > 0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }
}