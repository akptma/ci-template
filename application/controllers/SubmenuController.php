<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubmenuController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Submenu_model', 'sub_m');
  }

  private function _header()
  {
    $this->load->view('layouts/backend/header');
  }
  private function _footer()
  {
    $this->load->view('layouts/backend/footer');
  }

  public function index($kode_menu)
  {
    $data = [
      'kode_menu' => $kode_menu,
      'title'     => 'List Submenu',
      'submenu'   => $this->sub_m->index($kode_menu),
    ];
    $this->load->view('backend/submenu/index', $data);
  }

  public function create($kode_menu)
  {
    $this->_header();
    $data = ['kode_menu' => $kode_menu];
    $this->load->view('backend/submenu/create', $data);
    $this->_footer();
  }

  public function store($kode_menu)
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]|is_unique[menu.nama_menu]');
    $this->form_validation->set_rules('routes', 'Routes', 'required|min_length[3]|is_unique[menu.routes]');

    if ($this->form_validation->run() == FALSE) {
      $this->create($kode_menu);
    } else {
      $status = $this->sub_m->store($kode_menu, $post);
      $this->session->flashdata('msg', $status);
      redirect('menu');
    }
  }

  public function show($id_menu)
  {
    $data = ['header' => $this->sub_m->show($id_menu)];
    $this->load->view('backend/submenu/show', $data);
  }

  public function edit($id_menu)
  {
    $data = ['submenu' => $this->sub_m->show($id_menu)];
    $this->_header();
    $this->load->view('backend/submenu/edit', $data);
    $this->_footer();
  }

  public function update($id_menu)
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]');
    $this->form_validation->set_rules('routes', 'Routes', 'required|min_length[3]');

    if ($this->form_validation->run() == FALSE) {
      $this->edit($id_menu);
    } else {
      $status = $this->sub_m->update($id_menu, $post);
      $this->session->flashdata('msg', $status);
      redirect('menu');
    }
  }
}


/* End of file SubmenuController.php */
/* Location: ./application/controllers/SubmenuController.php */