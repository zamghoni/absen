<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  private $folder = "backend/dashboard/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    $data = array(
      'page' => 'Dashboard',
      'subpage' => '',
    );
    $this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
  }

}
