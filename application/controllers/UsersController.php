<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    forbidden(); // unutk mengecek apakah user sudah login atau belum, jika belum arahkan kehalaman login
    // checked_url_typing(); // untuk mengecek jika user user mengetikan url routes yang aksesnya tidak diizinika di acl , maka redirect kelaman login
    $this->load->model('Roles_model', 'roles_m');
    $this->load->model('Users_model', 'users_m');
  }



  private function _header()
  {
    return $this->load->view('layouts/backend/header');
  }

  private function _footer()
  {

    return $this->load->view('layouts/backend/footer');
  }

  public function index()
  {
    $this->_header();
    $data = [
      'list_users' => $this->users_m->index()['list_users'],
      'acl'        => user_control()['acl'][0],
    ];
    $this->load->view('backend/users/index', $data);
    $this->_footer();
  }

  public function create()
  {
    $this->_header();
    $data = [
      'roles'      => $this->roles_m->index(),
      'user_count' => $this->users_m->index()['count'],
    ];
    $this->load->view('backend/users/create', $data);
    $this->_footer();
  }

  public function store()
  {
    $post = $this->input->post();

    $this->form_validation->set_rules('username', 'Username', 'min_length[3]|is_unique[users.username]');
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $status = $this->users_m->insert($post);
      $this->session->set_flashdata('msg', $status);
      redirect('user');
    }
  }

  public function show($id_user)
  {
    $data = ['user' => $this->users_m->show($id_user)];
    $this->load->view('backend/users/show', $data);
  }

  public function edit($id_user)
  {
    $id_user = decode($id_user);
    $data = [
      'roles' => $this->roles_m->index(),
      'user'  => $this->users_m->show($id_user)
    ];
    $this->_header();
    $this->load->view('backend/users/edit', $data);
    $this->_footer();
  }

  public function update($id_user)
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->edit($id_user);
    } else {
      $post   = $this->input->post();
      $status = $this->users_m->update($id_user, $post);
      $this->session->set_flashdata('msg', $status);
      redirect('user');
    }
  }

  public function destroy($id_user)
  {
    $status = $this->users_m->destroy($id_user);
    $this->session->set_flashdata('msg', $status);
    redirect('user');
  }

  public function develop()
  {
    $this->db->truncate('users');
    redirect('user');
  }

  public function backup_db()
  {
    $this->load->dbutil();
    $config = [
      'format'   => 'zip',
      'filename' => 'database.sql'
    ];
    $backup = $this->dbutil->backup($config);
    $save = FCPATH . 'backup-' . date('ymdHis') . '-db.zip';
    write_file($save, $backup);
    redirect('user');
  }
}


/* End of file UsersController.php */
/* Location: ./application/controllers/UsersController.php */