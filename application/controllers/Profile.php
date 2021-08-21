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

}
