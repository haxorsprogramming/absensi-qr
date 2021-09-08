<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Data Absensi';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Absensi_model');

    $data['gedung'] = $this->Absensi_model->getGedung();

    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('absensi/index', $data);
    $this->load->view('template/footer');
  }
  
   public function dataabsensi()
  {
    $data['title'] = 'Data Absensi';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Absensi_model');

    $data['absensi'] = $this->Absensi_model->getAbsensi();
    $data['karyawan'] = $this->Absensi_model->getKaryawan();
    $data['kehadiran'] = $this->Absensi_model->getKehadiran();
    $data['status'] = $this->Absensi_model->getStatus();

    // $this->form_validation->set_rules('id_karyawan', 'Kode', 'required');
    // $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
    // $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    // $this->form_validation->set_rules('shift', 'Shift', 'required');
    // $this->form_validation->set_rules('id_gedung', 'Gedung', 'required');

    // if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('absensi/dataabsensi', $data);
      $this->load->view('template/footer');
    // } else {
      // $data = [
      //   'id_karyawan' => $this->input->post('id_karyawan'),
      //   'nama_karyawan' => $this->input->post('nama_karyawan'),
      //   'jabatan' => $this->input->post('jabatan'),
      //   'shift' => $this->input->post('shift'),
      //   'id_gedung' => $this->input->post('id_gedung')
      // ];
      // $this->db->insert('karyawan', $data);
      // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan berhasil ditambahkan</div>');
      // redirect('absensi');
    // }
  }
}