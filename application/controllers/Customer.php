<?php 
class Customer extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('m_customer');
	}

	public function index() {
		$data['row'] = $this->m_customer->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add() {
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->gender = null;
		$customer->phone = null;
		$customer->address = null;
		$data = array(
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);	
	}

	public function edit($id) {
		$query = $this->m_customer->get($id);

		if($query->num_rows() > 0) {
			$customer = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $customer
			);
			$this->template->load('template', 'customer/customer_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('customer')."';</script>";
		}
	}

	public function process() {
		$post = $this->input->post(null, TRUE);

		if(isset($_POST['add'])) {
			$this->m_customer->add($post);
		} else if(isset($_POST['edit'])) {
			$this->m_customer->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil disimpan');</script>";
		}
		echo "<script>window.location='".site_url('customer')."';</script>";
	}

	public function delete($id) {
		$this->m_customer->delete($id);
		
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('customer')."';</script>";
	}
}