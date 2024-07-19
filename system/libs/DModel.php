<?php
class DModel{
   protected $db = array();
    public function __construct(){
      
       $connect = 'mysql:dbname=qlgmg; host=localhost;charset=utf8mb4';
       $user = 'root';
       $password = '';
       $this -> db = new Database($connect,$user,$password);
    }
 }
?>