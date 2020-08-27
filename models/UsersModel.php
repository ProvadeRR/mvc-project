<?php


namespace models;


use Core\Model;

class UsersModel extends Model
{
    public function getUsers(){
        $params = [
            'id' => '5'
        ];
        return $result = $this->db->row('SELECT * FROM users WHERE id = :id' , $params);
    }
}