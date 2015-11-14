<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	/**
	 * Dashboard controller.
	 *
	 * Maps to the following URL
	 *	
	 */
	 
	/**
	 * __construct()
	 *
	 * Constructor loads the required models, helper url and also checks is user logged in or not
	 *
	 * @param    N/A
	 * @return   N/A
	 *
	 */
	 
	public function __construct() {
		parent::__construct();
		// Load helper url
		$this->load->helper('url');
		// Load library session
		$this->load->library('session');
		// Load User_model
		$this->load->model('User_model');
		// Check is user logged in
		$logged_in = $this->User_model->is_user_logged_in();
		// If user not logged in redirected to home page
		if ($logged_in == FALSE) {
     		redirect('/', 'refresh');
		}
    }
	
	/**
	 * index()
	 *
	 * Indexed the dashboard page
	 *
	 * @param    N/A
	 * @return   N/A
	 *
	 */	
	
	public function index() {
		
		// Declare $data type
		$data = array();
		// Set the page title	
		$data['page_title'] = "Dashboard"; 
		// Load header view file
		$this->load->view('common/header',$data);
		// Load dashboard view file
		$this->load->view('dashboard');
		// Load footer view file
		$this->load->view('common/footer');
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
