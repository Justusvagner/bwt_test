<?php
class Controller_Feedback extends Controller
{
	function __construct()
	{
		$this->model = new Model_Feedback();
		$this->view = new View();
	}

	function action_index()
	{
		if(isset($_POST['submit']))
		{
			$this->model->put_data();
		}
		$this->view->generate('feedback_view.php', 'template_view.php');
	}
}

?>