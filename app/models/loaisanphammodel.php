<?php
    class loaisanphammodel extends DModel{
    public  function __construct(){
        parent::__construct();
    }
    public function loaisanpham($table_loaisanpham){
        $sql = "SELECT * FROM $table_loaisanpham ORDER BY maloai ASC";
        return $this->db->select($sql);
        }
        public function loaisanphamid($table_loaisanpham,$cond){
          $sql = "SELECT * FROM $table_loaisanpham WHERE $cond";
          return $this->db->select($sql);
        }
    
    
    
        public function insertloaisp($table_loaisp,$data){
          return $this->db->insert($table_loaisp,$data);
        }
        
        public function updateloaisp($table_khuyenmai,$data,$cond)
        {
          return $this->db->update($table_khuyenmai,$data,$cond); 
        }
        public function deleteloaisp($table_loaisanpham,$cond)
        {
          return $this->db->delete($table_loaisanpham,$cond); 
        }
       
    }
?>