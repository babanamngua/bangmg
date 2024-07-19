<?php
class khachhangController extends DController
{
    public function __construct()
    {
        $data = array();
         parent:: __construct();
    }
    public function index()
    {
        $this->khachhang();
    }
    public function khachhang()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/khachhang/list_khachhang');
        $this->load->view('cpanel/footer');
    }
    public function list_khachhang(){
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table_khachhang = "khachhang";
       
        $khachhangmodel = $this->load->model('khachhangmodel');
        $data['khachhang'] = $khachhangmodel->khachhang($table_khachhang);
        $this->load->view('cpanel/khachhang/list_khachhang',$data);
        $this->load->view('cpanel/footer');
    }    
    public function add_khachhang()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/khachhang/add_khachhang');
        $this->load->view('cpanel/footer');
    }
    public function insert_khachhang(){
        $tenkh = $_POST['tenkh'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $password = md5($_POST['password']);
        $table_khachhang = "khachhang";
        $data= array(
           'tenkh' => $tenkh,
           'sdt' => $sdt,
           'email' => $email,
           'diachi' => $diachi,
           'password' => $password
        );
        $khachhangmodel = $this->load->model('khachhangmodel');
        $result = $khachhangmodel->insertkhachhang($table_khachhang,$data);
        if($result == 1){
           $message['msg']= "Thêm khách hàng thành công";
           header('Location:'.BASE_URL."/khachhangController/list_khachhang?msg=".urlencode(serialize($message)));

        }else{
           $message['msg']= "Thêm khách hàng thất bại";
           header('Location:'.BASE_URL."/khachhangController/list_khachhang?msg=".urlencode(serialize($message)));
        }
   }
 
public function delete_khachhang($makh){
    $table_khachhang = "khachhang";
    $cond = "makh='$makh'";
    $khachhangmodel = $this->load->model('khachhangmodel');
    $result = $khachhangmodel->deletekhachhang($table_khachhang,$cond);
    if($result == 1){
        $message['msg']= "Xóa khách hàng thành công";
        header('Location:'.BASE_URL."/khachhangController/list_khachhang?msg=".urlencode(serialize($message)));

     }else{
        $message['msg']= "Xóa khách hàng thất bại";
        header('Location:'.BASE_URL."/khachhangController/list_khachhang?msg=".urlencode(serialize($message)));
     }
}
public function edit_khachhang($makh){
    $table_khachhang = "khachhang";
    $cond = "makh='$makh'";
    $khachhangmodel = $this->load->model('khachhangmodel');
    $data['khachhang'] = $khachhangmodel->khachhangbyid ($table_khachhang,$cond);
            
    $this->load->view('cpanel/header');
            $this->load->view('cpanel/menu');
            $this->load->view('cpanel/khachhang/edit_khachhang',$data);
            $this->load->view('cpanel/footer');
}

public function update_khachhang($makh){
    $table_khachhang = "khachhang";
    $cond = "makh='$makh'";
    $tenkh = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $password = $_POST['password'];
    $data = array(
        'tenkh' => $tenkh,
        'sdt' => $sdt,
        'email' => $email,
        'diachi' => $diachi,
        'password' => $password
     );
     $khachhangmodel = $this->load->model('khachhangmodel');
     $result = $khachhangmodel->updatekhachhang($table_khachhang,$data,$cond);
     if($result == 1){
        $message['msg']= "Cập nhật khách hàng thành công";
       header('Location:'.BASE_URL."/khachhangController/list_khachhang?msg=".urlencode(serialize($message)));
    }else{
       $message['msg']= "Cập nhật khách hàng thất bại";
       header('Location:'.BASE_URL."/khachhangController/list_khachhang?msg=".urlencode(serialize($message)));
    }
}
public function dangky(){ 
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
    $this->load->view('dangky');
    $this->load->view('footer');  
}  
public function dangnhap(){  
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

        Session::init();
          $this->load->view('header',$data);
        
        $this->load->view('dangnhap'  );
       
        $this->load->view('footer');
}
public function khoiphucmatkhau(){  
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
    $this->load->view('khoiphucmatkhau');
    $this->load->view('footer');  
}
    public function dangxuat()  
    {
        Session::init();
        Session::destroy();
        $message['msg'] = "Đăng xuất thành công";
        header('Location:' . BASE_URL . "/khachhangController/dangnhap?msg=" . urlencode(serialize($message)));
    }
    public function login_khachhang()
    {

        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $table_khachhang = 'khachhang';
        $khachhangmodel = $this->load->model('khachhangmodel');

        $count = $khachhangmodel->login($table_khachhang, $email, $password);

        if ($count == 1) {
            $result = $khachhangmodel->getLogin($table_khachhang, $email, $password);
            Session::init();
            Session::set('khachhang', true);
            Session::set('tenkh', $result[0]['tenkh']);
            Session::set('makh', $result[0]['makh']);
            $message['msg'] = "Đăng nhập thành công";
            header('Location:' . BASE_URL . "/index/homepage?msg=".urlencode(serialize($message)));
            // $message['msg'] = "Tài khoản hoặc mật khẩu sai, xin kiểm tra lại";
            // header('Location:'.BASE_URL."/khachhang/dangnhap?msg=".urlencode(serialize($message)));
        } else {
            $username = $_POST['email'];
            $password = md5($_POST['password']);
            $table_admin = 'admin';
            $loginmodel = $this->load->model('loginmodel');

            $count = $loginmodel->login($table_admin, $username, $password);

            if ($count == 0) {
                // $message['msg'] = "User hoặc mật khẩu sai, xin kiểm tra lại";
                // header("Location:".BASE_URL."/login");
                $message['msg'] = "Tài khoản hoặc mật khẩu sai, xin kiểm tra lại";
                header('Location:' . BASE_URL . "/khachhangController/dangnhap?msg=" . urlencode(serialize($message)));
            } else {
                $result = $loginmodel->getLogin($table_admin, $username, $password);
            Session::init();
            Session::set('admin', true);
            Session::set('username', $result[0]['username']);
            Session::set('id', $result[0]['id']);
                header("Location:" . BASE_URL . "/login/quanly");
            }
        }
    }
    public function insert_dangky()
    {
        $tenkh = $_POST['hoten'];
        $email = $_POST['email'];
        $password = $_POST['txtPassword'];
        $table_khachhang = "khachhang";
        $data = array(
            'tenkh' => $tenkh,
            'email' => $email,
            'password' => md5($password)

        );
        $khachhangmodel = $this->load->model('khachhangmodel');
        $result = $khachhangmodel->insertkhachhang($table_khachhang, $data);
        if ($result == 1) {

            $message['alert'] = "Đăng ký thành công";
            header('Location:' . BASE_URL . "/khachhangController/dangnhap?msg=" . urlencode(serialize($message)));

        } else {
            $message['alert'] = "Đăng ký thất bại";
            header('Location:' . BASE_URL . "/khachhangController/dangnhap?msg=" . urlencode(serialize($message)));
        }
    }
    public function donhang(){ 
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
        $this->load->view('userdonhang');
        $this->load->view('footer');  
    }  
    public function diachi(){ 
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
        $this->load->view('userdiachi');
        $this->load->view('footer');  
    }  
    
}
?>