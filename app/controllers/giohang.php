<?php

    class giohang extends DController{
        
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index()
        {
             $this->giohang();
             
        }
        public function giohang(){ 
            Session::init();
    
            $table_loaisanpham="loaisanpham";
            $table_sanpham = 'sanpham';
            $table_nhasanxuat='nhasanxuat';
            $table_baiviet='baiviet';
    
            $loaisanphammodel= $this->load->model('loaisanphammodel');
            $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
            $sanphammodel= $this->load->model('sanphammodel');
            $baivietmodel= $this->load->model('baivietmodel');
    
            $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
            $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
            $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);
            $data['baiviet']=$baivietmodel->baiviet_menu($table_baiviet);
            $this->load->view('header',$data);           
            $this->load->view('giohang');
            $this->load->view('footer');  
        }  
        public function themgiohang(){
            Session::init();
           //Session::destroy();
            if(isset($_SESSION["giohang"])){
                 $avaiable =0;
                foreach($_SESSION["giohang"] as $key => $value){
                   if($_SESSION["giohang"] [$key]['masp'] == $_POST['masp']){
                        $avaiable++;
                        $_SESSION["giohang"] [$key]['soluong']=$_SESSION["giohang"] [$key]['soluong'] + $_POST['soluong'];
                   }
                }
                if( $avaiable ==0){
                    $item = array(
                        'masp' => $_POST["masp"],
                        'tensp' => $_POST["tensp"],
                        'hinh' => $_POST["hinh"],
                        'soluong' => $_POST["soluong"],
                        'gia' => $_POST["gia"]
                    );
                    $_SESSION["giohang"][]= $item; 
                }
            }else{
                $item = array(
                    'masp' => $_POST["masp"],
                    'tensp' => $_POST["tensp"],
                    'hinh' => $_POST["hinh"],
                    'soluong' => $_POST["soluong"],
                    'gia' => $_POST["gia"]
                );
                $_SESSION["giohang"][]= $item;
            }
            header("Location:".BASE_URL.'/giohang/giohang');
        }

        
           
        
    }
    
?>