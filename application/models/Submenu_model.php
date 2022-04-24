<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index($kode_menu = null)
  {
    if ($kode_menu == null) {
      // ini digunakan untuk menuConf
      return $this->db->query("SELECT * from menu WHERE kode_menu <> id AND status = 1")->result();
    } else {
      return $this->db->order_by('urutan', 'ASC')->get_where('menu', ['kode_menu' => decode($kode_menu), 'id !=' => decode($kode_menu)])->result();
    }
  }

  public function store($kode_menu, $item)
  {
    $kode_menu = decode($kode_menu);
    $data = [
      'kode_menu' => $kode_menu,
      'urutan'    => intval($this->db->where(['kode_menu' => $kode_menu, 'id !=' => $kode_menu])->count_all_results('menu')) + 1,
      'nama_menu' => $item['nama_menu'],
      'routes'    => $item['routes'],
    ];
    $this->db->insert('menu', $data);
    return ($this->db->affected_rows() == 1 ? 'true_insert' : 'false_insert');
  }

  public function update($id_menu, $item)
  {
    $this->db->where('id', decode($id_menu))->update('menu', $item);
    return ($this->db->affected_rows() == 1 ? 'true_update' : 'false_update');
  }

  public function show($id_menu)
  {
    return $this->db->get_where('menu', ['id' => decode($id_menu)])->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file Submenu_model.php */
/* Location: ./application/models/Submenu_model.php */