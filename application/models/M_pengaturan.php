<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengaturan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = 1)
  {
    $this->db->from('pengaturan');
    if ($id != null) {
      $this->db->where('id_pengaturan',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function edit($post)
  {
    $params = [
      'instansi' => $post['instansi'],
      'jam_masuk' => $post['jam_masuk'],
      'bts_absen_masuk' => $post['bts_absen_masuk'],
      'bts_absen_pulang' => $post['bts_absen_pulang'],
    ];
    if (!empty($_FILES['logo']['name'])) {
      $upload = $this->_do_uploadlogo();
      $params['logo'] = $upload;
      unlink("./upload/logo/".$this->input->post('old_logo'));
    }
    $this->db->where('id_pengaturan', 1);
    $this->db->update('pengaturan', $params);
  }

  private function _do_uploadlogo()
  {
  unset($config);
  $config['upload_path'] 		= './upload/logo/';
  $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
	$config['max_size']    		=  2048;
  $config['file_name']    	=  'Logo Instansi'.date('ymd').'-'.substr(md5(rand()),0,10);

  $this->load->library('upload', $config);
  $this->upload->initialize($config);
  if (!$this->upload->do_upload('logo')) {
    $this->session->set_flashdata('error', $this->upload->display_errors('',''));
      redirect('pengaturan','refresh');
  }
  return $this->upload->data('file_name');
  }

}
