<?php
defined('BASEPATH') or exit('No direct script access allowed');


class MenuConfController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    forbidden();
    $this->load->model('Menu_model');
    $this->load->model('Submenu_model');
    $this->load->model('MenuConf_model', 'menu_m');
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
    $this->_header();
    $data = [
      'title'     => 'Menu-Config',
      'acl'       => user_control()['acl'][0],
      'menu'      => $this->Menu_model->index(),
      'submenu'   => $this->Submenu_model->index(),
    ];
    $this->load->view('backend/config-menu/index', $data);
    $this->_footer();
  }

  public function update()
  {
    $post = $this->input->post();
    $status = $this->menu_m->update_menu($post);
    $this->session->set_flashdata('msg', 'true_update');
    redirect('menu-config');
  }
}


/* End of file MenuConfController.php */
/* Location: ./application/controllers/MenuConfController.php */