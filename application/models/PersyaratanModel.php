<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersyaratanModel extends CI_Model
{
	private $table = 'persyaratan';

	public function get_all()
	{
		return $this->db->get($this->table)->result();
	}

	public function insert()
	{
		$data = [
			'nama_persyaratan' => $this->input->post('nama_persyaratan'),
			'keterangan' => $this->input->post('keterangan'),
		];
		$this->db->insert($this->table, $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan', 'Data persyaratan berhasil ditambahkan!');
			$this->session->set_flashdata('status', true);
		} else {
			$this->session->set_flashdata('pesan', 'Data persyaratan gagal ditambahkan!');
			$this->session->set_flashdata('status', false);
		}
	}

	public function update()
	{
		$data = [
			'nama_persyaratan' => $this->input->post('nama_persyaratan'),
			'keterangan' => $this->input->post('keterangan'),
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update($this->table, $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan', 'Data persyaratan berhasil diubah!');
			$this->session->set_flashdata('status', true);
		} else {
			$this->session->set_flashdata('pesan', 'Data persyaratan gagal diubah!');
			$this->session->set_flashdata('status', false);
		}
	}

	public function get_by_id($id)
	{
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan', 'Data persyaratan berhasil dihapus!');
			$this->session->set_flashdata('status', true);
		} else {
			$this->session->set_flashdata('pesan', 'Data persyaratan gagal dihapus!');
			$this->session->set_flashdata('status', false);
		}
	}
}
