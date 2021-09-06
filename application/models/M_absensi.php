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
    $date = date('Y-m-d');
    $this->db->from('absensi');
    if ($id != null) {
      $this->db->where('id_user',$id);
      $this->db->where('tgl_absen',$date);
      $this->db->order_by('tgl_absen','DESC');
    }
    $query = $this->db->get();
    return $query;
  }

  function getall($id = null)
  {
    $start_date = $this->input->post('dari_tgl');
    $end_date = $this->input->post('sampai_tgl');
    $id_user = $this->input->post('id_user');
    $date = date('Y-m-d');

    $this->db->from('absensi');
    $this->db->join('user', 'user.id = absensi.id_user', 'left');
    if($start_date && $end_date){
      $this->db->order_by('tgl_absen','DESC');
      $this->db->where('tgl_absen BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
    }
    if ($id_user) {
      $this->db->where('id_user',$id_user);
    }
    $query = $this->db->get();
    return $query;
  }

  function get_user()
  {
    $id = $this->fungsi->user_login()->id;
    $start_date = $this->input->post('dari_tgl');
    $end_date = $this->input->post('sampai_tgl');
    $date = date('Y-m-d');
    $this->db->from('absensi');
    $this->db->join('user', 'user.id = absensi.id_user', 'left');
    if($start_date && $end_date){
      $this->db->order_by('tgl_absen','DESC');
      $this->db->where('tgl_absen BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
    }
    $this->db->where('absensi.id_user', $id);
    $query = $this->db->get();
    return $query;
  }

  function get_masuk()
  {
    $date = date('Y-m-d');
    $time = '08:00:00';
    $this->db->from('absensi');
    $this->db->where('tgl_absen',$date);
    $this->db->where('absen_masuk <=', $time);
    $query = $this->db->get();
    return $query;
  }

  function get_terlambat()
  {
    $date = date('Y-m-d');
    $time = '08:00:00';
    $this->db->from('absensi');
    $this->db->where('tgl_absen',$date);
    $this->db->where('absen_masuk >', $time);
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

  public function del($id)
	{
    $this->db->where('id_absensi', $id);
    $this->db->delete('absensi');
	}

}
