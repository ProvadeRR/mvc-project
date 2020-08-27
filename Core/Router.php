<?php


namespace Core;


class Router
{
    private $params = [];

    public  function getUrl()
    {
        return trim($_SERVER['REQUEST_URI'] , '/');
    }
    public function getParams(){
        $url = $this->getUrl();
        if(!empty($url)){
            if(preg_match("/^(?P<controller>[a-z]+)\/?(?P<action>[a-z]+)?\/?(?P<params>[0-9]+)?/",$url,$matches)){
                $this->params = ['controller' => $matches['controller'] .'Controller','action' => $matches['action'],'params' => $matches['params']];
                return true;
            }
        }
        else{
            $this->params['controller'] = 'MainController';
            return true;
        }
        return false;
    }
    public function run(){
        if($this->getParams())
        {
            if(empty($this->params['action']))
            {
                $this->params['action'] = 'indexAction';
            }
            $controllerpath = 'controllers\\'.ucfirst($this->params['controller']);
            if(class_exists($controllerpath))
            {
                $action = $this->params['action'];
                if(method_exists($controllerpath,$action))
                {

                    $controller = new $controllerpath($this->params);
                    $controller->$action();
                }
                else{
                   echo 'Метод не найден';
                }
            }
            else{
                echo 'Контроллер не найден';
            }
        }
    }
}