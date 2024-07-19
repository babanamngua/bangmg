<?php
    class khuyenmaimodel extends DModel{
    public  function __construct(){
        parent::__construct();
    }
    public function khuyenmai($table_khuyenmai){
        $sql = "SELECT * FROM $table_khuyenmai ORDER BY makm ASC";
        return $this->db->select($sql);
        }
        public function khuyenmai_home($table_khuyenmai){
            $sql = "SELECT * FROM $table_khuyenmai ORDER BY makm ASC";
            return $this->db->select($sql);
        }
        public function khuyenmaibyid_home( $table_khuyenmai,$table_product,$id){
          $sql = "SELECT * FROM $table_khuyenmai,$table_product WHERE $table_khuyenmai.id_category_product = $table_product.id_category_product 
          AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product ASC";
          return $this->db->select($sql);
        }
         public function khuyenmaibyid($table_khuyenmai,$cond){
          $sql = "SELECT * FROM $table_khuyenmai WHERE $cond";
          return $this->db->select($sql);
        }
    
    
        public function insertkhuyenmai($table_khuyenmai,$data){
          return $this->db->insert($table_khuyenmai,$data);
        }
        
        public function updatekhuyenmai($table_khuyenmai,$data,$cond)
        {
          return $this->db->update($table_khuyenmai,$data,$cond); 
        }
        public function deletekhuyenmai($table_khuyenmai,$cond)
        {
          return $this->db->delete($table_khuyenmai,$cond); 
        }
    }
?>