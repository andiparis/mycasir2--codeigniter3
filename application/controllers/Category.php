<?php 
class Category extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('m_category');
	}

	public function index() {
		$data['row'] = $this->m_category->get();
		$this->template->load('template', 'product/category/category_data', $data);
	}

	public function add() {
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
			'page' => 'add',
			'row' => $category
		);
		$this->template->load('template', 'product/category/category_form', $data);	
	}

	public function edit($id) 
	{
		$query = $this->m_category->get($id);

		if($query->num_rows() > 0) {
			$category = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $category
			);
			$this->template->load('template', 'product/category/category_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('category')."';</script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);

		if(isset($_POST['add'])) {
			$this->m_category->add($post);
		} else if(isset($_POST['edit'])) {
			$this->m_category->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('category');
	}

	public function delete($id) {
		$this->m_category->delete($id);
		$error = $this->db->error();

		if($error['code'] != 0) {
			echo "<script>alert('Data tidak dapat dihapus (sudah berelasi)');</script>";
		} else {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		echo "<script>window.location='".site_url('category')."';</script>";
	}
}