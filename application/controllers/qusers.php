<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qusers extends CI_Controller {

	public function index()		
	{
		$this->load->view('main');
	}

	public function login(){
		if($this->quser->logpross($this->input->post())){ //user was logged in
			
			redirect('/quotes/show');
		
		}
		else{ //no user was found
			redirect('/');
		}
	}

	public function register(){

		$this->quser->regpross($this->input->post());
		redirect('/');
	}


	
}

