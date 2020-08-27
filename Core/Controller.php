<?php


namespace Core;
use Core\View;

abstract class Controller
{
    protected $params = [];
    protected $view;
    protected $model;

    public function __construct($params){
        $this->params = $params;
        $this->view = new View($this->getPath());
    }
    public function loadModel($name = 'default'){
        $modelpath = 'models\\' .$name;
        $model = new $modelpath;
        $this->model = $model;
    }
    public function getPath(){
        $this->params['controller'] = lcfirst(str_replace('Controller','', $this->params['controller']));
        $this->params['action'] = lcfirst(str_replace('Action','', $this->params['action']));
        $path = [
            'controller' => $this->params['controller'],
            'action' => $this->params['action'],
        ];
        return $path;

    }

}