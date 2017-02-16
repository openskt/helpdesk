<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();

		// load the model
		$this->load->model("login_model", "login");

		if(!empty($_SESSION['id']))
			//redirect('home');
			redirect('ticket');
	}

	public function index(){
		if($_POST) {

			// this use loaded model
			$result = $this->login->validate_user($_POST);
			//var_dump($result);

			// if found user and he/she ok to go on
			// save thier infos in session
			if(!empty($result)) {
				$data = [
					'id' 		=> $result->id,
					'email' 	=> $result->email,
					'fname' 	=> $result->fname,
					'lname' 	=> $result->lname,
					'picture'	=> $result->picture
				];
				$this->session->set_userdata($data);

				// go to ticket
				// next version must go to home (dashboard)
				redirect('ticket');
			} else {
				$this->session->set_flashdata('flash_data', 'Email or password is wrong!');
				redirect('login');
			}
		}

		// failed to login
		$this->load->view('login');
	}
}
