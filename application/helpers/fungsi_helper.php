<?php
  function sudah_login()
  {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('username');
    if($user_session){
      redirect('dashboard');
    }
  }

  function belum_login()
  {
    $ci =& get_instance();
    $user_session = $ci->session->userdata('username');
    if(!$user_session){
      redirect('auth');
    }
  }

  function cek_admin()
  {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->role != 1) {
      redirect('dashboard');
    }
  }
 ?>
