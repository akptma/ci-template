<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AclController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    forbidden();
    $this->load->model('Acl_model', 'acl_m');
    $this->load->model('Users_model', 'usr_m');
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
      'title' => 'Access Control List',
      'users' => $this->usr_m->index()['list_users'],
      'acl'   => user_control()['acl'][0],
    ];
    $this->_header();
    $this->load->view('backend/acl/index', $data);
    $this->_footer();
  }

  public function store($id_user)
  {
    $status = $this->acl_m->sync_akses($id_user);
    $this->session->set_flashdata('msg', $status);
    redirect('acl');
  }

  public function update($id_user)
  {
    $post   = $this->input->post();
    $status = $this->acl_m->update($id_user, $post);
    $this->session->set_flashdata('msg', $status);
    redirect('acl');
  }

  public function show($id_user)
  {
    $data = [
      'user'  => $this->usr_m->show(decode($id_user)),
      'akses' => $this->acl_m->index($id_user)
    ];
    $this->load->view('backend/acl/show', $data);
  }

  public function duplicate_sync()
  {
    $data = ['users' => $this->acl_m->data_sync()];
    $this->load->view('backend/acl/data-user-duplicate', $data);
  }

  public function duplicate_store($id_user, $user_id_duplicate)
  {
    $status = $this->acl_m->sync_store($id_user, $user_id_duplicate);
    $this->session->set_flashdata('msg', $status);
    redirect('acl');
  }
}


/* End of file AclController.php */
/* Location: ./application/controllers/AclController.php */