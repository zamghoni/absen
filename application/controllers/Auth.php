<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  private $folder ="backend/auth/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('M_user'));
  }

  function index()
  {
    $data = array(
      'page' => 'Login',
      'subpage' => '',
    );
    $this->load->view($this->folder.'login',$data);
  }

  public function process()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    // jika usernya ada
    if ($user) {
      // cek password
      if (password_verify($password, $user['password'])) {
        $data = array(
          'id' => $user['id'],
          'nama_lengkap' => $user['nama_lengkap'],
          'username' => $user['username'],
          'role' => $user['role'],
          'foto' =>$user['foto'],
        );
        $this->session->set_userdata($data);
        $this->session->set_flashdata('success','Selamat Datang...<b> '. $this->session->userdata('username') .'</b> pada halaman Dashboard, salam semangat dan sukses selalu');
        redirect('dashboard','refresh');
      } else {
        $this->session->set_flashdata('error','<center>Login gagal, <br> Password salah</center>');
        redirect('auth','refresh');
      }
    } else {
      $this->session->set_flashdata('error','<center>Login gagal, <br> Username '.$this->input->post('username').' tidak terdaftar</center>');
      redirect('auth','refresh');
    }
  }

  public function logout()
  {
    $params = array('nama_lengkap','username','role','foto');
    $this->session->unset_userdata($params);
    $this->session->sess_destroy();
    redirect('auth');
  }

  public function register()
  {
    $data = array(
    'page' => 'Daftar',
    'subpage' => '',
    );
    $this->load->view($this->folder.'register',$data);
  }

  public function daftar()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Tambah'])) {
      if($this->M_user->cek_username($post['username'])->num_rows() > 0){
        $this->session->set_flashdata('error', "Username <b>$post[username]</b> sudah dipakai user lain, <br />Silahkan ganti dengan yang berbeda");
        redirect('register','refresh');
      } else {
        $this->M_user->daftar($post);
      }
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Registrasi berhasil disimpan, Silahkan Login');
    }
    redirect('auth');
  }

  public function forget()
  {
    $data = array(
    'page' => 'Reset',
    'subpage' => '',
    );
    $this->load->view($this->folder.'forget',$data);
  }

}
