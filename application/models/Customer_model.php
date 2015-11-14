<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model {

	/**
	 *  Name: Cusomer Model.
	 *	Location: ./application/models/Customer_model.php
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
	 * all_orders()
	 *
	 * get all orders detail
	 *
	 * @param    (array)$data
	 * @return   Records 
	 *
	 */	
	
	public function all_orders($status = null) {
		$data = array();

		$this->db->select(' ');
		$this->db->from('order_detail');
		if (isset($status)) { /*Status Check*/
			$this->db->where('order_status',Null);
		}

		$query= $this->db->get();

		 if ($query->num_rows() > 0)
		    {
		        foreach ($query->result() as $row)
		        {
		            $data[] = $row;
		        }
		    }

		    $query->free_result();
		    return $data;
	}

	/**
	 * get_all_orders()
	 *
	 * get single user's orders detail
	 *
	 * @param    (array)$data
	 * @return   Records (rows)
	 *
	 */	
	
	public function get_all_orders($user_id) {
		$data = array();
		$this->db->select('');
		$this->db->from('order_detail');
		$this->db->where('order_detail.Id',$user_id);
		$query= $this->db->get();
		 if ($query->num_rows() > 0)
		    {
		        foreach ($query->result() as $row)
		        {
		            $data[] = $row;
		        }
		    }
		    $query->free_result();
		    return $data;
	}

	/**
	 * complete_order()
	 *
	 * complete order of selected user
	 *
	 * @param    (array)$data
	 * @return   boolen
	 *
	 */	
	
	public function complete_order($ord_id) {

		$saved_order= $this->db->query("SELECT order_detail.Id FROM order_detail WHERE order_detail.Id = $ord_id ");
		if ($saved_order->num_rows() > 0) {

			//$this->db->set('status',1);
			$data 	= array('order_status'=>1);	//update oreder status 
			$this->db->where('id', $ord_id);
			$this->db->update('order_detail',$data);
			return $this->db->affected_rows();	//return effected count
		}else{
			return false;
		}
	}

	
	/**
	 * delete_order()
	 *
	 * delete order
	 *
	 * @param    (array)$data
	 * @return   boolen
	 *
	 */	
	
	public function delete_order($ord_id) {
		$this->db->where('id', $ord_id);
		$this->db->delete('order_detail');
		return $this->db->affected_rows();
	}


	/**
	 * update_order()
	 *
	 * Update the order information
	 *
	 * @param    (array)$data
	 * @return   Affected order_id
	 *
	 */	
	 
	public function update_order($data) {

		$this->db->where('Id', $data['Id']);
		$this->db->update('order_detail', $data); 
		return $this->db->affected_rows();

	}

	/**
	 * is_email_exist()
	 *
	 * Checks email is already exists or not
	 *
	 * @param    (email string)$email and (boolean)$update
	 * @return   Affected user_id
	 *
	 */	
	
	public function is_email_exist($email, $update, $customer_id = null) {
		if($update) {
			// Check user email is exists(expect logged in user) while we update the user infomation
			$query = $this->db->get_where('site_users', array('user_email' => $email, 'ID !=' => $customer_id));	
		} else {
			// Check user email is exists while we update the user infomation
			$query = $this->db->get_where('site_users', array('user_email' => $email));
		}	
		return ($query->num_rows() > 0)? true : false;	
	}


	/**
	 * get_order_data()
	 *
	 * Get the particular order's data
	 *
	 * @param    $ord_id
	 * @return   Boolean false or Class objects
	 *
	 */	
	
	public function get_order_data($ord_id) {
		$this->db->select(' ');
		$this->db->from('order_detail');
		$this->db->where('Id', $ord_id);
		$query= $this->db->get();

		 if ($query->num_rows() > 0) {
			    return $query->row();
		    }
	}

}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */
