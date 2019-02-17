<?php 
namespace JustusParser\models;

use JustusParser\core\Model;
use PDO;

class Model_Reviews extends Model
{
    public $reviews;

    public function getData()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=parser_test', 'root', '');
        }
        catch (PDOException $e) {
            echo "Unable to connect to the database";
        }

        $query = $pdo->prepare("SELECT * FROM reviews ORDER BY `review_id` DESC");
        $query->execute();

        while ($reviews[] = $query->fetch(PDO::FETCH_ASSOC)) {
              
        }
        return $reviews;
    }

    public function checkLogin()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=parser_test', 'root', '');
        }
        catch (PDOException $e) {
            echo "Unable to connect to the database";
        }

        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {   

            $query = $pdo->prepare("SELECT * FROM users1 WHERE user_id = :user_id LIMIT 1");
            $query->execute(['user_id' => intval($_COOKIE['id'])]);
            $userdata = $query->fetch(PDO::FETCH_ASSOC);

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
