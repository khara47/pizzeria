<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Home for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/
	 *
	 */
	 
	/**
	 * __construct()
	 *
	 * Constructor loads the required models, session and also logout the user
	 *
	 * @param    N/A
	 * @return   N/A
	 *
	 */	

	public function __construct(){
		parent::__construct();
		// Load URL Helper
		$this->load->helper('url');
		// Load session library
		$this->load->library('session');
		// Load session User_model
		$this->load->model('User_model');
		// Check is user logged in
		$logged_in = $this->User_model->is_user_logged_in();
		
		if ($logged_in == true) {
			// Unset the user_id from SESSION
     		$this->session->unset_userdata('user_id');
		}
	}

    /**
	 * index()
	 *
	 * Indexed the home page
	 *
	 * @param    N/A
	 * @return   N/A
	 *
	 */	

	public function index()
	{
		// Load home view file
		$this->load->view('home');
	}

	
	/**
	 * login_user()
	 *
	 * Login the user with email and password
	 *
	 * @param    POST perameters, i.e email and password is required
	 * @return   N/A
	 *
	 */	
	
	public function login_user() {
		$data['email'] 		= 	$this->input->post('email'); // POST eamil
		$data['password'] 	= 	$this->input->post('password'); // POST password

		$error = false; $message = false;
		// Empty checks
		if(trim($data['email']) == '') {
			$message = "Please enter your email";
		} elseif(trim($data['password']) == '') {
			$message = "Please enter your password";
		}
		// Eamil validate checks	
		if(!$message) {
			$message = (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))? 'Email is not valid': false;
		}
		if($message) {
			// sets validation error true
			$error = true; 
		}
		else {
			// Logged in the user 
			$is_authorized = $this->User_model->login($data);
			if($is_authorized) {
				// If user successfully login
				$message = "Login Successfully!";  
			} else {
				// If user email or password set error true
				$error = true; 
				$message = "Email or password do not match!";
			}
		} 
		// Set response	
		$response = array('error' => $error, 'message' => $message);
		header('Content-Type: application/json');
    	echo json_encode( $response );
	}

}
