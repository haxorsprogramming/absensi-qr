<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
  public function index()
  {
    $data['title'] = 'Buat QR Code';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // $this->load->model('Data_model');

    // $data['karyawan'] = $this->Data_model->getKaryawan();

    // $this->form_validation->set_rules('id_karyawan', 'Kode', 'required');
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('qrcode/index', $data);
    $this->load->view('template/footer');

  } 

  // public function showw()
	// {
	// 	$this->load->library('ciqrcode');
	// 	$id = $this->input->post('id');
	// 	$this->load->model('GenBar_model');
	// 	$car = $this->GenBar_model->getShow_query($id);
	// 	if ($car->num_rows() > 0) {
	// 		foreach ($car->result() as $row) {
	// 			$shows = array(
	// 				'id_karyawan' => $row->id_karyawan,
	// 				'nama_karyawan' => $row->nama_karyawan,
	// 				'nama_jabatan' => $row->nama_jabatan,
	// 				'nama_shift' => $row->nama_shift,
	// 				'nama_gedung' => $row->nama_gedung
	// 			);
	// 			$this->load->view('ambilqr/v_scan', $shows);
	// 		}
	// 	} else {
	// 		$this->load->view('ambilqr/v_scan_kosong');
	// 	}
	// }

  // function get_autocomplete()
	// {
	// 	if (isset($_GET['term'])) {
	// 		$result = $this->GenBar_model->search_value($_GET['term']);
	// 		if (count($result) > 0) {
	// 			foreach ($result as $row)
	// 				$arr_result[] = array(
	// 					'label'			=> $row->nama_karyawan,
	// 				);
	// 			echo json_encode($arr_result);
	// 		}
	// 	}
	// }
}