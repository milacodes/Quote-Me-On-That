<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model {


	public function addquote($post){
		$this->form_validation->set_rules("quoteby", "Quote By", "trim|required");
		$this->form_validation->set_rules('message', "Message", "trim|required");

		if ($this->form_validation->run() === FALSE) {
			
			$this->session->set_flashdata("error", validation_errors());
			redirect('/quotes');
		}
		else{
			$query = "INSERT INTO quotes (quote, quote_by, created_at, updated_at, posted_by, quser_id) VALUES (?, ?, NOW(), NOW(), ?, ?)";
			$values = array($post["message"], $post['quoteby'], $this->session->userdata("alias"), $this->session->userdata("id"));
			$this->db->query($query, $values);
			return $this->db->insert_id();
		}
	}

	public function get_quotes(){

		$query = "SELECT id, quote, quote_by, posted_by FROM quotes
				WHERE id NOT IN
				(SELECT quote_id FROM favorites WHERE quser_id = ?)";
		
		$values = $this->session->userdata("id");
		return $this->db->query($query, $values)->result_array();
	}

	public function get_faves(){
		
		$query = "SELECT * FROM favorites
				LEFT JOIN qusers ON qusers.id = favorites.quser_id
				LEFT JOIN quotes ON quotes.id = favorites.quote_id
				WHERE qusers.id = ?";
		$values = $this->session->userdata("id");
		return $this->db->query($query, $values)->result_array();
	}

	public function get_info(){
		$query = "SELECT first_name, alias, email FROM qusers WHERE id = ?";
		$values = $this->session->userdata("id");
		return $this->db->query($query, $values)->row_array();
	}

	public function addto($id){
		$query = "INSERT INTO favorites (quote_id, quser_id) VALUES (?, ?)";
		$values = array($id, $this->session->userdata("id"));
		$this->db->query($query, $values);
	}

	public function remove($id){
		$query = "DELETE FROM favorites WHERE quote_id = ? AND quser_id = ?";
		$values = array($id, $this->session->userdata("id"));
		$this->db->query($query, $values);
	}


}