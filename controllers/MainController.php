<?php


namespace controllers;


use Core\Controller;

class MainController extends Controller
{

    public function indexAction(){
        $this->loadModel('UsersModel');
        $users = $this->model->getUsers();
        $this->view->render('Главная страница',compact('users'));
    }
}