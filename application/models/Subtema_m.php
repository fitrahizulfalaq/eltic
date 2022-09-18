<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subtema_m extends CI_Model
{

	public function get($id = null)
	{
		$this->db->from('tb_subtema');
		if ($id != null) {
			$this->db->where('id', $id);
		}
		$this->db->order_by('deskripsi', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getTema($id = null)
	{
		$this->db->from('tb_subtema');
		if ($id != null) {
			$this->db->where('tema_id', $id);
		}
		$this->db->order_by('deskripsi', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getKelas($id = null)
	{
		$this->db->from('tb_tema');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		$params['id'] =  "";
		$params['tema_id'] =  $post['tema_id'];
		$params['deskripsi'] =  $post['deskripsi'];
		$params['created'] =  date("Y:m:d:h:i:sa");
		$this->db->insert('tb_subtema', $params);
	}

	function simpanVideo($post)
	{
		$params['id'] =  $post['id'];
		$params['video'] =  $post['video'];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_subtema', $params);
	}

	function simpankonten($post)
	{
		$params['id'] =  $post['id'];
		$params[$post['penanganan']] =  $post[$post['penanganan']];

		$this->db->where('id', $params['id']);
		$this->db->update('tb_subtema', $params);
	}

	function hapus($id)
	{
		$this->db->where('subtema_id', $id);
		$this->db->delete('tb_penilaian');

		$this->db->where('subtema_id', $id);
		$this->db->delete('tb_riwayat_jawaban');

		$this->db->where('subtema_id', $id);
		$this->db->delete('tb_soal');

		$this->db->like('keterangan', $id);
		$this->db->delete('tb_neraca');

		$this->db->where('id', $id);
		$this->db->delete('tb_subtema');
	}

	function pencarian($katakunci)
	{
		$this->db->from('tb_subtema');
		$this->db->like('deskripsi', $katakunci, 'both');
		$query = $this->db->get();
		return $query;
	}

}
