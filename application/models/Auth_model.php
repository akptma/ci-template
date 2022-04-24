<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function login($item)
  {
    $uname = $item['username'];
    $user = $this->db->query("select username,email,password FROM users WHERE  username = '$uname  ' OR email = '$uname '")->row_array();

    if (!is_null($user['email']) || !is_null($user['username'])) {
      $password = $this->encryption->decrypt($user['password']);
      if ($item['password'] === $password) {
        $user_data = $this->db->select('id,nama,username,email,img')
          ->get_where('users', ['email' => $user['email']])
          ->row();

        $session_data = $this->session->set_userdata('user', $user_data);
        redirect('user');
      } else {
        return 'false_pwd';
      }
    } else {
      return 'false_email';
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */