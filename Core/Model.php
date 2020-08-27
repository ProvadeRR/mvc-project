<?php


namespace Core;
use Core\Database;

class Model
{
    public $db;

    public function __construct(){
        $this->db = new Database;
    }
}