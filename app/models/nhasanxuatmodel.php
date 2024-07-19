<?php
    class nhasanxuatmodel extends DModel{
    public  function __construct(){
        parent::__construct();
    }
    public function nhasanxuat($table_nhasanxuat){
        $sql = "SELECT * FROM $table_nhasanxuat ORDER BY mansx ASC";
        return $this->db->select($sql);
        }
        public function nhasanxuat_home($table_nhasanxuat){
            $sql = "SELECT * FROM $table_nhasanxuat ORDER BY mansx ASC";
            return $this->db->select($sql);
        }
        public function nhasanxuatbyid_home( $table_nhasanxuat,$table_sanpham,$id){
          $sql = "SELECT * FROM $table_nhasanxuat,$table_sanpham WHERE $table_nhasanxuat.mansx = $table_sanpham.mansx
          AND $table_sanpham.mansx='$id' ORDER BY $table_sanpham.masp ASC";
          return $this->db->select($sql);
        }
         public function nhasanxuatbyid($table_nhasanxuat,$cond){
          $sql = "SELECT * FROM $table_nhasanxuat WHERE $cond";
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
        public function nhasanxuat_menu($table_nhasanxuat){
          $sql = "SELECT * FROM $table_nhasanxuat ORDER BY mansx ASC";
          return $this->db->select($sql);
      }
    }
?>