<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->helper('url');
      $this->load->model('m_demo');
  }

  public function index()
  {
    $data['title'] = 'Lihat Kontak';
    $data['kontak'] = $this->m_demo->read_data();
    $data['konten'] = 'demo/v_kontak';
    $this->load->view('template', $data);
  }

  public function tambah()
  {
    $data['title'] = 'Tambah Kontak';
    $data['konten'] = 'demo/v_tambah';
    $this->load->view('template', $data);
  }

  public function proses_tambah()
  {
      $data = array (
        'nama'    => $this->input->post('nama'),
        'no_hp'   => $this->input->post('no_hp'),
        'email'  => $this->input->post('email'),
      );

    $this->m_demo->insert_data($data);

    $msg="<script>alert('Data Berhasil Disimpan')</script>";
		$this->session->set_flashdata('pesan',$msg);
		redirect("web");
  }

  public function edit($id)
  {
    $id = $this->uri->segment('3');
    $data['kontak'] = $this->m_demo->read_by_id($id);
    $data['title'] = 'Edit Kontak';
    $data['konten'] = 'demo/v_edit';
    $this->load->view('template', $data);
  }

  public function proses_edit($id)
  {

      $data = array (
        'nama'    => $this->input->post('nama'),
        'no_hp'   => $this->input->post('no_hp'),
        'email'  => $this->input->post('email'),
      );

    $this->m_demo->update_data($id, $data);

    $msg="<script>alert('Data Berhasil Diedit')</script>";
		$this->session->set_flashdata('pesan',$msg);
		redirect("web");
  }

  public function proses_delete($id)
  {

    $this->m_demo->delete_data($id);

    $msg="<script>alert('Data Berhasil Dihapus')</script>";
    $this->session->set_flashdata('pesan',$msg);
    redirect("web");
  }

}
