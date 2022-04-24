<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    forbidden();
    $this->load->model('Menu_model', 'menu_m');
  }

  private function _header()
  {
    $this->load->view('layouts/backend/header');
  }

  private function _footer()
  {
    $this->load->view('layouts/backend/footer');
  }

  public function index()
  {
    $data = [
      'title' => 'List Menu',
      'menu'  => $this->menu_m->index(),
      'acl'   => user_control()['acl'][0],
    ];
    $this->_header();
    $this->load->view('backend/menu/index', $data);
    $this->_footer();
  }

  public function create()
  {
    $this->_header();
    $this->load->view('backend/menu/create');
    $this->_footer();
  }

  public function store()
  {
    $post   = $this->input->post();

    $this->form_validation->set_rules('title_menu', 'Menu', 'required|min_length[5]|is_unique[menu.title_menu]');
    $this->form_validation->set_rules('icons', 'icons', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $status = $this->menu_m->store($post);
      $this->session->set_flashdata('msg', $status);
      redirect('menu');
    }
  }

  public function show($id_menu)
  {
    $data = [
      'header' => $this->menu_m->show($id_menu)['header'],
      'body'   => $this->menu_m->show($id_menu)['body']
    ];
    $this->load->view('backend/menu/show', $data);
  }

  public function edit($id_menu)
  {
    $data = ['menu' => $this->menu_m->show($id_menu)['header']];
    $this->_header();
    $this->load->view('backend/menu/edit', $data);
    $this->_footer();
  }

  public function update($id_menu)
  {
    $post   = $this->input->post();

    $this->form_validation->set_rules('title_menu', 'Menu', 'required|min_length[5]');
    $this->form_validation->set_rules('icons', 'icons', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->edit($id_menu);
    } else {
      $status = $this->menu_m->update($id_menu, $post);
      $this->session->set_flashdata('msg', $status);
      redirect('menu');
    }
  }
}


/* End of file MenuController.php */
/* Location: ./application/controllers/MenuController.php */