<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Customer extends CI_Controller {

	/**
	 * Customer controller.
	 *
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
		// Load Customer_model
		$this->load->model('Customer_model');
		// Check is user logged in
		$logged_in = $this->User_model->is_user_logged_in();
		// If user not logged in redirected to home page
		if ($logged_in == FALSE) {
     		redirect('/', 'refresh');
		}
		$this->root_path =str_replace('admin', '' ,$_SERVER['DOCUMENT_ROOT'] );	//root path 
    }
	
	/**
	 * index()
	 *
	 * Indexed the Customer page
	 *
	 * @param    N/A
	 * @return   N/A
	 *
	 */	
	
	public function index() {
		
		// Declare $data type
		$data = array();
		// Set the page title	
		$data['page_title'] = "Orders";

		//show uncompleted orders only
		$status =$this->input->get('s');
		if(isset($status)){
			$status= 0;
		}
		// Get all customers listing
		$data['order_data'] = $this->Customer_model->all_orders($status);
		// Load header view file
		$this->load->view('common/header',$data);
		// Load Order Listing file
		$this->load->view('order_listing',$data);
		// Load footer view file
		$this->load->view('common/footer');
	}
	

	/**
	 * complete()
	 * complete particular order
	 *
	 * @param    $ord_id
	 * @return   N/A
	 *
	 */	
	
	public function complete($ord_id) {
		//complete order
		$response= $this->Customer_model->complete_order($ord_id);
		if($response){
     		redirect('/customer/', 'refresh');	//redirect to order listing page
		}else{
     		redirect('/customer/', 'refresh');	//if update again 
		}
	}


	/**
	 * delete()
	 * delete order
	 *
	 * @param    $ord_id
	 * @return   N/A
	 *
	 */	
	
	public function delete($ord_id) {
		//delete user prescription
		$response= $this->Customer_model->delete_order($ord_id);
		if($response){
     		redirect('/customer/', 'refresh');
		}
	}


	/**
	 * edit()
	 * edit order
	 *
	 * @param    N/A
	 * @return   N/A
	 *
	 */	
	public function edit($ord_id){
		// Declare $data type
		$data = array();
		// Set the page title	
		$data['page_title'] = "Edit Order"; 
		
		$data['current_order'] = $this->Customer_model->get_order_data($ord_id);

		// Load header view file
		$this->load->view('common/header',$data);
		// Load Order view file
		$this->load->view('order_view');
		// Load footer view file
		$this->load->view('common/footer');
	}

	/**
	 * update()
	 *
	 * Update the order information
	 *
	 * @param    POST perameters required
	 * @return   json
	 *
	 */	
	
	public function update($ord_id) {
		$data = array();
		// Define error and message	
		$error = false; $message = false;
			$data['Id']					= 	$ord_id; // Set customer_id 
			$data['size'] 				= 	$this->input->post('size'); // POST user_email
			$data['filling'] 			= 	$this->input->post('filling'); 	// POST fname
			$data['stuffed_crust'] 		= 	$this->input->post('stuffed_crust'); 	// POST lname
			$data['tax_location']		= 	$this->input->post('tax_location'); 	// POST lname
			$data['name'] 				= 	$this->input->post('name'); 	  // POST fname 
			$data['address'] 			= 	$this->input->post('address'); // POST fname 
			$data['city'] 				= 	$this->input->post('city'); // POST fname 
			$data['postal_code'] 		= 	$this->input->post('postal_code'); // POST fname 
			$data['email'] 				= 	$this->input->post('email'); // POST fname 
			$data['phone'] 				= 	$this->input->post('phone'); // POST fname 
			$data['order_status'] 		= 	$this->input->post('order_status'); // POST fname 
			
			// Validation the POST information
			$message = $this->validate($data, true);
			if($message) {
				$error = true; 
				$bg='bg-red';
			} else {
				// If data is valid then update the order information
				$user_id = $this->Customer_model->update_order($data);
				$bg='bg-green';
				$message = "Successfully updated!";  

			}

		// Set flash data 
		$this->session->set_flashdata('add_user', '<div class="'.$bg.' info-msg">'.$message.'</div>');
		redirect("customer/edit/".$ord_id);
	}

	/**
	 * validate()
	 *
	 * Validate the order information
	 *
	 * @param    (array)$data and (boolean)$update
	 * @return   string error message or boolean false
	 *
	 */
	
	private function validate($data, $update=false) {
		// Define message	
		$message = false;
		// Empty checks 

		//Message Check
		if(!$message){
			if(trim($data['email']) == '') {
				$message = "Email is required";
			} elseif(trim($data['name']) == '') {
				$message = "Name is required";			
			} elseif(trim($data['address']) == '') {
				$message = "Address is required";
			} elseif(trim($data['city']) == '') {
				$message = "City is required";
			} 
			
			if(!$message){	//message another check

				if(!$message){ //inner check start
					if(trim($data['email'] != '')) {
						// Valid email checks
						$message = (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))? 'Email is not valid': false;
					}
				}//inner check

			}//another check
		}//message check end
		return $message;
	}

}

/* End of file customer.php */
/* Location: ./application/controllers/customer.php */
