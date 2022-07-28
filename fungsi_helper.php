<?php

//fungsi untuk mengecek kesiapan login
function check_already_login()
{
   $ci = &get_instance();
   $user_session = $ci->session->userdata('user_id');
   if ($user_session) {
      redirect('Dashboard');
   }
}

//fungsi untuk mengecek user belum login (tidak di bolehkan)
function check_not_login()
{
   $ci = &get_instance();
   $user_session = $ci->session->userdata('user_id');
   if (!$user_session) {
      redirect('Auth/login');
   }
}

//fungsi untuk pembatasan hak akses user/admin
function check_admin()
{
   $ci = &get_instance();
   $ci->load->library('fungsi');
   if ($ci->fungsi->user_login()->level != 1) {
      redirect('Dashboard');
   }
}


//untuk controller
//dashboard dan page lain
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		check_not_login();
		$this->template->load('Template', 'dashboard');
	}
}


 
//untuk controller Auth/login
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function login()
  {
    check_already_login();
    $this->load->view('Login');
  }
  }


