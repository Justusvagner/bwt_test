<?php 

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
        $link=mysqli_connect("localhost", "root", "", "parser_test");
        if ($link == false ) {    
            echo 'Connection failure!<br>';
            echo mysqli_connect_error();
            exit();
        }
        mysqli_query($link, "INSERT INTO `reviews` (`review_author`, `review_email`, `review_body`) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['body']."')");
    }
}
