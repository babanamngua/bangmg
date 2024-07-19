<?php
class loaisanphamController extends DController
{
    public function __construct()
    {
        // Session::checkSession();
        parent:: __construct();
    }
    public function index()
    {
        $this->loaisanpham();
    }
    public function loaisanpham()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/loaisanpham/list_loaisp');
        $this->load->view('cpanel/footer');
    }
    
    public function add_loaisp()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/loaisanpham/add_loaisp');
        $this->load->view('cpanel/footer');
    }
    public function insert_loaisp(){
        $tenloai = $_POST['tenloai'];
     
        $anhloaisp = $_FILES['anhloaisp']['name'];
        $tmp_image = $_FILES['anhloaisp']['tmp_name'];  
        $div = explode('.',$anhloaisp);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/loaisanpham/".$unique_image;
        $table_loaisp = "loaisanpham";
        $data= array(
           'tenloai' => $tenloai,
           'anhloaisp' => $unique_image
        );
        $loaisanphammodel = $this->load->model('loaisanphammodel');
        $result = $loaisanphammodel->insertloaisp($table_loaisp,$data);
        if($result == 1){
           move_uploaded_file($tmp_image, $path_uploads);
           $message['msg']= "Thêm loại sản phẩm thành công";
           header('Location:'.BASE_URL."/loaisanphamController/list_loaisp?msg=".urlencode(serialize($message)));

        }else{
           $message['msg']= "Thêm loại sản phẩm thất bại";
           header('Location:'.BASE_URL."/loaisanphamController/list_loaisp?msg=".urlencode(serialize($message)));
        }
   }
   public function list_loaisp(){
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $table_loaisanpham = "loaisanpham";
   
    $loaisanphammodel = $this->load->model('loaisanphammodel');
    $data['loaisanpham'] = $loaisanphammodel->loaisanpham($table_loaisanpham);
    $this->load->view('cpanel/loaisanpham/list_loaisp',$data);
    $this->load->view('cpanel/footer');
}

public function delete_loaisp($maloai){
    $table_loaisanpham = "loaisanpham";
    $cond = "maloai='$maloai'";
    $loaisanphammodel = $this->load->model('loaisanphammodel');
    $result = $loaisanphammodel->deleteloaisp($table_loaisanpham,$cond);
    if($result == 1){
        $message['msg']= "Xóa loại sản phẩm thành công";
        header('Location:'.BASE_URL."/loaisanphamController/list_loaisp?msg=".urlencode(serialize($message)));

     }else{
        $message['msg']= "Xóa loại sản phẩm thất bại";
        header('Location:'.BASE_URL."/loaisanphamController/list_loaisp?msg=".urlencode(serialize($message)));
     }
}
public function edit_loaisp($maloai){
    $table_loaisanpham = "loaisanpham";
    $cond = "maloai='$maloai'";
    $loaisanphammodel = $this->load->model('loaisanphammodel');
    $data['loaisanpham'] = $loaisanphammodel->loaisanphamid ($table_loaisanpham,$cond);
            
    $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/loaisanpham/edit_loaisp',$data);
            $this->load->view('cpanel/footer');
}

public function update_loaisp($maloai){
    $table_loaisanpham = "loaisanpham";
    $cond = "maloai='$maloai'";
    $loaisanphammodel = $this->load->model('loaisanphammodel');

    $tenloai = $_POST['tenloai'];
    
    $anhloaisp = $_FILES['anhloaisp']['name'];    
        $tmp_image = $_FILES['anhloaisp']['tmp_name'];  
        $div = explode('.',$anhloaisp);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/loaisanpham/".$unique_image;
        if($anhloaisp){
            $data['loaisanpham'] = $loaisanphammodel->loaisanphamid ($table_loaisanpham,$cond);
            foreach ($data['loaisanpham']  as $key => $value){
               $path_unlink= "public/uploads/loaisanpham/";
               unlink($path_unlink.$value['anhloaisp']);
            }
        $data= array(
            'tenloai' => $tenloai,
            'anhloaisp' =>   $unique_image
         );
        move_uploaded_file($tmp_image, $path_uploads);
        }else{
            $data= array(
                'tenloai' => $tenloai
         );
    }
     
     $result = $loaisanphammodel->updateloaisp($table_loaisanpham,$data,$cond);
     if($result == 1){
        $message['msg']= "Cập nhật loại sản phẩm thành công";
       header('Location:'.BASE_URL."/loaisanphamController/list_loaisp?msg=".urlencode(serialize($message)));
    }else{
       $message['msg']= "Cập nhật loại sản phẩm thất bại";
       header('Location:'.BASE_URL."/loaisanphamController/list_loaisp?msg=".urlencode(serialize($message)));
    }
}

}
?>