<?php
class nhasanxuatController extends DController
{
    public function __construct()
    {
        // Session::checkSession();
        parent:: __construct();
    }
    public function index()
    {
        $this->nhasanxuat();
    }
    public function nhasanxuat()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/nhasanxuat/list_nhasanxuat');
        $this->load->view('cpanel/footer');
    }
    public function list_nhasanxuat(){
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table_nhasanxuat = "nhasanxuat";
       
        $nhasanxuatmodel = $this->load->model('nhasanxuatmodel');
        $data['nhasanxuat'] = $nhasanxuatmodel->nhasanxuat($table_nhasanxuat);
        $this->load->view('cpanel/nhasanxuat/list_nhasanxuat',$data);
        $this->load->view('cpanel/footer');
    }
    public function add_nhasanxuat()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/nhasanxuat/add_nhasanxuat');
        $this->load->view('cpanel/footer');
    }
    public function insert_nhasanxuat(){
        $tennsx = $_POST['tennsx'];
        $hinh = $_FILES['hinh']['name'];
            
        $tmp_image = $_FILES['hinh']['tmp_name'];  
        $div = explode('.',$hinh);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/nhasanxuat/".$unique_image;
        $table_nhasanxuat = "nhasanxuat";
        $data= array(
           'tennsx' => $tennsx,
           'hinh' =>   $unique_image,
        );
        $nhasanxuatmodel = $this->load->model('nhasanxuatmodel');
        $result = $nhasanxuatmodel->insertnhasanxuat($table_nhasanxuat,$data);
        if($result == 1){
            move_uploaded_file($tmp_image, $path_uploads);
            $message['msg']= "Thêm nhà sản xuất thành công";
            header('Location:'.BASE_URL."/nhasanxuatController/list_nhasanxuat?msg=".urlencode(serialize($message)));

        }else{
            $message['msg']= "Thêm nhà sản xuất thất bại";
            header('Location:'.BASE_URL."/nhasanxuatController/list_nhasanxuat?msg=".urlencode(serialize($message)));
        }
   }
   
   public function delete_nhasanxuat($mansx){
    $table_nhasanxuat = "nhasanxuat";
    $cond = "mansx='$mansx'";
    $nhasanxuatmodel = $this->load->model('nhasanxuatmodel');
    $result = $nhasanxuatmodel->deletenhasanxuat($table_nhasanxuat,$cond);
    if($result == 1){
        $message['msg']= "Xóa nhà sản xuất thành công";
        header('Location:'.BASE_URL."/nhasanxuatController/list_nhasanxuat?msg=".urlencode(serialize($message)));

     }else{
        $message['msg']= "Xóa nhà sản xuất thất bại";
        header('Location:'.BASE_URL."/nhasanxuatController/list_nhasanxuat?msg=".urlencode(serialize($message)));
     }
}
public function edit_nhasanxuat($mansx){
    $table_nhasanxuat = "nhasanxuat";   
    $cond = "mansx='$mansx'";
    $nhasanxuatmodel = $this->load->model('nhasanxuatmodel');
    $data['nhasanxuat'] = $nhasanxuatmodel->nhasanxuatbyid($table_nhasanxuat,$cond);
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/nhasanxuat/edit_nhasanxuat',$data);
    $this->load->view('cpanel/footer');
}

public function update_nhasanxuat($mansx){
    $table_nhasanxuat = "nhasanxuat";   
    $cond = "mansx='$mansx'";
    $nhasanxuatmodel = $this->load->model('nhasanxuatmodel');
    $tennsx = $_POST['tennsx'];

        $hinh = $_FILES['hinh']['name'];    
        $tmp_image = $_FILES['hinh']['tmp_name'];  
        $div = explode('.',$hinh);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/nhasanxuat/".$unique_image;
  
   if($hinh){
    $data['nhasanxuatbyid']=$nhasanxuatmodel -> nhasanxuatbyid($table_nhasanxuat,$cond);
    foreach ($data['nhasanxuatbyid']  as $key => $value){
       $path_unlink= "public/uploads/nhasanxuat";
       unlink($path_unlink.$value['hinh']);
    }
    $data= array(
       'tennsx' => $tennsx,
       'hinh' =>   $unique_image

    );
    move_uploaded_file($tmp_image, $path_uploads);
}else{
    $data= array(
        'tennsx' => $tennsx
       
     );
}
   
    $result = $nhasanxuatmodel->updatenhasanxuat($table_nhasanxuat,$data,$cond);
    if($result == 1){
      
        $message['msg']= "Cập nhật nhà sản xuất thành công";
       header('Location:'.BASE_URL."/nhasanxuatController/list_nhasanxuat?msg=".urlencode(serialize($message)));

    }else{
       $message['msg']= "Cập nhật nhà sản xuất thất bại";
       header('Location:'.BASE_URL."/nhasanxuatController/list_nhasanxuat?msg=".urlencode(serialize($message)));
    }
}
    public function tatca()
        {
            Session::init();
            
            $this->load->view('header');
            $this->load->view('listsanpham');
            $this->load->view('footer');
        }
}
?>