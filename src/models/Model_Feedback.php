<?php 
namespace JustusParser\models;

use JustusParser\core\Model;
use PDO;

class Model_Feedback extends Model
{
    public $reviews;

    public function getData()
    {
        $first_num = rand(1, 10);
        $second_num = rand(1, 10);

        $operators = array("+","-","*");
        $operator = rand(0, count($operators) - 1);
        $operator = $operators[$operator];

        $answer = 0;
        switch ($operator) {
        case '+':
            $answer = $first_num + $second_num;
            break;
        case '-':
            $answer = $first_num - $second_num;
            break;
        case '*':
            $answer = $first_num * $second_num;
            break;
        }

        return array('num1'=>$first_num,
        'op'=>$operator,
        'num2'=>$second_num,
        'answer'=>$answer);
    }

    public function putData()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=parser_test', 'root', '');
        }
        catch (PDOException $e) {
            echo "Unable to connect to the database";
        }

        $row = [
            'review_author' => $_POST['name'],
            'review_email' => $_POST['email'],
            'review_body' => $_POST['body']
        ];
        $sql = "INSERT INTO reviews SET review_author = :review_author, review_email = :review_email, review_body = :review_body";
        $status = $pdo->prepare($sql)->execute($row);
    }
}
