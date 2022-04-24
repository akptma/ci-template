<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles_model extends CI_Model
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
    return $this->db->select('id,nama_role,status')->get_where('roles', ['status' => 1])->result();
  }

  public function insert($item)
  {
    $this->db->insert('roles', $item);
    return ($this->db->affected_rows() == 1 ? 'true_insert' : 'false_insert');
  }

  public function update($id_role, $item)
  {
    $this->db->update('roles', ['nama_role' => $item['nama_role']], ['id' => decode($id_role)]);
    return ($this->db->affected_rows() == 1 ? 'true_update' : 'false_update');
  }

  public function show($id_role, $check)
  {
    if ($check == 1) {
      // send data to method edit
      return $this->db->select('id,nama_role')->get_where('roles', ['id' => decode($id_role)])->row();
    } else {
      // send data to method show
      $role = $this->db->get_where('roles', ['id' => decode($id_role)])->row();

      $this->db->select('a.username,a.nama,a.email,a.status');
      $this->db->from('users a');
      $this->db->join('roles b', 'b.id = a.role_id');
      $this->db->where('a.role_id', decode($id_role));
      $users = $this->db->get()->result();

      $data = [
        'role' => $role,
        'users' => $users
      ];
      return $data;
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file Roles_model.php */
/* Location: ./application/models/Roles_model.php */