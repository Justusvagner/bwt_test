<?php
class Controller_Reviews extends Controller
{
	function action_index()
	{
		//if ( @isset($_COOKIE)){
		$this->view->generate('reviews_view.php', 'template_view.php');
		//}else {$this->view->generate('unreg_view.php', 'template_view.php');}
	}
}

?>