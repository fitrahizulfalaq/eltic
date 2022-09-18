<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Tema extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model("tema_m");
	}

	public function index()
	{
		// $this->templateadmin->load('template/dashboard','page/beranda',$data);
	}

	public function list()
	{
		$id	= $this->uri->segment(3);

		if ($id == null)
		{
			redirect("");
		}

		$data['menu'] = "List Mapel Kelas ".$id;
		$data['row'] = $this->tema_m->getKelas($id);
		$data['kelas'] = $this->uri->segment(3);
		if ($data['kelas'] < 7) {
			$data['jenjang'] = "sd";
		} else if($data['kelas'] > 6 && $data['kelas'] < 10  ){
			$data['jenjang'] = "smp";
		} else if($data['kelas'] > 9 && $data['kelas'] < 13  ) {
			$data['jenjang'] = "sma";			
		} else {
			$this->session->set_flashdata('danger','jenjang tidak valid');
			redirect();
		}
		$this->templateadmin->load('template/kosongan','tema/list',$data);
	}
	
	// FORM EKSEKUSI
	public function tambah()
	{	
		//Cek Akses yang bisa menambahkan hanya relawan
		$tipe_user = $this->session->tipe_user;
		
		if ($tipe_user < 2) {
			$this->session->set_flashdata('danger','Hanya relawan yang bisa menambahkan data');
		}
		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Mata Pelajaran";
			$this->templateadmin->load('template/tanpa-buttom','tema/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->tema_m->simpan($post);

	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Mata Pelajaran berhasil ditambahkan');
	        }	
	        redirect('tema/list/'.$post['kelas']);	        	
	    }
	}

	function hapus()
	{
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);
		$kelas = $this->uri->segment(5);

		//Cek ada yang sudah mengerjakan sebelumnya atau belum
		$cek_done = $this->tema_m->ceksubtema($id)->num_rows();
		if ($cek_done != null) {
			$this->session->set_flashdata('warning', 'Mata Pelajaran ini memiliki beberapa topik. Harap hapus topik terlebih dahulu sebelum menghapus mata pelajaran.');
			redirect('tema/list/'.$kelas);
		}

		$this->tema_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('tema/list/'.$kelas);
	}
}
