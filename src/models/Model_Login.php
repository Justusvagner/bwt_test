<?php 
namespace JustusParser\models;

use JustusParser\core\Model;
use PDO;

class Model_Login extends Model
{

    public function doLogin()
    {
        function generateCode($length=6)
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
            $code = "";
            $clen = strlen($chars) - 1;
            while (strlen($code) < $length) {
                 $code .= $chars[mt_rand(0, $clen)];
            }
            return $code;
        }

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=parser_test', 'root', '');
        }
        catch (PDOException $e) {
            echo "Unable to connect to the database";
        }

        if (isset($_POST['submit'])) {
            $statement = $pdo->prepare("SELECT user_id, user_name, user_password FROM users1");
            $statement->execute(['user_email' => $pdo->quote($_POST['email'])]);
            $data = $statement->fetch(PDO::FETCH_ASSOC);

            if ($data['user_password'] === md5(md5($_POST['password']))) {
                $hash = md5(generateCode(10));

                $row = [
                    'user_hash' => $hash,
                    'user_id' => $data['user_id']
                ];
                $sql = "UPDATE users1 SET user_hash = :user_hash WHERE user_id = :user_id";
                $status = $pdo->prepare($sql)->execute($row);

                setcookie("id", $data['user_id'], time()+60*60*24*30);
                setcookie("name", $data['user_name'], time()+60*60*24*30);
                setcookie("hash", $hash, time()+60*60*24*30, null, null, null, true); // httponly !!!
            } else {
                return "Неправильный логин или пароль!<br>";
            }
        }
    }
}
