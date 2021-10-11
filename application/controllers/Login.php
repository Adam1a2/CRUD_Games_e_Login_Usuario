<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data["title"] = "Login - CodeIgniter";
		$this->load->view('pages/login', $data);
	}

	public function verify()
	{
		$this->load->model("login_model");
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$user = $this->login_model->verify($email, $password);

		if($user){
			$this->session->set_userdata("logged_user", $user);
			echo '<script type="text/javascript">
				window.location = "http://localhost:70/Crud_CI/dashboard/"
			</script>';
		}else{
			echo '<script type="text/javascript">
          	 	window.location = "http://localhost:70/Crud_CI/login/"
      		</script>';
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("logged_user");
		echo '<script type="text/javascript">
          	window.location = "http://localhost:70/Crud_CI/login/"
      	</script>';
	}
	
}
