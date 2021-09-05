<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  private $folder = "backend/dashboard/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    belum_login();
    $this->load->model(array('M_user','M_absensi','M_pengaturan'));
  }

  public function index()
  {
    $id = $this->fungsi->user_login()->id;
    $query = $this->M_absensi->get($id);
		if ($query->num_rows() > 0) {
			$absensi = $query->row();
    $data = array(
      'page' => 'Dashboard',
      'subpage' => '',
      'pegawai' => $this->M_user->get(),
      'absensi' => $absensi,
      'pengaturan' => $this->M_pengaturan->get(1)->row(),
      'masuk' => $this->M_absensi->get_masuk(),
      'terlambat' => $this->M_absensi->get_terlambat(),
    );
    $this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
    } else {
      $data = array(
        'page' => 'Dashboard',
        'subpage' => '',
        'pegawai' => $this->M_user->get(),
        'pengaturan' => $this->M_pengaturan->get(1)->row(),
        'masuk' => $this->M_absensi->get_masuk(),
        'terlambat' => $this->M_absensi->get_terlambat(),
      );
      $this->template->load($this->foldertemplate.'template',$this->folder.'data2', $data);
    }
  }

}
