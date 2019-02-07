<?php
class Controller_Main extends Controller
{
	function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}


	function action_index()
	{
		$chk = $this->model->check_login();

		if ($chk == "OK")
		{
			$data = $this->model->get_data();
			$this->view->generate('main_view.php', 'template_view.php', $data);
		}
		else 
		{
			$this->view->generate('unreg_view.php', 'template_view.php');
		}
	}
}

?>