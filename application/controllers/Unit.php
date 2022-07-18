<?php 
class Unit extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('m_unit');
	}

	public function index() {
		$data['row'] = $this->m_unit->get();
		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	public function add() {
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('template', 'product/unit/unit_form', $data);	
	}

	public function edit($id) {
		$query = $this->m_unit->get($id);

		if($query->num_rows() > 0) {
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
			);
			$this->template->load('template', 'product/unit/unit_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('unit')."';</script>";
		}
	}

	public function process() {
		$post = $this->input->post(null, TRUE);

		if(isset($_POST['add'])) {
			$this->m_unit->add($post);
		} else if(isset($_POST['edit'])) {
			$this->m_unit->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('unit');
	}

	public function delete($id) {
		$this->m_unit->delete($id);
		$error = $this->db->error();
		
		if($error['code'] != 0) {
			echo "<script>alert('Data tidak dapat dihapus (sudah berelasi)');</script>";
		} else {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		echo "<script>window.location='".site_url('unit')."';</script>";
	}
}