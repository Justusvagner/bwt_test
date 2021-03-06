<?php
namespace JustusParser\controllers;

use JustusParser\core\Controller;
use JustusParser\core\View;
use JustusParser\models\Model_Feedback;

class Controller_Feedback extends Controller
{
    function __construct()
    {
        $this->model = new Model_Feedback();
        $this->view = new View();
    }

    function actionIndex()
    {
        $data = $this->model->getData();
        
        if (isset($_POST['submit'])) {    
            if ($_POST['realanswer'] == $_POST['answer']) {
                $this->model->putData();
            }
        }
        
        $this->view->generate('feedback_view.php', 'template_view.php', $data);
    }
}
