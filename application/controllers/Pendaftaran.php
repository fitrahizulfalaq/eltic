<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pendaftaran_m');
		$this->load->library('encryption');
		//Agar tidak ada form resubmission
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
	}

	// LOAD DATA AJA
	public function index()
	{
		check_not_login();
		redirect('pendaftaran/pendaftaran_data');
	}

	public function data()
	{
		$previllage = 3;
		check_super_user($this->session->tipe_user, $previllage);
		$data['menu'] = "Data Pendaftar";
		$data['row'] = $this->pendaftaran_m->getNonActive();
		$this->templateadmin->load('template/tanpa-buttom', 'pendaftaran/data', $data);
	}

	public function dataAll()
	{
		$previllage = 3;
		check_super_user($this->session->tipe_user, $previllage);
		$data['menu'] = "Data Pengguna";
		$data['row'] = $this->pendaftaran_m->get();
		$this->templateadmin->load('template/tanpa-buttom', 'pendaftaran/dataAll', $data);
	}

	public function detail()
	{
		$previllage = 3;
		check_super_user($this->session->tipe_user, $previllage);
		$id = $this->uri->segment(3);
		$data['menu'] = "Detail Pendaftar";
		$data['row'] = $this->pendaftaran_m->get($id)->row();
		$this->templateadmin->load('template/dashboard', 'pendaftaran/pendaftaran_detail', $data);
	}

	// FORM EKSEKUSI
	public function tambah()
	{
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]|is_unique[tb_user.username]|max_length[20]|alpha_dash');
		$this->form_validation->set_rules('email', 'email', 'min_length[3]|is_unique[tb_user.email]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[3]|is_unique[tb_user.hp]|max_length[20]|alpha_dash');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Pendaftaran User";
			$this->templateadmin->load('template/umum', 'pendaftaran/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->pendaftaran_m->simpan($post);
			

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Pendaftaran Berhasil, lengkapi profil setelah login menggunakan email yang telah anda daftarkan');
			}
			// $kalimat = "Terima kasih, *".$post['nama']."*. Anda telah melakukan pendaftaran. \n \n"."Berikut Informasi akun anda : \nEmail : ".$post['email']."\nPassword : ******\n \nSelamat menjelajah.\nSalam Hangat dari Kami, *ILTEC APPS* \nProvided by *Bikin Karya Creative Media* \n https://bikinkarya.com";
			// 	$this->fungsi->sendWA($post['hp'],$kalimat);
			redirect('pendaftaran/tambah');

		}
	}


	//PERINTAH EKSEKUSI DATA
	function hapus()
	{
		$previllage = 3;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);
		$this->pendaftaran_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('pendaftaran/pendaftaran_data');
	}

	function acc()
	{
		$id = $this->uri->segment(3);
		$this->pendaftaran_m->acc($id);
		$this->session->set_flashdata('success', 'Pengguna Berhasil Di ACC');
		redirect('pendaftaran/data');
	}

	public function forget()
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[50]');
		$this->form_validation->set_rules('hp', 'hp', 'min_length[11]|max_length[15]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Konfirmasi WA";
			$this->templateadmin->load('template/umum','pendaftaran/forget',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
            
            $data = $this->pendaftaran_m->getByPhone($post['hp']);
			if ($data->num_rows() != null) {
				$kalimat = "Identitas Akun *ILTEC APPS* \n\nEmail : ".$data->row("email")."\nPassword: ".$data->row("password")."\n\nSilahkan melanjutkan proses login di https://apps.iltec.or.id/";
				$this->fungsi->sendWA($post['hp'],$kalimat);
				$this->session->set_flashdata('success','Berhasil Di WA');
				redirect("pendaftaran/forget");	        	
			} else {
				$this->session->set_flashdata('warning','Nomor Tidak Terdaftar');
				redirect("pendaftaran/forget");	        	
			}        	
	    }
	}

	function testCron()
	{
		$this->fungsi->sendWA("081234381239","Testing");
	}
}
