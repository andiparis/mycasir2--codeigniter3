<?php
class Dashboard extends CI_Controller {

	public function index() {
		check_not_login(); 
		$this->template->load('template', 'dashboard');
	}
}