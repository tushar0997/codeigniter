<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	function __construct()
	{
		parent:: __construct();
		$this->load->Model('Model');

	}
	public function reg()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','First Name','required');

		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','Email',
			'trim|required|valid_email');

		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');

		$this->form_validation->set_rules('dob','DOB','required');

				if ($this->form_validation->run() == FALSE)
                {
                     $this->load->view('register');   
                }
                else
                {
                	$data['username'] = $this->input->post('username');
                    $data['fname'] = $this->input->post('fname');
					$data['lname'] = $this->input->post('lname');
					$data['email'] = $this->input->post('email');
					$data['password'] = $this->input->post('password');
					$data['dob'] = $this->input->post('dob');

					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|png|jpeg|gif';

				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('file'))
				{
					echo $this->upload->display_errors();
				}
                else
                {
                    $data['image'] = $this->input->post();
                    $info = $this->upload->data();

                    $temp_name = $info["file_name"];
                    $data['image'] = $temp_name;

                    $ins = 	$this->Model->insert("student",$data);
                    	

                    if($ins)
                    {
                    	echo "data inserted";
                    }    
                    else
                    {
                    	echo "error";
                    }
                }


                }	
	}
	public function login()
	{
		$this->load->view('login');	
	}
	public function loginpro()
	{
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');

		$login = $this->Model->select_where('student',$data);

		if(count($login == 1))
		{
			$this->load->library('session');

			foreach ($login as $res) 
			{
				$sess = array(
					"id" => $res->id,
					"username"=>$res->username,
					"fname"=>$res->fname,
					"lname"=>$res->lname,
					"email"=>$res->email,
					"password"=>$res->password,
					"dob"=>$res->dob

				);
				$this->session->set_userdata($sess);

				redirect('User/profile');
				//echo $this->session->userdata("username");
			}
		}
		else
		{
			 
			echo "error";
		}

	}
	public function profile()
	{
		$this->load->view('profile');
	}
	public function logout()
	{
		$this->session->sess_destroy();
        redirect('User/login');
	}
	public function register1()
	{
		$this->load->view('reg');
	}
}
