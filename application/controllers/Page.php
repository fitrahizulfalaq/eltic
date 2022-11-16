<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		redirect("dashboard");
	}

	public function profil()
	{
		$data['menu'] = "Profil";
		$this->templateadmin->load('template/dashboard','page/profil',$data);
	}

	public function pembuat()
	{
		$data['menu'] = "Profil Pengembang";
		$this->templateadmin->load('template/tanpa-buttom','page/pembuat',$data);
	}

	public function petunjuk()
	{
		$data['menu'] = "Petunjuk Penggunaan";
		$this->templateadmin->load('template/tanpa-buttom','page/petunjuk',$data);
	}

	public function belajar()
	{
		$data['menu'] = "Pilih Jenjang Pendidikan";
		$this->templateadmin->load('template/kosongan','page/belajar/jenjang',$data);
	}

	public function jenjang($jenjang = null)
	{
		$jenjang = $this->uri->segment("3");
		$data['menu'] = "Pilih Kelas";
		
		$this->templateadmin->load('template/kosongan','page/belajar/'.$jenjang,$data);
	}

	public function menu($id = null)
	{
		$data['menu'] = "Halaman Statis";
		$id = $this->uri->segment("3");
		$this->templateadmin->load('template/dashboard', 'page/menu/'.$id, $data);
	}

	
}


