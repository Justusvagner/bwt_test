<?php
class Controller_Main extends Controller
{
	function action_index()
	{
		if (isset($_COOKIE['id']))
		{
		$this->view->generate('main_view.php', 'template_view.php');
		}
		else 
		{
			$this->view->generate('unreg_view.php', 'template_view.php');
		}
	}
}

?>