<?php

class Controller
{
    public function view($view, $params = []){
        $layout = $this->layout($params);
        $content = $this->onlyView($view, $params);
       echo str_replace('{{content}}',$content,$layout);
    }

    public function adminView($view, $params = []){
        $layout = $this->adminLayout($params);
        $content = $this->onlyView($view, $params);
       echo str_replace('{{content}}',$content,$layout);
    }

    protected function adminLayout($params){
        ob_start();
        include_once "../app/views/".THEME."/layout/admin.php";
        return ob_get_clean();
    }

    protected function layout($params){
        ob_start();
        include_once "../app/views/".THEME."/layout/main.php";
        return ob_get_clean();
    }

    protected function onlyView($view, $params){
        ob_start();
        include_once "../app/views/".THEME."/$view.php";
        return ob_get_clean();
    }

    public function model($model)
    {
        if(file_exists("../app/models/" . $model . ".php"))
        {
            include "../app/models/" .$model. ".php";
            
            return new $model;
        }

        //return false ;
    }
}