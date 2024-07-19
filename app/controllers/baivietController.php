<?php
class baivietController extends DController
{
    public function __construct()
    {
        Session::checkSession();
        parent:: __construct();
    }
    public function index()
    {
        $this->baiviet();
    }
    public function baiviet()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/baiviet/list_baiviet');
        $this->load->view('cpanel/footer');
    }
    
    public function add_baiviet()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/baiviet/add_baiviet');
        $this->load->view('cpanel/footer');
    }
    public function insert_baiviet(){
        $tenbv = $_POST['tenbv'];
        $image = $_FILES['anh']['name'];
        $tmp_image = $_FILES['anh']['tmp_name'];  
        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'. $file_ext ;
        $path_uploads = "public/uploads/baiviet/".$unique_image;
        $mota = $_POST['mota'];
        $ngaydang = $_POST['ngaydang'];

        $table_baiviet = "baiviet";
        $data= array(
           'tenbv' => $tenbv,
           'anh' =>   $unique_image,
           'mota' => $mota,
           'ngaydang' => $ngaydang

        );
        $baivietmodel = $this->load->model('baivietmodel');
        $result = $baivietmodel->insertbaiviet($table_baiviet,$data);
        if($result == 1){
            move_uploaded_file($tmp_image, $path_uploads);
           $message['msg']= "Thêm bài viết thành công";
           header('Location:'.BASE_URL."/baivietController/list_baiviet?msg=".urlencode(serialize($message)));

        }else{
           $message['msg']= "Thêm bài viết thất bại";
           header('Location:'.BASE_URL."/baivietController/list_baiviet?msg=".urlencode(serialize($message)));
        }
   }
   public function list_baiviet(){
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $table_baiviet = "baiviet";
   
    $baivietmodel = $this->load->model('baivietmodel');
    $data['baiviet'] = $baivietmodel->baiviet($table_baiviet);
    $this->load->view('cpanel/baiviet/list_baiviet',$data);
    $this->load->view('cpanel/footer');
}

public function delete_baiviet($mabv){
            $table_baiviet = "baiviet";
            $cond = "mabv='$mabv'";
            $baivietmodel = $this->load->model('baivietmodel');
            $result = $baivietmodel->deletebaiviet($table_baiviet,$cond);
            if($result == 1){
                $message['msg']= "Xóa bài viết thành công";
                header('Location:'.BASE_URL."/baivietController/list_baiviet?msg=".urlencode(serialize($message)));
        
             }else{
                $message['msg']= "Xóa bài viết thất bại";
                header('Location:'.BASE_URL."/baivietController/list_baiviet?msg=".urlencode(serialize($message)));
             }
        }        
        public function edit_baiviet($mabv){
            $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $table_baiviet = "baiviet";
            $cond = "mabv='$mabv'";
            $baivietmodel = $this->load->model('baivietmodel');
            $data['baiviet'] = $baivietmodel->baivietbyid ($table_baiviet,$cond);
                    
           
            $this->load->view('cpanel/baiviet/edit_baiviet',$data);
            $this->load->view('cpanel/footer');
        }
        
        public function update_baiviet($mabv){
        $table_baiviet = "baiviet";
        $cond = "mabv='$mabv'";
        $baivietmodel = $this->load->model('baivietmodel');

        $tenbv = $_POST['tenbv'];

        $mota = $_POST['mota'];
        $ngaydang = $_POST['ngaydang'];
        $anh = $_FILES['anh']['name'];
        $tmp_image = $_FILES['anh']['tmp_name'];  
        $div = explode('.',$anh);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext ;
        $path_uploads = "public/uploads/baiviet/".$unique_image;
        if($anh)
        {
            $data['baivietbyid']=$baivietmodel->baivietbyid($table_baiviet,$cond);
            foreach ($data['baivietbyid']  as $key => $value){
                $path_unlink= "public/uploads/baiviet";
                unlink($path_unlink.$value['anh']);
        }

        

        $data= array(
                   'tenbv'=>$tenbv,
                   'anh'=>$anh,
                   'mota'=>$mota,
                   'ngaydang'=>$ngaydang

                );
                move_uploaded_file($tmp_image, $path_uploads);
        }else{
                $data= array(
                    'tenbv'=>$tenbv,
                    'mota'=>$mota,
                    'ngaydang'=>$ngaydang

                 );
            }
          
                $result = $baivietmodel->updatebaiviet($table_baiviet,$data,$cond);
                if($result == 1){
                  
                    $message['msg']= "Cập nhật bài viết thành công";
                   header('Location:'.BASE_URL."/baivietController/list_baiviet?msg=".urlencode(serialize($message)));
        
                }else{
                   $message['msg']= "Cập nhật bài viết thất bại";
                   header('Location:'.BASE_URL."/baivietController/list_baiviet?msg=".urlencode(serialize($message)));
                }
         }
    
}
?>