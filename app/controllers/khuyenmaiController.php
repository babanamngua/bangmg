<?php
class khuyenmaiController extends DController
{
    public function __construct()
    {
        Session::checkSession();
        parent:: __construct();
    }
    public function index()
    {
        $this->khuyenmai();
    }
    public function khuyenmai()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/khuyenmai/list_khuyenmai');
        $this->load->view('cpanel/footer');
    }
    
    public function add_khuyenmai()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/khuyenmai/add_khuyenmai');
        $this->load->view('cpanel/footer');
    }
    public function insert_khuyenmai(){
        $tenkm = $_POST['tenkm'];
        $phantram = $_POST['phantram'];
        $hinh = $_FILES['hinh']['name'];
        $tmp_image = $_FILES['hinh']['tmp_name'];  
        $div = explode('.',$hinh);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/khuyenmai/".$unique_image;
        $table_khuyenmai = "khuyenmai";
        $data= array(
           'tenkm' => $tenkm,
           'phantram' => $phantram,
           'hinh' =>   $unique_image
        );
        $khuyenmaimodel = $this->load->model('khuyenmaimodel');
        $result = $khuyenmaimodel->insertkhuyenmai($table_khuyenmai,$data);
        if($result == 1){
            move_uploaded_file($tmp_image, $path_uploads);
           $message['msg']= "Thêm khuyến mãi thành công";
           header('Location:'.BASE_URL."/khuyenmaiController/list_khuyenmai?msg=".urlencode(serialize($message)));

        }else{
           $message['msg']= "Thêm khuyến mãi thất bại";
           header('Location:'.BASE_URL."/khuyenmaiController/list_khuyenmai?msg=".urlencode(serialize($message)));
        }
   }
   public function list_khuyenmai(){
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $table_khuyenmai = "khuyenmai";
   
    $khuyenmaimodel = $this->load->model('khuyenmaimodel');
    $data['khuyenmai'] = $khuyenmaimodel->khuyenmai($table_khuyenmai);
    $this->load->view('cpanel/khuyenmai/list_khuyenmai',$data);
    $this->load->view('cpanel/footer');
}

public function delete_khuyenmai($makm){
    $table_khuyenmai = "khuyenmai";
    $cond = "makm='$makm'";
    $khuyenmaimodel = $this->load->model('khuyenmaimodel');
    $result = $khuyenmaimodel->deletekhuyenmai($table_khuyenmai,$cond);
    if($result == 1){
        $message['msg']= "Xóa khuyến mãi thành công";
        header('Location:'.BASE_URL."/khuyenmaiController/list_khuyenmai?msg=".urlencode(serialize($message)));

     }else{
        $message['msg']= "Xóa khuyến mãi thất bại";
        header('Location:'.BASE_URL."/khuyenmaiController/list_khuyenmai?msg=".urlencode(serialize($message)));
     }
}
public function edit_khuyenmai($makm){

    $table_khuyenmai = "khuyenmai";

    $cond = "makm='$makm'";
    $khuyenmaimodel = $this->load->model('khuyenmaimodel');
    $data['khuyenmai'] = $khuyenmaimodel->khuyenmaibyid($table_khuyenmai, $cond );
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/khuyenmai/edit_khuyenmai',$data);
    $this->load->view('cpanel/footer');
}

public function update_khuyenmai($makm){
    $table_khuyenmai = "khuyenmai";
    $cond = "makm='$makm'";
    $khuyenmaimodel = $this->load->model('khuyenmaimodel');
   
    $tenkm = $_POST['tenkm'];
    $phantram = $_POST['phantram'];
    $hinh = $_FILES['hinh']['name'];    
        $tmp_image = $_FILES['hinh']['tmp_name'];  
        $div = explode('.',$hinh);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/khuyenmai/".$unique_image;
    

   if($hinh){
    $data['khuyenmaibyid']=$khuyenmaimodel -> khuyenmaibyid($table_khuyenmai,$cond);
    foreach ($data['khuyenmaibyid']  as $key => $value){
       $path_unlink= "public/uploads/khuyenmai";
       unlink($path_unlink.$value['hinh']);
    }
    $data= array(
       'tenkm' => $tenkm,
       'phantram' => $phantram,
     
       'hinh' =>   $unique_image
      
    );
    move_uploaded_file($tmp_image, $path_uploads);
}else{
    $data= array(
        'tenkm' => $tenkm,
        'phantram' => $phantram,
      
     );
}
   
    $result = $khuyenmaimodel->updatekhuyenmai($table_khuyenmai,$data,$cond);
    if($result == 1){
      
        $message['msg']= "Cập nhật khuyến mãi thành công";
       header('Location:'.BASE_URL."/khuyenmaiController/list_khuyenmai?msg=".urlencode(serialize($message)));

    }else{
       $message['msg']= "Cập nhật khuyến mãi thất bại";
       header('Location:'.BASE_URL."/khuyenmaiController/list_khuyenmai?msg=".urlencode(serialize($message)));
    }
}
}
?>