<?php
defined('BASEPATH') or exit('No direct script access allowed');


// ------------------------------------------------------------------------

if (!function_exists('encode')) {
  function encode($prm)
  {
    $encode1 = base64_encode($prm);
    $encode2 = base64_encode($encode1);
    return $encode2;
  }
}

if (!function_exists('decode')) {
  function decode($prm)
  {
    $decode1 = base64_decode($prm);
    $decode2 = base64_decode($decode1);
    return $decode2;
  }
}

if (!function_exists('user_control')) {
  function user_control()
  {
    $ci       = &get_instance();
    $user     = $ci->session->userdata('user')->id;
    $get_menu = $ci->db->select('id,title_menu,nama_menu')->get_where('menu', ['routes' => $ci->uri->segment(1)])->row();
    $acl      = $ci->db->get_where('acl', ['id_menu' => intval($get_menu->id), 'id_user' => intval($user)])->result();
    $data     = ['get_menu' => $get_menu, 'acl' => $acl];
    return $data;
  }
}

if (!function_exists('checked_akses')) {
  function checked_url_typing()
  {
    $ci       = &get_instance();
    $user     = $ci->session->userdata('user')->id;
    $get_menu = $ci->db->select('id')->get_where('menu', ['routes' => $ci->uri->segment(1)])->row()->id;
    $acl      = $ci->db->get_where('acl', ['id_user' => $user, 'id_menu' => $get_menu])->row();
    return (is_null($acl->id_menu) || $acl->akses == 'N' ? redirect('auth/login') : '');
  }
}




// ------------------------------------------------------------------------

/* End of file Develop_helper.php */
/* Location: ./application/helpers/Develop_helper.php */