<?php
    class sanphammodel extends DModel{
      public  function __construct(){
        parent::__construct();
      }
      public function insertsanpham($table_sanpham,$data){
        return $this->db->insert($table_sanpham,$data);
      }
      public function sanpham($table_sanpham,$table_loaisanpham, $table_nhasanxuat,$table_khuyenmai){
        $sql = "SELECT * FROM $table_sanpham,$table_loaisanpham, $table_nhasanxuat,$table_khuyenmai
        WHERE $table_sanpham.maloai = $table_loaisanpham.maloai and
              $table_sanpham.mansx = $table_nhasanxuat.mansx and
              $table_sanpham.makm = $table_khuyenmai.makm

        ORDER BY $table_sanpham.masp ASC";
        return $this->db->select($sql);
        }
        
        public function deletesanpham($table_sanpham,$cond)
        {
          return $this->db->delete($table_sanpham,$cond); 
        }
        public function sanphambyid($table_sanpham,$cond){
          $sql = "SELECT * FROM $table_sanpham WHERE $cond";
          return $this->db->select($sql);
        }
        
        public function updatesanpham($table_sanpham,$data,$cond)
        {
          return $this->db->update($table_sanpham,$data,$cond); 
        }
        
        public function sanpham_menu($table_sanpham){
          $sql = "SELECT * FROM $table_sanpham ORDER BY masp ASC";
          return $this->db->select($sql);
      }
      public function sanphamtatca_home($table_loaisanpham){
        $sql = "SELECT * FROM $table_loaisanpham ORDER BY $table_loaisanpham.maloai ASC";
          return $this->db->select($sql);
      }
      public function sanphambyid_home($table_loaisanpham,$table_sanpham,$id){
        $sql = "SELECT * FROM $table_loaisanpham,$table_sanpham WHERE $table_loaisanpham.maloai = $table_sanpham.maloai 
        AND $table_sanpham.maloai='$id' ORDER BY $table_sanpham.masp ASC";
        return $this->db->select($sql);
      }
      public function sanphambynsx_home($table_loaisanpham,$table_sanpham,$table_nhasanxuat,$maloai){
        $sql = "SELECT * FROM $table_loaisanpham,$table_sanpham,$table_nhasanxuat 
        WHERE $table_loaisanpham.maloai = $table_sanpham.maloai 
        AND $table_sanpham.mansx = $table_nhasanxuat.mansx
        AND $table_sanpham.maloai='$maloai'
        ORDER BY $table_sanpham.masp ASC";
        return $this->db->select($sql);
      }
      public function chitietsanpham($table_loaisanpham,$table_sanpham,$cond)
      {
        $sql = "SELECT * FROM $table_loaisanpham,$table_sanpham WHERE $cond";
        return $this->db->select($sql);
      }
      public function related_product_home($table_loaisanpham,$table_sanpham,$cond_related)
        {
          $sql = "SELECT * FROM $table_loaisanpham,$table_sanpham WHERE $cond_related";
          return $this->db->select($sql);
        }
    }
?>