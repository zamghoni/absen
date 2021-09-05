<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller{

  private $folder = "backend/riwayat/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    belum_login();
    $this->load->model(array('M_absensi','M_pengaturan'));
  }

  function index()
  {
    $data = array(
      'page' => 'Riwayat',
      'subpage' => 'Data',
      'row'  => $this->M_absensi->getall(),
      'pengaturan' => $this->M_pengaturan->get(1)->row(),
    );
    $this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
  }

  public function del($id)
  {
    $this->M_absensi->del($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
    redirect('riwayat');
  }

}
