<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
  public function index()
  {
    $data['title'] = 'Scan QR Code';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // $this->load->model('Data_model');

    // $data['karyawan'] = $this->Data_model->getKaryawan();

    // $this->form_validation->set_rules('id_karyawan', 'Kode', 'required');
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('scan/index', $data);
    $this->load->view('template/footer');

  }

  // function cek_id()
	// {
	// 	$user = $this->user;
	// 	$result_code = $this->input->post('id_karyawan');
	// 	$tgl = date('Y-m-d');
	// 	$jam_msk = date('h:i:s');
	// 	$jam_klr = date('h:i:s');
	// 	$cek_id = $this->Scan->cek_id($result_code);
	// 	$cek_kehadiran = $this->Scan->cek_kehadiran($result_code, $tgl);
	// 	if (!$cek_id) {
	// 		$this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'absen gagal data QR tidak ditemukan'));
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->jam_klr == '00:00:00' && $cek_kehadiran->id_status == 1) {
	// 		$data = array(
	// 			'jam_klr' => $jam_klr,
	// 			'id_status' => 2,
	// 		);
	// 		$this->Scan->absen_pulang($result_code, $data);
	// 		$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen pulang'));
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	} elseif ($cek_kehadiran && $cek_kehadiran->jam_msk != '00:00:00' && $cek_kehadiran->jam_klr != '00:00:00' && $cek_kehadiran->id_status == 2) {
	// 		$this->session->set_flashdata('messageAlert', $this->messageAlert('warning', 'sudah absen'));
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 		return false;
	// 	} else {
	// 		$data = array(
	// 			'id_karyawan' => $result_code,
	// 			'tgl' => $tgl,
	// 			'jam_msk' => $jam_msk,
	// 			'id_khd' => 1,
	// 			'id_status' => 1,
	// 		);
	// 		$this->Scan->absen_masuk($data);
	// 		$this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'absen masuk'));
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	}
	// }
}