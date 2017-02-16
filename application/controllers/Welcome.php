<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("login_model", "login");
		if(!empty($_SESSION['id']))
			redirect('home');
	}

	public function index(){
		if($_POST) {
			$result = $this->login->validate_user($_POST);
			var_dump($result);
			exit();
			if(!empty($result)) {
				$data = [
					'id' => $result->id,
					'email' => $result->email
				];
				$this->session->set_userdata($data);
				redirect('home');
			} else {
				$this->session->set_flashdata('flash_data', 'Email or password is wrong!');
				redirect('login');
			}
		}
		$this->load->view('login');
	}
}
