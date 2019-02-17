<?php 
namespace JustusParser\models;

use JustusParser\core\Model;

class Model_Reviews extends Model
{
    public $reviews;

    public function getData()
    {
        $link=mysqli_connect("localhost", "root", "", "parser_test");
        if ($link == false ) {    
            echo 'Connection failure!<br>';
            echo mysqli_connect_error();
            exit();
        }

        $query = mysqli_query($link, "SELECT * FROM reviews ORDER BY `review_id` DESC");
        while ($reviews[] = mysqli_fetch_assoc($query)) {
              
        }

        return $reviews;
    }

    public function checkLogin()
    {
                    $link=mysqli_connect("localhost", "root", "", "parser_test");

        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {   
            $query = mysqli_query($link, "SELECT * FROM users1 WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
            $userdata = mysqli_fetch_assoc($query);
            if (($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("name", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/");
                return "BadHash";
            } else {
                return "OK";
            }
        } else {
            return "BadCookies";
        }
    }
}
