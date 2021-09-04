<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller{

  private $folder = "backend/riwayat/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('M_absensi'));
  }

  function index()
  {
    $data = array(
      'page' => 'Riwayat',
      'subpage' => 'Data',
      'row'  => $this->M_absensi->get(),
    );
    $this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
  }

}
