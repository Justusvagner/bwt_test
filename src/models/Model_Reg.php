<?php
namespace JustusParser\models;

use JustusParser\core\Model;

class Model_Reg extends Model
{
    
    public function doRegister()
    {
        $link=mysqli_connect("localhost", "root", "", "parser_test");
        if ($link == false ) {   
            echo 'Connection failure!<br>';
            echo mysqli_connect_error();
            exit();
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

            $query = mysqli_query($link, "SELECT user_id FROM users1 WHERE user_email='".mysqli_real_escape_string($link, $_POST['email'])."'");
            if (mysqli_num_rows($query) > 0) {
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

                mysqli_query($link, "INSERT INTO users1 SET user_name='".$name."', user_surname='".$surname."', user_email='".$email."', user_password='".$password."', user_gender='".$gender."', user_bday='".$bday."' ");

            }
            return $err;
        }
    }
}