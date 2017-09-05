<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_demo extends CI_Model{

  public $table = 'tb_kontak';
  public $primary_key = 'id_kontak';

  public function __construct()
  {
    parent::__construct();

  }

  public function read_data()
  {
    $query = $this->db->get($this->table);

      return $query->result();
  }

  public function insert_data($data)
  {
      $this->db->insert($this->table, $data);
  }

  public function read_by_id($id)
  {

    $this->db->where($this->primary_key, $id);

      return $this->db->get($this->table)->row();
  }

  public function update_data($id, $data)
  {
      $this->db->where($this->primary_key, $id);
      $this->db->update($this->table, $data);
  }

  public function delete_data($id)
  {
    $this->db->where($this->primary_key, $id);
    $this->db->delete($this->table);
  }

}
