<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
  public function index()
  {
    
    $data['title'] = 'Data Karyawan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Data_model');

    $data['karyawan'] = $this->Data_model->getKaryawan();
    $data['gedung'] = $this->Data_model->getGedung();

    $this->form_validation->set_rules('id_karyawan', 'Kode', 'required');
    $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    $this->form_validation->set_rules('shift', 'Shift', 'required');
    $this->form_validation->set_rules('id_gedung', 'Gedung', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('data/index', $data);
      $this->load->view('template/footer');
    } else {
      $data = [
        'id_karyawan' => $this->input->post('id_karyawan'),
        'nama_karyawan' => $this->input->post('nama_karyawan'),
        'jabatan' => $this->input->post('jabatan'),
        'shift' => $this->input->post('shift'),
        'id_gedung' => $this->input->post('id_gedung')
      ];
      $this->db->insert('karyawan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan berhasil ditambahkan</div>');
      redirect('data');
    }

  }

  public function hapus($id)
  {
    $this->load->model('Data_model');

    $this->Data_model->hapusDataKaryawan($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan berhasil dihapus</div>');
    redirect('data');
  }

  public function gedung()
  {
    
    $data['title'] = 'Data Gedung';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Data_model');

    $data['gedung'] = $this->Data_model->getGedung();
    
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('data/gedung', $data);
    $this->load->view('template/footer');

  }

  public function ubah($id)
  {
    $data['title'] = 'Form Edit Data Karyawan';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Data_model');

    $data['jabatan'] = ['Manajer', 'Staf', 'Karyawan'];
    $data['shift'] = ['Shift 1', 'Shift 2', 'Shift 3'];
    $data['gedung'] = $this->Data_model->getGedung();
    
    
    $data['karyawan'] = $this->Data_model->getKaryawanById($id);

    $this->form_validation->set_rules('id_karyawan', 'Kode', 'required');
    $this->form_validation->set_rules('nama_karyawan', 'Nama', 'required');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    $this->form_validation->set_rules('shift', 'Shift', 'required');
    $this->form_validation->set_rules('id_gedung', 'Gedung', 'required');

    if( $this->form_validation->run() == FALSE) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('data/ubah', $data);
      $this->load->view('template/footer');
      } else {
        $this->Data_model->ubahDataKaryawan();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data karyawan berhasil diubah</div>');
        redirect('data');
      }
  }








//   public function tambah()
//     {
//         $this->_rules();
//         if ($this->form_validation->run() == FALSE) {
//             $this->create();
//         } else {
//             $kode = $this->Jabatan_model->get_by_id($this->input->post('jabatan'));
//             $kodejbt = $kode->nama_jabatan;
//             $kodeagt = substr($kodejbt, 0, 1);
//             $tgl = date('ym');
//             $var = $this->Karyawan_model->get_max();
//             $getvar = $var[0]->kode;
//             $nilai = $this->formatNbr($var[0]->kode); 
//             $nourut = $kodeagt . $tgl . $nilai;
//             $data = array(
//                 'nama_karyawan' => ucwords($this->input->post('nama_karyawan', TRUE)),
//                 'id_karyawan' => $nourut,
//                 'jabatan' => $this->input->post('jabatan', TRUE),
//                 'id_shift' => $this->input->post('id_shift', TRUE),
//                 'gedung_id' => $this->input->post('gedung_id', TRUE),
//             );
//             $this->Karyawan_model->insert($data);
//             $this->session->set_flashdata('messageAlert', $this->messageAlert('success', 'Berhasil menambahkan karyawan'));
//             redirect(site_url('karyawan'));
//         }
//     }
}