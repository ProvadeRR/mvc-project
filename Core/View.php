<?php


namespace Core;

class View
{
    public $path;
    public $layout = 'default';

    public function __construct($path){
        $this->path = 'views/' .$path['controller'] . '/' . $path['action'] . '.php';
    }
    public function render($title,$vars = [])
    {
        extract($vars);
        if(file_exists($this->path))
        {
            include 'views/layouts/' .$this->layout . '.php';
            include $this->path;
        }
        else{
            echo 'Вида не найдено';
        }

    }
}