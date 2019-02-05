<?php
class Controller_Reviews extends Controller
{
	function __construct()
	{
		$this->model = new Model_Reviews();
		$this->view = new View();
	}
	

	function action_index()
	{
		if (isset($_COOKIE['id']))
		{
			$data = $this->model->get_data();
			$this->view->generate('reviews_view.php', 'template_view.php', $data);
		}
		else 
		{
			$this->view->generate('unreg_view.php', 'template_view.php');
		}
	}
}

?>