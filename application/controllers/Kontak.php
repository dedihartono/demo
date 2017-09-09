<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller{

  public function __construct()
  {
    
    parent::__construct();
      
    $this->load->helper('url');
     
    $this->load->model('m_crud');
  
  }

  public function index() 
  {
    
    $data = [
      'konten' => 'kontak/v_kontak',
      'kontak' => $this->m_crud->read(),
    ];

    $this->load->view('template', $data);

  }

  function create()
  {
    
    if (!$this->input->is_ajax_request()) {

        show_404();

    } else {
        //kita validasi inputnya dulu
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
        
        if ($this->form_validation->run()==FALSE) {
            
          $status = 'error';
          $msg = validation_errors();
        
        } else {
            
            if ($this->m_crud->create()) {
                $status = 'success';
                $msg = "Data jalan berhasil disimpan";
            } else {
                $status = 'error';
                $msg = "Terjadi kesalahan saat menyimpan data kontak";
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    
      }
  }

  function edit()
  {
    if (!$this->input->is_ajax_request()) {
        
      show_404();

    } else {
        //kita validasi inputnya dulu
        $this->form_validation->set_rules('id_kontak', 'ID Kontak', 'trim|required');
        
        if ($this->form_validation->run()==false) {
            $status = 'error';
            $msg = validation_errors();
        }
        else {
            $id = $this->input->post('id_kontak');
            if ($this->m_crud->read_by_id($id)->num_rows()!=null) {
                $status = 'success';
                $msg = $this->m_crud->read_by_id($id)->result();
            } else {
                $status = 'error';
                $msg = "Data jalan tidak ditemukan";
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
  }

  function update() 
  {
      if (!$this->input->is_ajax_request()) {

          show_404();
          
      } else {
        //kita validasi inputnya dulu
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');
          if ($this->form_validation->run()==false) {
              $status = 'error';
              $msg = validation_errors();
          } else {
              $id = $this->input->post('id_kontak');
              if ($this->m_crud->update($id)) {
                  $status = 'success';
                  $msg = "Data kontak berhasil diupdate";
              } else {
                  $status = 'error';
                  $msg = "terjadi kesalahan saat mengupdate data kontak";
              }
          }
          $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
      }
  }

  function delete()
  {
    if (!$this->input->is_ajax_request()) {
        
      show_404();

    } else {
        //kita validasi inputnya dulu
        $this->form_validation->set_rules('id_kontak', 'ID Kontak', 'trim|required');
        if ($this->form_validation->run()==false) {
            $status = 'error';
            $msg = validation_errors();
        } else {
            $id = $this->input->post('id_kontak');
            if ($this->m_crud->delete($id)) {
                $status = 'success';
                $msg = "Data kontak berhasil dihapus";
            } else {
                $status = 'error';
                $msg = "terjadi kesalahan saat menghapus data kontak";
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
    }
  }

}
