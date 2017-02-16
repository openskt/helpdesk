<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login1 extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model("login_model", "login");
		if(!empty($_SESSION['id']))
			redirect('home');
	}
	public function index(){
		if($_POST) {
			$result = $this->login->validate_user($_POST);
			//var_dump($result);
			//exit();
			if(!empty($result)) {
				$data = [
					'id_user' => $result->id,
					'email' => $result->email
				];
				$this->session->set_userdata($data);
				redirect('home');
			} else {
				$this->session->set_flashdata('flash_data', 'Email or password is wrong!');
				redirect('login1');
			}
		}
		$this->load->view('login1');
	}
}
