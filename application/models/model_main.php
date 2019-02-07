<?php

include 'includes/simple_html_dom.php';
include 'includes/curl_query.php';

class Model_Main extends Model
{

	public function get_data()
	{	   
		$html = curl_get('http://www.gismeteo.ua/city/daily/5093/');
        $dom = str_get_html($html);
        //foreach($dom->find('img') as $element) 
   		//echo $element->src . '<br>';
   		//return $dom;
	}

	public function check_login()
                {
                    $link=mysqli_connect("localhost", "root", "", "parser_test");

                    if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
                    {   
                        $query = mysqli_query($link, "SELECT * FROM users1 WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
                        $userdata = mysqli_fetch_assoc($query);
                        if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
                        {
                            setcookie("id", "", time() - 3600*24*30*12, "/");
                            setcookie("hash", "", time() - 3600*24*30*12, "/");
                            return "BadHash";
                        }
                        else
                        {return "OK";}
                    }

                    else
                    {return "BadCookies";}
          		}


}
?>