<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppConfController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    forbidden();
    $this->load->model('AppConf_model', 'conf_m');
  }

  private function _header()
  {
    $this->load->view('layouts/backend/header');
  }

  private function _footer()
  {
    $this->load->view('layouts/backend/footer');
  }

  public function edit()
  {
    $this->_header();
    $data = [
      'config' => $this->conf_m->show(),
      'acl'   => user_control()['acl'][0],
    ];
    $this->load->view('backend/config-app/edit', $data);
    $this->_footer();
  }

  public function update($id)
  {

    $config['upload_path']   = './public/data/backend/img-logo';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['file_name']     = 'logo.png';
    $config['overwrite']     = true;
    $this->load->library('upload', $config);

    $post = $this->input->post();
    $this->form_validation->set_rules('nav_brand', 'Navigasi Brand', 'required|min_length[3]');
    $this->form_validation->set_rules('foo_brand', 'Footer Brand', 'required|min_length[3]');
    if ($this->form_validation->run() == FALSE) {
      $this->edit();
    } else {
      if ($post['upload'] == 1) {
        if ($this->upload->do_upload('nav_logo')) {
          $status = $this->conf_m->update($id, $post);
          $this->session->flashdata('msg', $status);
          redirect('app-config');
        } else {
          dump_exit($this->upload->display_errors());
        }
      } else {
        $status = $this->conf_m->update($id, $post);
        $this->session->flashdata('msg', $status);
        redirect('app-config');
      }
    }
  }
}


/* End of file ConfigController.php */
/* Location: ./application/controllers/ConfigController.php */