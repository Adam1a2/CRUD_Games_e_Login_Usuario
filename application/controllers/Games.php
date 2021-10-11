<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("games_model");
		permission();
	}

	public function index()
	{
		$data["games"] = $this->games_model->index();
		$data["title"] = "Games - CodeIgniter";

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function new()
	{

		$data["title"] = "Games - CodeIgniter";

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function save()
	{
		$game = $_POST;
		$game["user_id"] = '1';
		$this->games_model->save($game);
		echo '<script type="text/javascript">
           window.location = "http://localhost:70/Crud_CI/games/"
      	</script>';
	}

	public function edit($id)
	{
		$data["game"] = $this->games_model->select($id);
		$data["title"] = "Editar Game - CodeIgniter";

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	public function update($id)
	{
		$game = $_POST;
		$this->games_model->update($id, $game);
		echo '<script type="text/javascript">
           window.location = "http://localhost:70/Crud_CI/games/"
      	</script>';
	}

	public function delete($id)
	{
		$this->games_model->destroy($id);
		echo '<script type="text/javascript">
           window.location = "http://localhost:70/Crud_CI/games/"
      	</script>';
	}


}
