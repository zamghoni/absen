<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  private $folder = "backend/user/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    belum_login();
    cek_admin();
    $this->load->model(array('M_user'));
  }

  public function index()
  {
    $data = array(
      'page' => 'User',
      'subpage' => 'Data',
      'row'  => $this->M_user->get(),
    );
    $this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
  }

  public function form()
  {
    $user = new stdClass();
    $user->id = null;
    $user->nama_lengkap = null;
    $user->username = null;
    $user->password = null;
    $user->role = null;
    $user->foto = null;
    $data = array(
      'page' => 'User',
      'subpage' => 'Tambah',
      'row' => $user,
    );
    if ($this->form_validation->run() == FALSE) {
      $this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
    }
  }

  public function edit($id)
	{
		$query = $this->M_user->get($id);
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$data = array(
        'page' => 'User',
				'subpage' => 'Edit',
				'row' => $user,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('user','refresh');
		}
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Tambah'])) {
      if($this->M_user->cek_username($post['username'])->num_rows() > 0){
        $this->session->set_flashdata('error', "Username <b>$post[username]</b> sudah dipakai user lain, silahkan ganti dengan yang berbeda");
        redirect('user/form');
      } else {
        $this->M_user->add($post);
      }
    }else if (isset($_POST['Edit'])) {
      $this->M_user->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
    redirect('user');
  }

  public function del($id)
  {
    $this->M_user->del($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
    redirect('user');
  }

  public function admin($id)
  {
    $this->M_user->status1($this->uri->segment(3));
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
      redirect('user');
  }

  public function user($id)
  {
    $this->M_user->status0($this->uri->segment(3));
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
      redirect('user');
  }

}
