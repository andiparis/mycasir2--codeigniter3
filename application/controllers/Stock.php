<?php 
class Stock extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model(['m_item', 'm_supplier', 'm_stock']);
	}

	public function stock_in_data() {
		$data['row'] = $this->m_stock->get_stock_in()->result();
		$this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
	}

	public function stock_in_add() {
		$item = $this->m_item->get()->result();
		$supplier = $this->m_supplier->get()->result();
		$data = ['item' => $item, 'supplier' => $supplier];
		$this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
	}

	public function stock_in_delete() {
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->m_stock->get($stock_id)->row()->qty;
		$data = ['qty' => $qty, 'item_id' => $item_id];
		$this->m_item->update_stock_out($data);
		$this->m_stock->delete($stock_id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Stock-In berhasil dihapus');
		}
		redirect('stock/in');
	}

	public function stock_out_data() {
		$data['row'] = $this->m_stock->get_stock_out()->result();
		$this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
	}

	public function stock_out_add() {
		$item = $this->m_item->get()->result();
		$data = ['item' => $item];
		$this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
	}

	public function stock_out_delete() {
		$stock_id = $this->uri->segment(4);
		$item_id = $this->uri->segment(5);
		$qty = $this->m_stock->get($stock_id)->row()->qty;
		$data = ['qty' => $qty, 'item_id' => $item_id];
		$this->m_item->update_stock_in($data);
		$this->m_stock->delete($stock_id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Stock-Out berhasil dihapus');
		}
		redirect('stock/out');
	}
	
	public function process() {
		if(isset($_POST['in_add'])) {
			$post = $this->input->post(null, TRUE);
			$this->m_stock->add_stock_in($post);
			$this->m_item->update_stock_in($post);

			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Stock-In berhasil disimpan');
			}
			redirect('stock/in');
		} else if(isset($_POST['out_add'])){
			$post = $this->input->post(null, TRUE);
			$this->m_stock->add_stock_out($post);
			$this->m_item->update_stock_out($post);
			
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Stock-Out berhasil disimpan');
			}
			redirect('stock/out');
		}
	}
}