<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RolesController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    forbidden();
    $this->load->model('Roles_model', 'role_m');
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
      'title' => 'List Data Roles',
      'roles' => $this->role_m->index(),
      'acl'   => user_control()['acl'][0],
    ];
    $this->load->view('backend/roles/index', $data);
    $this->_footer();
  }

  public function create()
  {
    $this->_header();
    $this->load->view('backend/roles/create');
    $this->_footer();
  }

  public function store()
  {
    $post = $this->input->post();

    $this->form_validation->set_rules('nama_role', 'Nama Role', 'required|min_length[5]|is_unique[roles.nama_role]');
    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $status = $this->role_m->insert($post);
      $this->session->set_flashdata('msg', $status);
      redirect('role');
    }
  }

  public function show($id_role)
  {
    $data = [
      'header' => $this->role_m->show($id_role, 2)['role'],
      'body'   => $this->role_m->show($id_role, 2)['users'],
    ];
    $this->load->view('backend/roles/show', $data);
  }

  public function edit($id_role)
  {
    $this->_header();
    $data = ['role' => $this->role_m->show($id_role, 1)];
    $this->load->view('backend/roles/edit', $data);
    $this->_footer();
  }

  public function update($id_role)
  {
    $post   = $this->input->post();
    $status = $this->role_m->update($id_role, $post);
    $this->session->set_flashdata('msg', $status);
    redirect('role');
  }
}


/* End of file RolesController.php */
/* Location: ./application/controllers/RolesController.php */