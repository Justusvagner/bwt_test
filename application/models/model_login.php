<?php 

class Model_Login extends Model
{
	//public $login = $_POST['login'];
	//public $email = $_POST['email'];
	//public $password = $_POST['password'];

	public function doLogin()
	{
		function generateCode($length=6) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
	    $code = "";
	    $clen = strlen($chars) - 1;
	    while (strlen($code) < $length) {
	            $code .= $chars[mt_rand(0,$clen)];
	    }
	    return $code;
		}


		$link=mysqli_connect("localhost", "root", "", "parser_test");
		if( $link == false )
		{	
			echo 'Connection failure!<br>';
			echo mysqli_connect_error();
			exit();
		}


		if(isset($_POST['submit']))
		{
		    $query = mysqli_query($link,"SELECT user_id, user_name, user_password FROM users1 WHERE user_email='".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1");
		    $data = mysqli_fetch_assoc($query);

		    if($data['user_password'] === md5(md5($_POST['password'])))
		    {
		        $hash = md5(generateCode(10));

		        mysqli_query($link, "UPDATE users1 SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

		        setcookie("id", $data['user_id'], time()+60*60*24*30);
		        setcookie("name", $data['user_name'], time()+60*60*24*30);
		        setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!

		        // Переадресовываем браузер на страницу проверки нашего скрипта
		        //header('Location:'.$host.'main'); exit();
		    }

		    else
		    {
		        return $data;
		    }
		}
	}
}
?>