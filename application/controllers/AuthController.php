<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AuthController extends CI_Controller
{



  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model', 'auth_m');
  }

  public function index()
  {
    is_login();
    $this->load->view('backend/auth/index');
  }

  public function login()
  {
    $post = $this->input->post();
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
    if ($this->form_validation->run() == FALSE) {
      redirect('auth');
    } else {
      $status = $this->auth_m->login($post);
      if ($status == 'false_email' ||  $status === 'false_pwd') {
        $this->session->set_flashdata('msg', $status);
        redirect('auth');
      }
    }
  }
}


/* End of file AuthController.php */
/* Location: ./application/controllers/AuthController.php */