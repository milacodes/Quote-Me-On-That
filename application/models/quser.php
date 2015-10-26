<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quser extends CI_Model {

	public function logpross($post){
		$this->form_validation->set_rules("email", "Email Address", "trim|required");
		$this->form_validation->set_rules('password', "Password", "trim|required");

		if($this->form_validation->run() === FALSE){
			$this->session->set_flashdata("errors", validation_errors());
		}

		else{
			//check if user info is in db.
			$query = "SELECT * from qusers where email = ? AND password = ?";
			$values = array($post['email'], $post['password']);
			$person = $this->db->query($query, $values)->row_array();

			if(empty($person)){
				$this->session->set_flashdata("errors", "Your email or password is incorrect. Try again.");
				return false;
			}
			else{
				$this->session->set_userdata("id", $person['id']);
				$this->session->set_userdata("alias", $person['alias']);
		
				return true;
			}
		}
	}

	public function regpross($post){
		
		//validate
		$this->form_validation->set_rules("email", "Email Address", "trim|required|valid_email|is_unique[qusers.email]");
		$this->form_validation->set_rules('first', "First Name", "trim|required");
		$this->form_validation->set_rules('alias', "Alias", "trim|required");
		$this->form_validation->set_rules('password', "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules('confirm', "Password Confirmation", "trim|required|matches[password]");
		$this->form_validation->set_rules('month', "Month", "trim|required");
		$this->form_validation->set_rules('day', "Day", "trim|required");
		$this->form_validation->set_rules('year', "Year", "trim|required");

		if ($this->form_validation->run() === FALSE) {
			
			$this->session->set_flashdata("errors", validation_errors());
			redirect('/');
		}
		else{
			$this->session->set_flashdata("success", "You've completed registration. Now log in!");
			$date = $post['year']."-".$post['month']."-".$post['day'];
			$query = "INSERT INTO qusers (first_name, alias, email, password, birthday, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
			$values = array($post["first"], $post["alias"], $post["email"], $post["password"], $date);
			$this->db->query($query, $values);
		}
		
	}

	public function get_info(){
		$query = "SELECT first_name, alias, email FROM qusers WHERE id = ?";
		$values = $this->session->userdata("id");
		return $this->db->query($query, $values)->row_array();
	}
}