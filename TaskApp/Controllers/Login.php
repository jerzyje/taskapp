<?php
namespace Controllers;

class Login extends \TaskApp\Controller
{
    public function action_index($params)
    {
        $data["login_status"] = "";
        if(isset($_POST['login']) && isset($_POST['password']))
        {

            $login = $_POST['login'];
            $password =$_POST['password'];
            if($login=='' || $password ==''){
                $data["login_status"] = "void";
            }else{
                if($login=="admin" && $password=="123")
                {
                    $_SESSION['user'] = $login;
                    header('Location:/main/');
                }
                else
                {
                    $data["login_status"] = "bad";
                }
            }

        }

        $this->view->generate_html('Login', 'TemplateLogin', $data);
    }

    function logout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }

}