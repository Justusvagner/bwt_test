<?php
namespace JustusParser\models;

use JustusParser\core\Model;
use PDO;

class Model_Reg extends Model
{
    
    public function doRegister()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=parser_test', 'root', '');
        }
        catch (PDOException $e) {
            echo "Unable to connect to the database";
        }

        if (isset($_POST['submit'])) {
            
            $err = [];

            if (!preg_match("/^[a-zA-Z]+$/", $_POST['name'])) {
                $err[] = "Имя может состоять только из букв английского алфавита";
            }

            if (strlen($_POST['name']) < 3 or strlen($_POST['name']) > 30) {
                $err[] = "Имя должно быть не меньше 3-х символов и не больше 30";
            }

            if (!preg_match("/^[a-zA-Z]+$/", $_POST['surname'])) {
                $err[] = "Фамилия может состоять только из букв английского алфавита";
            }

            if (strlen($_POST['surname']) < 3 or strlen($_POST['surname']) > 30) {
                $err[] = "Фамилия должна быть не меньше 3-х символов и не больше 30";
            }

            if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $_POST['email'])) {
                $err[] = "Неправильный формат почтового ящика";
            }

            if (strlen($_POST['email']) < 3 or strlen($_POST['email']) > 50) {
                $err[] = "Почтовый ящик должен быть не меньше 3-х символов и не больше 50";
            }

            $statement = $pdo->prepare("SELECT * FROM users1 WHERE user_email = :user_email");
            $statement->execute(['user_email' => $pdo->quote($_POST['email'])]);
            $statement1 = $statement->fetch(PDO::FETCH_ASSOC);

            if ($statement1 != null) {
                $err[] = "За этим почтовым ящиком уже закреплён пользователь";
            }

            if (strlen($_POST['password']) < 3 or strlen($_POST['password']) > 32) {
                $err[] = "Пароль должен быть не меньше 3-х символов и не больше 32";
            }

            if (count($err) == 0) {
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $password = md5(md5(trim($_POST['password'])));
                if (isset($_POST['gender'])) {
                    $gender = $_POST['gender'];
                } else {
                    $gender = null;
                }
                if (isset($_POST['bday'])) {
                    $bday = $_POST['bday'];
                } else {
                    $bday = null;
                }

                $sql = "INSERT INTO users1 SET user_name = :user_name,
                    user_surname = :user_surname, 
                    user_email = :user_email, 
                    user_password = :user_password, 
                    user_gender = :user_gender, 
                    user_bday = :user_bday
                ";
                $row = [
                    'user_name' => $name,
                    'user_surname' => $surname,
                    'user_email' => $email,
                    'user_password' => $password,
                    'user_gender' => $gender,
                    'user_bday' => $bday
                ];
                $status = $pdo->prepare($sql)->execute($row);
            }
            return $err;
        }
    }
}
