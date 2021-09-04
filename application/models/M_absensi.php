<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absensi extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = null)
  {
    $this->db->from('absensi');
    if ($id != null) {
      $this->db->where('id_user',$id);
      $this->db->order_by('tgl_absen','DESC');
    }
    $query = $this->db->get();
    return $query;
  }

  public function masuk($post)
  {
    $params = [
      'id_user' => $this->fungsi->user_login()->id,
      'tgl_absen' => date('Y-m-d'),
      'absen_masuk' => date('H:i-s'),
      'keterangan_absen' => $post['keterangan_absen']
    ];
    $this->db->insert('absensi', $params);
  }

  public function pulang($id)
  {
    $params = [
      'absen_pulang' => date('H:i:s'),
    ];
    $this->db->where('id_absensi', $id);
    $this->db->update('absensi', $params);
  }

}
