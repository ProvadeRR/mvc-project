<?php


namespace Core;
use PDO;

class Database
{
    protected $db;

    public function __construct(){
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=portfolio','root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e)
        {
            $e->getMessage();
        }
        return $this->db;
    }
    public function disconnect(){
        $this->db = null;
    }
   public function query($sql, $params = [])
   {
       $stmt = $this->db->prepare($sql);
       if(!empty($params))
       {
           foreach ($params as $key => $value)
           {
               $stmt->bindValue(':'.$key , $value);
           }
       }
       $stmt->execute();
      return $stmt;
   }
   public function row($sql,$params = [])
   {
       $result = $this->query($sql,$params);
       return $result->fetchAll(PDO::FETCH_ASSOC);
   }
   public function column($sql,$params = [])
   {
       $result = $this->query($sql,$params);
       return $result->fetchColumn(PDO::FETCH_ASSOC);;
   }
}