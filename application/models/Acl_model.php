<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Acl_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  public function index($id_user)
  {
    $this->db->select('c.id,c.kode_menu,b.nama,c.nama_menu,c.title_menu,a.akses,a.add,a.edit,a.detail,a.delete');
    $this->db->from('acl a');
    $this->db->join('users b', 'b.id = a.id_user');
    $this->db->join('menu c', 'c.id = a.id_menu');
    $this->db->where('a.id_user', decode($id_user));
    $this->db->order_by('c.id', 'c.kode_menu', 'asc');
    return $this->db->get()->result();
  }

  // ------------------------------------------------------------------------
  public function sync_akses($id_user)
  {
    //  cek apakah menu pada table acl sudah ada atau belum
    //  jika sudah ada maka tambahkan data menu yang belum ada pada table acl
    $get_menu = $this->db->query("select id from menu where id not in (select id_menu from acl where id_user = '" . decode($id_user) . "')")->result();
    $push = [];
    foreach ($get_menu as $menu) {
      $item = [
        'id_user' => decode($id_user),
        'id_menu' => $menu->id,
        'akses'   => 'N',
        'add'     => 'N',
        'edit'    => 'N',
        'detail'  => 'N',
        'delete'  => 'N',
      ];
      array_push($push, $item);
    }
    $this->db->insert_batch('acl', $push);
    return ($this->db->affected_rows() == 1 ? 'true_insert' : 'true_insert');
  }

  public function data_sync()
  {
    /**
     * DUPLIKAT AKSES PADA USER
     */
    return $this->db->query("SELECT id,username,nama FROM users WHERE `status` = 1 AND id IN (SELECT id_user FROM acl)")->result();
  }

  public function sync_store($id_user, $user_id_duplicate)
  {
    /**
     * INSERT DATA BERDASARKAN DUPLICATE DATA YANG DIPILIH
     */

    $id_user = decode($id_user);
    $user_duplicate = $this->db->get_where('acl', ['id_user' => $user_id_duplicate])->result();
    $push = [];
    foreach ($user_duplicate as $acl) {
      $item = [
        'id_user' => $id_user,
        'id_menu' => $acl->id_menu,
        'akses'   => $acl->akses,
        'add'     => $acl->add,
        'edit'    => $acl->edit,
        'detail'  => $acl->detail,
        'delete'  => $acl->delete,
      ];
      array_push($push, $item);
    }
    $this->db->trans_start();
    $this->db->delete('acl', ['id_user' => $id_user]);
    $this->db->insert_batch('acl', $push);
    $this->db->trans_complete();
    return ($this->db->affected_rows() == 1 ? 'false_insert' : 'true_insert');
  }

  public function update($id_user, $item)
  {
    $id_user = decode($id_user);
    $this->db->trans_start();
    $this->db->where('id_user', $id_user)->delete('acl');
    $push = [];
    for ($i = 1; $i <= $item['baris']; $i++) {
      $data = [
        'id_user' => intval($id_user),
        'id_menu' => intval($item['id_menu' . $i]),
        'akses'   => ($item['akses' . $i] == 'on' ? 'Y' : 'N'),
        'add'     => ($item['add' . $i] == 'on' ? 'Y' : 'N'),
        'edit'    => ($item['edit' . $i] == 'on' ? 'Y' : 'N'),
        'detail'  => ($item['detail' . $i] == 'on' ? 'Y' : 'N'),
        'delete'  => ($item['delete' . $i] == 'on' ? 'Y' : 'N'),
      ];
      array_push($push, $data);
    }
    $this->db->insert_batch('acl', $push);
    $this->db->trans_complete();
    return ($this->db->affected_rows() == 1 ? 'false_update' : 'true_update');
  }

  // ------------------------------------------------------------------------

}

/* End of file Acl_model.php */
/* Location: ./application/models/Acl_model.php */