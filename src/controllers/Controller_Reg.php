<?php
namespace JustusParser\controllers;

use JustusParser\core\Controller;
use JustusParser\core\View;
use JustusParser\models\Model_Reg;

class Controller_Reg extends Controller
{
    function __construct()
    {
        $this->model = new Model_Reg();
        $this->view = new View();
    }

    function actionIndex()
    {
        if (isset($_POST['submit'])) {
            $data = $this->model->doRegister();
        }

        $this->view->generate('reg_view.php', 'template_view.php', $data);
    }
}
