<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username',$post['username']);
    $this->db->where('password',password_verify($post['password'],'password'));
    $query = $this->db->get();
    return $query;
  }

  function get($id = null)
  {
    $this->db->from('user');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'nama_lengkap' => $post['nama_lengkap'],
      'username' => $post['username'],
      'password' => password_hash($post['password'], PASSWORD_BCRYPT),
      'role' => $post['role'],
      'dibuat' => date('Y-m-d H:i:s')
    ];
    if (!empty($_FILES['foto']['name'])) {
      $upload = $this->_do_uploadfoto();
      $params['foto'] = $upload;
    }
    $this->db->insert('user', $params);
  }

  private function _do_uploadfoto()
    {
    unset($config);
    $config['upload_path'] 		= './upload/foto/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
    $config['file_name']    	=  'Foto User'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('foto')) {
      $this->session->set_flashdata('error', $this->upload->display_errors('',''));
      if ($this->uri->segment(1) == 'profil') {
        redirect('profil/view/'.$this->fungsi->user_login()->id);
      }else{
        redirect('user','refresh');
      }
    }
    return $this->upload->data('file_name');
    }

  public function edit($post)
  {
    $params = [
      'nama_lengkap' => $post['nama_lengkap'],
      'username' => $post['username'],
      'role' => $post['role'],
      'diubah' => date('Y-m-d H:i:s')
    ];
    if (!empty($_FILES['foto']['name'])) {
      $upload = $this->_do_uploadfoto();
      $params['foto'] = $upload;
      unlink("./upload/foto/".$this->input->post('old_foto'));
    }
    if (!empty($post['password'] && $post['konf_password'])) {
      $params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
    }
    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  public function edit_profile($post)
  {
    $params = [
      'nama_lengkap' => $post['nama_lengkap'],
      'username' => $post['username'],
      'diubah' => date('Y-m-d H:i:s')
    ];
    $data = $this->M_user->get($post['id'])->row();
    if (!empty($_FILES['foto']['name']) || $data->foto != null) {
      $upload = $this->_do_uploadfoto();
      $params['foto'] = $upload;
      unlink("./upload/foto/".$this->input->post('old_foto'));
    }
    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  public function ubah_password($post)
  {
    if (!empty($post['password'] && $post['konf_password'])) {
      $params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
    }
    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  function cek_username($code, $id = null)
  {
    $this->db->from('user');
    $this->db->where('username', $code);
    if($id != null){
      $this->db->where('id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $data = $this->M_user->get($id)->row();
    if($data->foto != null) {
			$file_foto = './upload/foto/'.$data->foto;
			unlink($file_foto);
		}
    $this->db->where('id', $id);
    $this->db->delete('user');
    $this->db->where('id_user', $id);
    $this->db->delete('absensi');
	}

  public function status1($id)
  {
    $params = [
      'role' => '1',
      'diubah' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id', $id);
    $this->db->update('user', $params);
  }

  public function status0($id)
  {
    $params = [
      'role' => '0',
      'diubah' => date('Y-m-d H:i:s')
    ];
    $this->db->where('id', $id);
    $this->db->update('user', $params);
  }

  public function daftar($post)
  {
    $params = [
      'nama_lengkap' => $post['nama_lengkap'],
      'username' => $post['username'],
      'password' => password_hash($post['password'], PASSWORD_BCRYPT),
      'role' => 0,
      'foto' => '',
      'dibuat' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('user', $params);
  }

}
