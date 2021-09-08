<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('template/footer');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil ditambahkan</div>');
      redirect('menu');
    }
    
    
  }

  public function subMenu() 
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_model', 'menu');

    $data['subMenu'] = $this->menu->getSubMenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('template/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil ditambahkan</div>');
      redirect('menu/submenu');
    }
  }

  public function hapusmenu($id)
  {
    $this->load->model('Menu_model');

    $this->Menu_model->hapusMenu($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus</div>');
    redirect('menu');
  }

  public function hapussub($id)
  {
    $this->load->model('Menu_model');

    $this->Menu_model->hapusSubMenu($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil dihapus</div>');
    redirect('menu/submenu');
  }
  

  public function ubahmenu($id)
  {
    $data['title'] = 'Form Edit Menu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_model');
    
    
    $data['menu'] = $this->Menu_model->getMenuById($id);

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if( $this->form_validation->run() == FALSE) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('menu/ubahmenu', $data);
      $this->load->view('template/footer');
      } else {
        $this->Menu_model->ubahDataMEnu();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diubah</div>');
        redirect('menu');
      }
  }

  public function ubahsubmenu($id)
  {
    $data['title'] = 'Form Edit Submenu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Menu_model');
    
    
    $data['submenu'] = $this->Menu_model->getSubMenuById($id);
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');
    $this->form_validation->set_rules('is_active', 'Active', 'required');

    if( $this->form_validation->run() == FALSE) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('menu/ubahsubmenu', $data);
      $this->load->view('template/footer');
      } else {
        $this->Menu_model->ubahDataSubMenu();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu berhasil diubah</div>');
        redirect('menu/submenu');
      }
  }

  

}