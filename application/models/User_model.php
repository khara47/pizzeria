<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	/**
	 *  Name: Home Model.
	 *	Location: ./application/models/user_model.php
	 */
	 
	/**
	 * __construct()
	 *
	 * Constructor loads the required session and database
	 *
	 * @param    N/A
	 * @return   N/A
	 *
	 */
	
	public function __construct() {
		parent::__construct();
		// Load the library session
		$this->load->library('session');
		// Load the database and connectivity
        $this->load->database();
    }
    
	/**
	 * login()
	 *
	 * Checks eamil and pass match, if match then set user_id to session for user loggedin
	 *
	 * @param    (array)$data
	 * @return   Boolean
	 *
	 */	
	
	public function login($data) {
		// Select user_id
		$this->db->select('ID');
		// From user table
		$this->db->from('users');
		// Where email is match
		$this->db->where('email', $data['email']);
		// Where email is match
		$this->db->where('password', md5($data['password']));
		// Encrypt Password is also match
		$query = $this->db->get();

		//If record found 
		if($query->num_rows() > 0){
				// Set user_id to session		
				$this->session->set_userdata('user_id', $query->row()->ID);						
				return true;
//				echo "user found";
		} else{
//			echo "user not found";
			return false;	 
		}
	}
	
	/**
	 * is_user_logged_in()
	 *
	 * Checks user is logged in or not
	 *
	 * @param    N/A
	 * @return   Boolean
	 *
	 */	
	
	public function is_user_logged_in() {
		// Check if user_id is set to session
		if($this->session->userdata('user_id') && $this->session->userdata('user_id') > 0) { 
			return true;
		} else {
			// If user_id not set to session
			return false;
		}
	}
		
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
