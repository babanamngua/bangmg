<?php
class sanphamController extends DController
{
    public function __construct()
    {
        // Session::checkSession();
        parent:: __construct();
    }
    public function index()
    {
        $this->sanpham();
    }
    public function sanpham()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/sanpham/list_sanpham');
        $this->load->view('cpanel/footer');
    }
    public function list_sanpham(){
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table_sanpham = "sanpham";
        $table_loaisanpham = "loaisanpham";
        $table_nhasanxuat = "nhasanxuat";
        $table_khuyenmai = "khuyenmai";
        $sanphammodel = $this->load->model('sanphammodel');
        $data['sanpham'] = $sanphammodel->sanpham($table_sanpham,$table_loaisanpham, $table_nhasanxuat,$table_khuyenmai);
        $this->load->view('cpanel/sanpham/list_sanpham',$data);
        $this->load->view('cpanel/footer');
    }
    public function add_sanpham(){
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table_loaisanpham = "loaisanpham";
        $loaisanphammodel = $this->load->model('loaisanphammodel');
        $data['loaisanpham'] = $loaisanphammodel->loaisanpham($table_loaisanpham);
        
        $table_nhasanxuat = "nhasanxuat";
        $nhasanxuatmodel = $this->load->model('nhasanxuatmodel');
        $data['nhasanxuat'] = $nhasanxuatmodel->nhasanxuat($table_nhasanxuat);

        $table_khuyenmai = "khuyenmai";
        $khuyenmaimodel = $this->load->model('khuyenmaimodel');
        $data['khuyenmai'] = $khuyenmaimodel->khuyenmai($table_khuyenmai);

        $this->load->view('cpanel/sanpham/add_sanpham',$data);
        $this->load->view('cpanel/footer');
    }
    public function insert_sanpham(){
        $tensp = $_POST['tensp'];
        $hinh = $_FILES['hinhsp']['name'];
        $tmp_image = $_FILES['hinhsp']['tmp_name'];  
        $div = explode('.',$hinh);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/sanpham/".$unique_image;
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        $loaisanpham = $_POST['loaisanpham'];
        $nhasanxuat = $_POST['nhasanxuat'];
        $khuyenmai = $_POST['khuyenmai'];
        $gia = $_POST['gia'];
        $table_sanpham = "sanpham";
        $data= array(
            'tensp' => $tensp,
            'hinhsp' =>   $unique_image,
            'mota' => $mota,
            'soluong' => $soluong,
            'maloai' =>$loaisanpham,
            'mansx' =>$nhasanxuat, 
            'makm' =>$khuyenmai, 
            'gia' =>$gia
          
         );
        $sanphammodel = $this->load->model('sanphammodel');
        $result = $sanphammodel->insertsanpham($table_sanpham,$data);
        if($result == 1){
            move_uploaded_file($tmp_image, $path_uploads);
            $message['msg']= "Thêm sản phẩm thành công";
            header('Location:'.BASE_URL."/sanphamController/list_sanpham?msg=".urlencode(serialize($message)));

         }else{
            $message['msg']= "Thêm sản phẩm thất bại";
            header('Location:'.BASE_URL."/sanphamController/list_sanpham?msg=".urlencode(serialize($message)));
         }
   }
   public function delete_sanpham($masp){
    $table_sanpham = "sanpham";
    $cond = "masp='$masp'";
    $sanphammodel = $this->load->model('sanphammodel');
    $result = $sanphammodel->deletesanpham($table_sanpham,$cond);
    if($result == 1){
        $message['msg']= "Xóa sản phẩm thành công";
        header('Location:'.BASE_URL."/sanphamController/list_sanpham?msg=".urlencode(serialize($message)));

     }else{
        $message['msg']= "Xóa sản phẩm thất bại";
        header('Location:'.BASE_URL."/sanphamController/list_sanpham?msg=".urlencode(serialize($message)));
     }
}
public function edit_sanpham($masp){

    $table_sanpham = "sanpham";
    $cond = "masp='$masp'";
    $sanphammodel = $this->load->model('sanphammodel');
    $data['sanpham'] = $sanphammodel->sanphambyid($table_sanpham,$cond);

    $table_loaisanpham = "loaisanpham";
    $loaisanphammodel = $this->load->model('loaisanphammodel');
    $data['loaisanpham'] = $loaisanphammodel->loaisanpham($table_loaisanpham);

    $table_nhasanxuat = "nhasanxuat";
    $nhasanxuatmodel = $this->load->model('nhasanxuatmodel');
    $data['nhasanxuat'] = $nhasanxuatmodel->nhasanxuat($table_nhasanxuat);

    $table_khuyenmai = "khuyenmai";
    $khuyenmaimodel = $this->load->model('khuyenmaimodel');
    $data['khuyenmai'] = $khuyenmaimodel->khuyenmai($table_khuyenmai);

    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/sanpham/edit_sanpham',$data);
    $this->load->view('cpanel/footer');
}

public function update_sanpham($masp){
    $table_sanpham = "sanpham";
    $cond = "masp='$masp'";
    $sanphammodel = $this->load->model('sanphammodel');
    $tensp = $_POST['tensp'];   
    
    $hinh = $_FILES['hinhsp']['name'];    
        $tmp_image = $_FILES['hinhsp']['tmp_name'];  
        $div = explode('.',$hinh);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/sanpham/".$unique_image;
    $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        $loaisanpham = $_POST['loaisanpham'];
        $nhasanxuat = $_POST['nhasanxuat'];
        $khuyenmai = $_POST['khuyenmai'];
        $gia = $_POST['gia'];

   if($hinh){
    $data['sanpham'] = $sanphammodel->sanphambyid($table_sanpham,$cond);
    foreach ($data['sanpham']  as $key => $value){
       $path_unlink= "public/uploads/sanpham";
       unlink($path_unlink.$value['hinh']);
    }
    $data= array(
        'tensp' => $tensp,
        'hinhsp' =>   $unique_image,
        'mota' => $mota,
        'soluong' => $soluong,
        'maloai' =>$loaisanpham,
        'mansx' =>$nhasanxuat, 
        'makm' =>$khuyenmai, 
        'gia' =>$gia
      
     );
    move_uploaded_file($tmp_image, $path_uploads);
}else{
    $data= array(
        'tensp' => $tensp,
        'mota' => $mota,
        'soluong' => $soluong,
        'maloai' =>$loaisanpham,
        'mansx' =>$nhasanxuat, 
        'makm' =>$khuyenmai, 
        'gia' =>$gia
    
     );
}
   
    $result = $sanphammodel->updatesanpham($table_sanpham,$data,$cond);
    if($result == 1){
      
        $message['msg']= "Cập nhật sản phẩm thành công";
       header('Location:'.BASE_URL."/sanphamController/list_sanpham?msg=".urlencode(serialize($message)));

    }else{
       $message['msg']= "Cập nhật sản phẩm thất bại";
       header('Location:'.BASE_URL."/sanphamController/list_sanpham?msg=".urlencode(serialize($message)));
    }
}
public function tatca()
{
    Session::init();
    $table_loaisanpham = 'loaisanpham';

    $table_sanpham = 'sanpham';
    
    $sanphammodel = $this->load->model('sanphammodel');
    $loaisanphammodel = $this->load->model('loaisanphammodel');

    $data['loaisanphamtatca'] = $loaisanphammodel->loaisanpham( $table_loaisanpham);

    $data['sanphamtatca'] = $sanphammodel->sanphamtatca_home($table_sanpham);
    $this->load->view('header',$data);
    $this->load->view('listsanpham',$data);
    $this->load->view('footer');
}
}
?>