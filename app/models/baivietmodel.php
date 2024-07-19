<?php
    class baivietmodel extends DModel{
    public  function __construct(){
        parent::__construct();
    }
    public function baiviet($table_baiviet){
        $sql = "SELECT * FROM $table_baiviet ORDER BY mabv ASC";
        return $this->db->select($sql);
        }
        public function baiviet_home($table_baiviet){
            $sql = "SELECT * FROM $table_baiviet ORDER BY mabv ASC";
            return $this->db->select($sql);
        }
        public function baivietbyid_home( $table_nhasanxuat,$table_product,$id){
          $sql = "SELECT * FROM $table_nhasanxuat,$table_product WHERE $table_nhasanxuat.id_category_product = $table_product.id_category_product 
          AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product ASC";
          return $this->db->select($sql);
        }
         public function baivietbyid($table_baiviet,$cond){
          $sql = "SELECT * FROM $table_baiviet WHERE $cond";
          return $this->db->select($sql);
        }
    
    
        public function insertbaiviet($table_baiviet,$data){
          return $this->db->insert($table_baiviet,$data);
        }
        
        public function updatebaiviet($table_baiviet,$data,$cond)
        {
          return $this->db->update($table_baiviet,$data,$cond); 
        }
        public function deletebaiviet($table_baiviet,$cond)
        {
          return $this->db->delete($table_baiviet,$cond); 
        }
        public function baiviet_menu($table_baiviet){
          $sql = "SELECT * FROM $table_baiviet ORDER BY mabv ASC";
          return $this->db->select($sql);
        }
      public function chitietbaiviet_home($table_baiviet,$cond)
      {
        $sql = "SELECT * FROM $table_baiviet WHERE $cond ORDER BY $table_baiviet.mabv ASC";
        return $this->db->select($sql);
      }
      public function related_post_home($table_baiviet,$cond_related)
      {
        $sql = "SELECT * FROM $table_baiviet WHERE $cond_related ORDER BY $table_baiviet.mabv ASC";
        return $this->db->select($sql);
      }
    }
?>