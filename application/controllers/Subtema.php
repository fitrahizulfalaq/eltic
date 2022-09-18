<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Subtema extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model("subtema_m");


	}

	public function index()
	{
		$id = $this->uri->segment(2);
		redirect("subtema/detail".$id);
	}

	public function list()
	{
		$this->load->model("tema_m");
		$id	= $this->uri->segment(3);

		if ($id == null)
		{
			redirect("");
		}

		$data['row'] = $this->subtema_m->getTema($id);
		$data['keterangan'] = $this->tema_m->get($id)->row('deskripsi');
		$data['tema'] = $this->tema_m->get($id)->row('id');
		$data['kelas'] = $this->tema_m->get($id)->row('kelas');
		$data['menu'] = "List Subtema Kelas ".$data['kelas'];
		$this->templateadmin->load('template/kosongan', 'subtema/list', $data);
	}

	public function detail()
	{
		$id	= $this->uri->segment(3);

		$data['menu'] = "Detail Fitur";
		$data['data'] = $this->subtema_m->get($id)->row();
		$data['tema'] = $this->subtema_m->get($id)->row("tema_id");
		$data['kelas'] = $this->subtema_m->getKelas($data['tema'])->row("kelas");
		$data['pembelian_rpp'] = $this->fungsi->pilihan_advanced_2("tb_neraca","user_id",$this->session->id,"keterangan","rpp".$id)->num_rows();
		$data['pembelian_perangkat'] = $this->fungsi->pilihan_advanced_2("tb_neraca","user_id",$this->session->id,"keterangan","perangkat".$id)->num_rows();
		$this->templateadmin->load('template/kosongan', 'subtema/detail', $data);
	}

	public function tambah()
	{
		//Cek Akses yang bisa menambahkan hanya relawan
		$tipe_user = $this->session->tipe_user;

		if ($tipe_user < 2) {
			$this->session->set_flashdata('danger', 'Hanya relawan yang bisa menambahkan data');
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
			$id	= $this->uri->segment(3);
			$this->load->model("tema_m");

			$data['menu'] = "Tambah data tema";
			$data['tema'] = $this->tema_m->get($id)->row();
			$this->templateadmin->load('template/tanpa-buttom', 'subtema/tambah', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->subtema_m->simpan($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'SubTema berhasil ditambahkan');
			}
			redirect('subtema/list/' . $post['tema_id']);
		}
	}

	public function tambahkonten()
	{
		//Cek Akses yang bisa menambahkan hanya relawan
		$tipe_user = $this->session->tipe_user;
		$penanganan = $this->input->get("tipe");

		if ($tipe_user < 2) {
			$this->session->set_flashdata('danger', 'Hanya relawan yang bisa menambahkan data');
		}

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'min_length[3]|is_unique[tb_tema.deskripsi]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$id	= $this->uri->segment(3);
			$this->load->model("tema_m");

			$data['menu'] = "Tambah".$penanganan;
			$data['penanganan'] = $penanganan;
			$data['keterangan'] = $this->subtema_m->get($id)->row();
			$this->templateadmin->load('template/tanpa-buttom', 'subtema/tambahkonten', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$this->subtema_m->simpankonten($post);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', strtoupper($post['penanganan']).' berhasil ditambahkan');
			}
			redirect('subtema/detail/' . $post['id']);
		}
	}

	function hapus()
	{
		$previllage = 2;
		check_super_user($this->session->tipe_user, $previllage);

		$id = $this->uri->segment(3);
		$tema_id = $this->uri->segment(5);

		$this->subtema_m->hapus($id);
		$this->session->set_flashdata('danger', 'Berhasil Di Hapus');
		redirect('subtema/list/'.$tema_id);
	}

	public function pencarian()
	{
		//Agar tidak ada form resubmission
		header('Cache-Control: no-cache, must-revalidate, max-age=0');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache');
		
		$post = $this->input->post(null, TRUE);

		if ($post == null) {
			$katakunci = "Ketik Kata Kunci Anda";
		} else {
			$katakunci	= $post['katakunci'];
		}

		$data['menu'] = "Pencarian Materi";
		$data['katakunci'] = $katakunci;
		$data['row'] = $this->subtema_m->pencarian($katakunci);

		$this->templateadmin->load('template/detail', 'subtema/pencarian', $data);
	}

	public function go()
	{
		$id = $this->uri->segment(3);
		redirect("subtema/detail/".$id);
	}

}
