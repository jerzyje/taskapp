<?php
namespace TaskApp;

class View
{

    public function generate_html($content, $template, $data = null)
    {

        include 'TaskApp/Views/'.$template.'.php';
    }
}