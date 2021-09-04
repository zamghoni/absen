<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  private $folder = "backend/profile/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('M_user','M_pengaturan'));
  }

  function index()
  {
    $id = $this->fungsi->user_login()->id;
    $query = $this->M_user->get($id);
  		if ($query->num_rows() > 0) {
  			$user = $query->row();
  			$data = array(
          'page' => 'Profile',
  				'subpage' => 'View',
  				'row' => $user,
          'pengaturan' => $this->M_pengaturan->get(1)->row(),
  			);
  			$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
  		} else {
  			$this->session->set_flashdata('error', "Data tidak ditemukan");
  			redirect('user','refresh');
  		}
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);

    if (isset($_POST['update'])) {
      $this->M_user->edit_profile($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil diperbaharui');
    }
    redirect('profile');
  }

  public function ubah_password()
  {
    $username = $this->fungsi->user_login()->username;
    $password = $this->input->post('old_password');
    $post = $this->input->post(null, TRUE);
    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    if (password_verify($password, $user['password'])) {
      if (isset($_POST['updatesandi'])) {
        $this->M_user->ubah_password($post);
      }
      $this->session->set_flashdata('success', 'Sandi Baru berhasil diperbaharui');
      redirect('profile');
    }
    $this->session->set_flashdata('error', '<b>Gagal ubah kata sandi!</b> Sandi Lama tidak sama dengan yang ada di database');
    redirect('profile');
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil diperbaharui');
    }
    redirect('profile');
  }

}
