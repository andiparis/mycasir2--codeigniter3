<?php
class Sale extends CI_Controller {

	function __construct() {
		parent::__construct();
		check_not_login();
		$this->load->model('m_sale');
	}

	public function index() {
		$this->load->model(['m_customer', 'm_item']);
		$customer = $this->m_customer->get()->result();
		$item = $this->m_item->get()->result();
		$cart = $this->m_sale->get_cart();
		$data = array(
			'customer' => $customer,
			'item' => $item,
			'cart' => $cart,
			'invoice' => $this->m_sale->invoice_no()
		);
		$this->template->load('template', 'transaction/sale/sale_form', $data);
	}

	public function process() {
		$data = $this->input->post(null, TRUE);

		if(isset($_POST['add_cart'])) {
			$item_id = $this->input->post('item_id');
			$check_cart = $this->m_sale->get_cart(['t_cart.item_id' => $item_id])->num_rows();

			if($check_cart > 0) {
				$this->m_sale->update_cart_qty($data);
			} else {
				$this->m_sale->add_cart($data);
			}

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['edit_cart'])) {
			$this->m_sale->edit_cart($data);

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['process_payment'])) {
			$sale_id = $this->m_sale->add_sale($data);
			$cart = $this->m_sale->get_cart()->result();
			$row = [];

			foreach ($cart as $key => $value) {
				array_push($row, array(
					'sale_id' => $sale_id,
					'item_id' => $value->item_id,
					'price' => $value->price,
					'qty' => $value->qty,
					'discount_item' => $value->discount_item,
					'total' => $value->total
				)
			);
			}
			$this->m_sale->add_sale_detail($row);
			$this->m_sale->delete_cart(['user_id' => $this->session->userdata('userid')]);

			if($this->db->affected_rows() > 0) {
				$params = array("success" => true, "sale_id" => $sale_id);
			} else {
				$params = array("success" => false);
			}
			echo json_encode($params);	
		}
	}

	function cart_data() {
		$cart = $this->m_sale->get_cart();
		$data['cart'] = $cart;
		$this->load->view('transaction/sale/cart_data', $data);
	}

	function on_enter(){
		$post['barcode'] = $this->input->post('barcode');
		$data = $this->m_sale->on_enter($post)->result();
		echo json_encode($data);
	}

	public function cart_delete() {
		if(isset($_POST['cancel_payment']))	{
			$this->m_sale->delete_cart(['user_id' => $this->session->userdata('userid')]);
		} else {
			$cart_id = $this->input->post('cart_id');
			$this->m_sale->delete_cart(['cart_id' => $cart_id]);
		}

		if($this->db->affected_rows() > 0) {
			$params = array("success" => true);
		} else {
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($id) {
		$data = array(
			'sale' => $this->m_sale->get_sale($id)->row(),
			'sale_detail' => $this->m_sale->get_sale_detail($id)->result()
		);
		$this->load->view('transaction/sale/receipt_print', $data);
	}
}