<?php
defined('BASEPATH') or exit('No direct script access allowed');


// ------------------------------------------------------------------------
if (!function_exists('forbidden')) {
  function forbidden()
  {
    $ci = &get_instance();
    $session_user = $ci->session->userdata('user');
    if (is_null($session_user)) {
      redirect('auth');
    }
  }
}

if (!function_exists('is_login')) {
  function is_login()
  {
    $ci = &get_instance();
    $session_user = $ci->session->unset_userdata('user');
    if (!is_null($session_user)) {
      redirect('auth');
    }
  }
}




// ------------------------------------------------------------------------

/* End of file Login_helper.php */
/* Location: ./application/helpers/Develop_helper.php */