<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Users_model extends CI_Model
{

  // ------------------------------------------------------------------------
  protected $table = 'users';

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    $count      = $this->db->count_all_results($this->table);
    $this->db->select('a.id,a.username,b.nama_role,a.nama,a.email,a.status');
    $this->db->from('users a');
    $this->db->join('roles b', 'b.id = a.role_id');
    $list_users = $this->db->order_by('id', 'DESC')->get()->result();
    $data = [
      'list_users' => $list_users,
      'count'      => $count,
    ];
    return $data;
  }

  public function insert($item)
  {
    $data = [
      'username' => $item['username'],
      'role_id'  => $item['role_id'],
      'nama'     => ucwords($item['nama']),
      'email'    => $item['email'],
      'img'      => $item['img'],
      'password' => $this->encryption->encrypt($item['password']),
    ];
    $this->db->insert('users', $data);
    return ($this->db->affected_rows() == 1 ? 'true_insert' : 'false_insert');
  }

  public function show($id_user)
  {
    $this->db->select('a.*,b.nama_role');
    $this->db->from('users a');
    $this->db->join('roles b', 'b.id = a.role_id');
    $this->db->where('a.id', $id_user);
    return $this->db->get()->row();
  }


  public function update($id_user, $item)
  {
    $old_pwd = $this->show(decode($id_user))->password;
    $data = [
      'role_id' => $item['role_id'],
      'nama'      => ucwords($item['nama']),
      'password'  => ($old_pwd == $item['password'] ? $item['password'] : $this->encryption->encrypt($item['password'])),
    ];
    $this->db->where('id', decode($id_user))->update('users', $data);
    return ($this->db->affected_rows() == 1 ? 'true_update' : 'false_update');
  }

  public function destroy($id_user)
  {
    $id_user = decode($id_user);
    $this->db->update('users', ['deleted_at' => date('Y-m-d H:i:s'), 'status' => 0], ['id' => $id_user]);
    return ($this->db->affected_rows() == 1 ? 'true_destroy' : 'false_destroy');
  }

  // ------------------------------------------------------------------------

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */