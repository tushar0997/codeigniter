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
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function register()
	{
		$data['city'] = $this->Model->select_all("city");
		$this->load->view('register',$data);
	}
	public function stor_data()
	{
		$data['fname'] = $this->input->post('fname');
		$data['gender']= $this->input->post('gender');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['city'] = $this->input->post('city');
		$h1 = $this->input->post('hby');
		$data['hobbies'] = implode(',',$h1); 
		date_default_timezone_set('Asia/Kolkata'); 
		$data['created_at'] = date('Y-m-d H:i:s');

		$config['upload_path']          = './uploaded/';
        $config['allowed_types']        = 'gif|jpg|png';
                
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image'))
        {
            echo $this->upload->display_errors();   
        }
        else
        {
        	$data['image'] = $this->input->post();
        	$info = $this->upload->data();

        	$image_path = $info["file_name"];
        	$data['image'] = $image_path;

        	$ins = $this->Model->insert('reg',$data);

        	if($ins)
        	{
        		echo "inserted";
        	}
        	else
        	{
        		echo "error";
        	}
        }
	}
	public function showdata()
	{

		$data['showdata'] = $this->Model->join_table("reg","city","reg.city = city.city_id");
		$this->load->view('showdata',$data);
		
	}
	public function multi_del()
	{
		$chk = $this->input->post('chk');
		//$ctn = count($chk);
		//print_r($ctn);
		 
		/* first method using foreach loop */

		 foreach ($chk as $i) {
		 	$where = array("id"=>$i);
		 	$del = $this->Model->delete("reg",$where);
		 }

		 /* second method using for loop */

		// for ($i=0; $i<$ctn; $i++) 
		// { 
		// 	 $where = array("id"=>$chk[$i]);
		// 	 $data = $this->Model->delete("reg",$where);
		// }

		redirect('User/showdata');
	}
	public function delete($id)
	{
		$where = array("id"=>$id);

		$delete = $this->Model->delete("reg",$where);

		if($delete)
		{
			redirect("User/showdata");
		}
		else
		{
			echo "error";
		}
	}
	public function edit($id)
	{
		$data['city'] = $this->Model->select_all("city");
		$where = array("id"=>$id);
		$data['edit'] = $this->Model->select_where("reg",$where);

		$this->load->view('edit',$data);

	}
	function edit_data($id)
	{
		$where = array("id"=>$id);

		$data['fname'] = $this->input->post('fname');
		$data['gender']= $this->input->post('gender');
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['city'] = $this->input->post('city');
		$h1 = $this->input->post('hby');
		$data['hobbies'] = implode(',',$h1);
		date_default_timezone_set('Asia/Kolkata'); 
		$data['updated_at'] = date('Y-m-d H:i:s'); 

		$config['upload_path']          = './uploaded/';
        $config['allowed_types']        = 'gif|jpg|png';
                
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image'))
        {
            echo $this->upload->display_errors();   
        }
        else
        {
        	$data['image'] = $this->input->post();
			$info = $this->upload->data();

			$image_path = $info["file_name"];
			$data['image'] = $image_path;

			$upd = $this->Model->update("reg",$data,$where);

			if($upd)
			{
				redirect("User/showdata");
			}
			else
			{
				echo "error";
			}
		}
	}
	public function username()
	{
		$data['fname'] = $this->Model->select_all("reg");
		$this->load->view('username',$data);
	}
	public function fetch_data()
	{
		$id = $this->input->post('user');
		$where = array("id"=>$id);

		$user = $this->Model->select_where("reg",$where);
		//print_r($data);

		echo "<table>
		 	<tr>
		 	<th>id</th>
		 	<th>fname</th>
		 	<th>gender</th>
		 	<th>city</th>
		 	<th>email</th>
		 	<th>password</th>
		 	<th>hobbies</th>
		 	<th>image</th>
		 	</tr>
		 	</table>";

		 foreach ($user as $res) {
		 	echo "<table>
		 	<tr>
		 	<td>$res->id</td>
		 	<td>$res->fname</td>
		 	<td>$res->gender</td>
		 	<td>$res->city</td>
		 	<td>$res->email</td>
		 	<td>$res->password</td>
		 	<td>$res->hobbies</td>
		 	<td><img src='<?php echo base_url() ?>uploaded/<?php echo $res->image ?>' width='50px' height='50px'></td>
		 	</tr>
		 	</table>";
		 }
	}
	public function product()
	{
		$data['cat'] = $this->Model->select_all('category');
		$this->load->view('product',$data);
	}
	public function stor_product()
	{
		//echo "hi"; die();
		$data['p_name'] = $this->input->post('name');
		$data['p_price'] = $this->input->post('price');
		$data['p_detail'] = $this->input->post('details');
		$data['p_category'] = $this->input->post('cat');

		//print_r($data);die();

				$config['upload_path']          = './product/';
                $config['allowed_types']        = 'gif|jpg|png';
                

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('product', $error);
                }
                else
                {
                	$data['p_image'] = $this->input->post();
                	$info = $this->upload->data();

                	$image_path = $info["file_name"];
                	$data['p_image'] = $image_path;

                	$ins = $this->Model->insert("product",$data);

                	if($ins)
                	{
                		echo "inserted";
                	}
                	else
                	{
                		echo "error";
                	}
                }
	}
	public function showproduct()
	{
		$data['product'] = $this->Model->select_all("product");
		$this->load->view('showproduct',$data);
	}
	public function ins_data()
	{
		echo "hi";
	}

}
