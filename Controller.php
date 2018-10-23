<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {	

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
	public function registration()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('reg');			
		}
		else
		{
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			
			
			$data['gender'] = $this->input->post('gender');
			$h1 = $this->input->post('hby');
			$data['hobbies'] = implode(',',$h1);
			// echo '<pre>';
			// print_r($data);
			// exit();
			$data['email'] = $this->input->post('email');	
			$data['password'] = md5($this->input->post('password'));
			$time = date_default_timezone_set('Asia/Kolkata');
  			$date['reg_time'] = date('Y-M-D H:i:s',$time);

  			

				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';

				$this->load->library('upload',$config);

			if(!$this->upload->do_upload('image_file'))
			{
				echo $this->upload->display_errors();
			}
			else
			{
				$data['image'] = $this->input->post();
				$info = $this->upload->data();

				$image_path = $info["file_name"];
				$data['image'] = $image_path;
				//unset($data['submit']);
				$ins = 	$this->Model->insert("reg",$data);
				if($ins)
				{
					redirect('Controller/showdata');
				}
				else
				{
					echo "error";
				}
			}
		}

	}
	 
	public function showdata()
	{
		$this->load->library('pagination');

				//configuration variables for pagination 
	    $config['base_url']   = site_url('Controller/showdata');
	    //Get the total student count
        $config['total_rows'] = $this->Model->count_all();
        //Records per page
        $config['per_page']   = 3;
        //label of pagination next link
        $config['next_link']  = 'Next';
        //label of pagination previous link
        $config['prev_link']  = 'Previous';
        $this->pagination->initialize($config);

         $students = $this->Model->getdata($config['per_page'],$this->uri->segment(3));
        //load view for display
      $this->load->view('showdata',array('result' => $students));   
              
	}
	public function search()
	{


			//echo "hi";
		 $data = $this->input->post('search');
		 $s = $this->Model->searchdata("reg",$data);

		   echo "<table class='table table-striped custab'  border='0px solid black' > <tr>  <th>IMAGE</th>
        <th>ID</th>
        <th>FIRSTNAME</th>
        <th>LASTNAME</th>
        <th>GENDER</th>
        <th>HOBBIES</th>
        <th>EMAIL-ID </th>
        <th>PASSWORD</th>
        ";

        
			foreach ($s as $res) { ?>
				 
				 
        <tr>
        <td> <img src="<?php echo base_url()."uploads/". $res->image; ?>"style="height: 50px;width: 70px;margin-left: 1px;"/>  </td>
        <td> <?php echo  $res->id  ?></td>
        <td> <?php echo $res->fname ?></td>
        <td> <?php echo $res->lname ?></td>
        <td> <?php echo $res->gender ?></td>
        <td> <?php echo $res->hobbies ?></td>
        <td> <?php echo $res->email ?></td>
        <td> <?php echo $res->password ?></td>


        </tr>

      <?php } ?>


        

         </table>



		

 <?php 	
	}
	public function delete($id)
	{
		$where = array("id"=>$id);
		$del = $this->Model->delete_data("reg",$where);


		if($del)
		{
			redirect('Controller/showdata');
		}
		else
		{
			echo "error";
		}
	}
	public function edit($id)
	{
		$where = array("id"=>$id);
		$data['edit'] = $this->Model->select_where("reg",$where);
		$this->load->view('edit',$data);

	}
	public function update($id)
	{
			$data['fname'] = $this->input->post('fname');
			$data['lname'] = $this->input->post('lname');
			$data['gender'] = $this->input->post('gender');
			$h1 = $this->input->post('hby');
			$data['hobbies'] = implode(',',$h1);
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');


			$where = array("id"=>$id);
			$update = $this->Model->update_data("reg",$data,$where);

			if($update)
			{
				redirect('Controller/showdata');
			}
			else
			{
				echo "error";
			}
	}

	
}
