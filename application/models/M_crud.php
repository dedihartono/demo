<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model{

  public $table = 'tb_kontak';

  public $primary_key = 'id_kontak';

  public function __construct()
  {
    
    parent::__construct();

      $this->load->database();

  }

  public function create() 
  {
    
    $data = [ 'nama'  => $this->input->post('nama'),
              'no_hp' => $this->input->post('no_hp'),
              'email' => $this->input->post('email'),
            ];

           $query = $this->db->insert($this->table, $data);

           return $query;
  }

  public function read() 
  {

    $query = $this->db->get($this->table);
    
      return $query;

  }

  public function read_by_id($id)
  {

    $this->db->where($this->primary_key, $id);

    $query = $this->db->get($this->table);

      return $query;

  }

  public function update($id) 
  {

    $data = [ 'nama'  => $this->input->post('nama'),
              'no_hp' => $this->input->post('no_hp'),
              'email' => $this->input->post('email'),
            ];

    $this->db->where($this->primary_key, $id);

    $query = $this->db->update($this->table, $data);

      return $query;

  }

  public function delete($id) 
  {

    $this->db->where($this->primary_key, $id);

    $query = $this->db->delete($this->table);

      return $query;

  }
  
}
