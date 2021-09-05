<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    belum_login();
    $this->load->model(array('M_user','M_absensi'));
  }

  function hadir()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['absen_masuk'])) {
      $this->M_absensi->masuk($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Absensi Masuk berhasil disimpan');
    }
    redirect('dashboard');
  }

  function pulang($id)
  {
    $this->M_absensi->pulang($this->uri->segment(3));
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Absensi Pulang berhasil disimpan');
    }
      redirect('dashboard');
  }

}
