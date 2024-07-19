<?php
    class khachhangmodel extends DModel{
    public  function __construct(){
        parent::__construct();
    }
    public function khachhang($table_khachhang){
        $sql = "SELECT * FROM $table_khachhang ORDER BY makh ASC";
        return $this->db->select($sql);
        }
        
        public function khachhangbyid($table_khachhang,$cond){
          $sql = "SELECT * FROM $table_khachhang WHERE $cond";
          return $this->db->select($sql);
        }

        public function insertkhachhang($table_khachhang,$data){
          return $this->db->insert($table_khachhang,$data);
        }
        
        public function updatekhachhang($table_khachhang,$data,$cond)
        {
          return $this->db->update($table_khachhang,$data,$cond); 
        }
        public function deletekhachhang($table_khachhang,$cond)
        {
          return $this->db->delete($table_khachhang,$cond); 
        }
        public function login($table_khachhang, $email, $password){
          $sql = "SELECT * FROM $table_khachhang WHERE email=? AND password=? ";
          return $this->db->affectedRows($sql,$email,$password);
        }
        public function getLogin($table_khachhang, $email, $password){
          $sql = "SELECT * FROM $table_khachhang WHERE email=? AND password=? ";
          return $this->db->selectUser($sql,$email,$password);
      }
    }
?>