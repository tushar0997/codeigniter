<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('model');
	}

	public function index()
	{
		$data['fetch_user'] = $this->model->getUser();
		// print_r($data);
		$this->load->view('admin/registration', $data);
	}

	public function add()
	{
		$this->load->view('admin/userAdd');
	}

	public function submit()
	{
		$data['fname'] = $this->input->post('fname');
		$data['lname'] = $this->input->post('lname');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['date'] = $this->input->post('dob');
		$data['gender'] = $this->input->post('gender');
		$h1 = $this->input->post('hobby');
		$data['hobby'] = implode(',',$h1); 		
		$insert = $this->model->submit($data);

		if ($insert) {
			$this->session->set_flashdata('success_msg', 'User added successfully');
		}
		else{
			$this->session->set_flashdata('error_msg', 'Failed to add user.');
		}
		$this->index();
	}


	public function edit($id)
	{
		$data['fetch_user'] = $this->model->getUserById($id);
		$this->load->view('admin/userEdit', $data);	
	}

	public function update() 
	{
		$id = $this->input->post('id');
		$where = array('id' => $id);

		// print_r($where); die();

		$data['fname'] = $this->input->post('fname');
		$data['lname'] = $this->input->post('lname');
		$data['email'] = $this->input->post('email');
		
		$data['hobby'] = implode(',',$this->input->post('hobby'));
		$data['gender'] = $this->input->post('gender');

		$update = $this->model->updateUser( 'user_reg' ,$data, $where);	
	
		if ($update) {
			$this->session->set_flashdata('success_msg', 'User updated successfully');
		}
		else{
			$this->session->set_flashdata('error_msg', 'Failed to update user.');
		}
		$this->index();	
	}

	public function delete($id)
	{
		$delete = $this->model->deleteUser($id);
	
		if ($delete) {
			$this->session->set_flashdata('success_msg', 'User deleted successfully');
		}
		else{
			$this->session->set_flashdata('error_msg', 'Failed to delete user.');
		}
		$this->index();
	}


}
