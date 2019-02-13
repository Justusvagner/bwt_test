<?php
class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }


    function actionIndex()
    {
        $chk = $this->model->checkLogin();

        if ($chk == "OK") {
            $data = $this->model->getData();
            $this->view->generate('main_view.php', 'template_view.php', $data);
        } else {
            $this->view->generate('unreg_view.php', 'template_view.php');
        }
    }
}
