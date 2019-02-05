<?php 

class Model_Feedback extends Model
{
	public $reviews;

	public function put_data()
	{
		$link=mysqli_connect("localhost", "root", "", "parser_test");
		if( $link == false )
		{	
			echo 'Connection failure!<br>';
			echo mysqli_connect_error();
			exit();
		}
		mysqli_query($link, "INSERT INTO `reviews` (`review_author`, `review_email`, `review_body`) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['body']."')");
	}
}
?>


