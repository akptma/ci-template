<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuConf_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function update_menu($item)
  {
    for ($i = 1; $i <= $item['baris_menu']; $i++) {
      $data = [
        'id' => $item['id_menu' . $i],
        'urutan' => $item['urutan' . $i],
      ];
      $this->db->update('menu', $data, ['id' => $item['id_menu' . $i]]);
    }
    return ($this->db->affected_rows() == 1 ? 'true_update' : 'false_update');
  }

  // ------------------------------------------------------------------------

}

/* End of file MenuConf_model.php */
/* Location: ./application/models/MenuConf_model.php */