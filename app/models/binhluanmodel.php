<?php
    class binhluanmodel extends DModel{
    public  function __construct(){
        parent::__construct();
    }
    public function binhluan($table_binhluan){
        $sql = "SELECT * FROM $table_binhluan ORDER BY mabl ASC";
        return $this->db->select($sql);
        }
        public function nhasanxuat_home($table_nhasanxuat){
            $sql = "SELECT * FROM $table_nhasanxuat ORDER BY mansx ASC";
            return $this->db->select($sql);
        }
        public function nhasanxuatbyid_home( $table_nhasanxuat,$table_product,$id){
          $sql = "SELECT * FROM $table_nhasanxuat,$table_product WHERE $table_nhasanxuat.id_category_product = $table_product.id_category_product 
          AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product ASC";
          return $this->db->select($sql);
        }
         public function nhasanxuatbyid($table,$cond){
          $sql = "SELECT * FROM $table WHERE $cond";
          return $this->db->select($sql);
        }
    
    
        public function insertnhasanxuat($table_nhasanxuat,$data){
          return $this->db->insert($table_nhasanxuat,$data);
        }
        
        public function updatenhasanxuat($table_nhasanxuat,$data,$cond)
        {
          return $this->db->update($table_nhasanxuat,$data,$cond); 
        }
        public function deletenhasanxuat($table_nhasanxuat,$cond)
        {
          return $this->db->delete($table_nhasanxuat,$cond); 
        }
    }
?>