<?php
namespace Controllers;

class Main extends \TaskApp\Controller
{
    public function action_index($params)
    {
        $data = null;
        if($this->model !== null){
            $data = $this->model->get_data();
        }

        $this->view->generate_html('Main', 'Template', $data);
    }

    public function some($params){
        var_dump($params);
        //echo "<br>==<br>";

    }
}