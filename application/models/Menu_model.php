<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Menu_model extends CI_Model
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
    return $this->db->query("SELECT id,title_menu,urutan,status FROM menu WHERE id = kode_menu AND status = 1 ORDER BY urutan ASC")->result();
  }

  public function store($item)
  {
    $generate_kode_menu = intval($this->db->count_all_results('menu')) + 1;
    $generate_urutan    = intval($this->db->query("SELECT (MAX(urutan) + 1) as urutan FROM menu WHERE id = kode_menu")->row()->urutan);
    $data = [
      'kode_menu'  => $generate_kode_menu,
      'urutan'     => $generate_urutan,
      'title_menu' => ucwords($item['title_menu']),
      'icons'      => $item['icons']
    ];
    $this->db->insert('menu', $data);
    return ($this->db->affected_rows() == 1 ? 'true_insert' : 'false_insert');
  }

  public function update($id_menu, $item)
  {
    $data = [
      'title_menu' => $item['title_menu'],
      'icons'      => $item['icons']
    ];

    $this->db->update('menu', $data, ['id' => decode($id_menu)]);
    return ($this->db->affected_rows() == 1 ? 'true_update' : 'false_update');
  }

  public function show($id_menu)
  {
    $header = $this->db->select('id,title_menu,status,icons,created_at,updated_at')->get_where('menu', ['id' => decode($id_menu), 'kode_menu' => decode($id_menu)])->row();
    $body   = $this->db->order_by('urutan', 'ASC')->get_where('menu', ['kode_menu' => decode($id_menu), 'id !=' => decode($id_menu)])->result();
    $data   = [
      'header' => $header,
      'body'   => $body,
    ];
    return $data;
  }

  // ------------------------------------------------------------------------

}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */