<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {



	public function contribute(){
		
		$test = $this->quote->addquote($this->input->post());
		redirect('/quotes/show');
	}

	public function show(){
		

		$quos = $this->quote->get_quotes();
		
		$faves = $this->quote->get_faves();
		
		$uzah = $this->quote->get_info();
		
		$this->load->view("quotespage", array("uzah" => $uzah, "quos" => $quos, "faves" => $faves));
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('/');
	}

	public function addto($id){//id grabbed from $quo['id'] on quotespage button
		
		$this->quote->addto($id);
		redirect('/quotes/show/');

	}

	public function remove($id){
		
		$this->quote->remove($id);
		redirect('/quotes/show');
	}
	
}