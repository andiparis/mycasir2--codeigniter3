<?php 
class M_report extends CI_Model {

	public function get($id=null) {	
		$query = $this->db->query("SELECT * FROM t_sale ORDER BY date ASC");
		return $query->result();
	}

	public function filter($post){
		$post1 = $post['dari_tanggal'];
		$post2 = $post['sampai_tanggal'];
		$query = $this->db->query("SELECT * FROM t_sale WHERE date >='$post1' AND date <='$post2' ORDER BY date ASC");
		return $query;
	}
}