<?php
namespace JustusParser\controllers;

use JustusParser\core\Controller;
use JustusParser\core\View;
use JustusParser\models\Model_Login;

class Controller_Login extends Controller
{
    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function actionIndex()
    {
        if (isset($_POST['submit'])) {
            $data = $this->model->doLogin();
        }
        $this->view->generate('login_view.php', 'template_view.php', $data);
    }
}
