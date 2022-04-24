<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppConf_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function show()
  {
    return $this->db->get_where('config', ['id' => 1])->row();
  }

  public function update($id, $item)
  {
    $get_img  = $this->db->get_where('config', ['id' => decode($id)])->row()->nav_logo;
    $img      = ($item['nav_logo'] == '' ? $get_img : $item['nav_logo']);
    $data = [
      'nav_logo'  => $img,
      'nav_brand' => $item['nav_brand'],
      'foo_brand' => $item['foo_brand'],
    ];
    $this->db->update('config', $data, ['id' => decode($id)]);
    return ($this->db->affected_rows() == 1 ? 'true_update' : 'false_update');
  }

  // ------------------------------------------------------------------------

}

/* End of file Config_model.php */
/* Location: ./application/models/Config_model.php */