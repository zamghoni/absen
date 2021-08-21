<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller{

  private $folder = "backend/pengaturan/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_pengaturan'));
  }

  public function index()
  {
    $query = $this->M_pengaturan->get(1);
		if ($query->num_rows() > 0) {
			$pengaturan = $query->row();
			$data = array(
        'page' => 'Pengaturan',
				'subpage' => 'Edit',
				'row' => $pengaturan,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pengaturan','refresh');
		}
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Edit'])) {
      $this->M_pengaturan->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
    redirect('pengaturan');
  }

}
