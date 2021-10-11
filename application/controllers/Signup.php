<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{
		$data["title"] = "Signup - CodeIgniter";
		$this->load->view('pages/signup', $data);
	}

	public function save()
	{
		$this->load->model('users_model');
		$user = array(
			"name" => $_POST["name"],
			"country" => $_POST["country"],
			"email" => $_POST["email"],
			"password" => md5($_POST["password"]),
		);

		$this->users_model->save($user);
		echo '<script type="text/javascript">
           window.location = "http://localhost:70/Crud_CI/login/"
      	</script>';
	}
	
}
