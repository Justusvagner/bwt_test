<?php 

class Model_Reviews extends Model
{
	public $reviews;

	public function get_data()
	{
		$link=mysqli_connect("localhost", "root", "", "parser_test");
		if( $link == false )
		{	
			echo 'Connection failure!<br>';
			echo mysqli_connect_error();
			exit();
		}

		$query = mysqli_query($link, "SELECT * FROM reviews ORDER BY `review_id` DESC");
		 while ($reviews[] = mysqli_fetch_assoc($query)) {
		 	 
		 }

		return $reviews;
	}
}
?>


