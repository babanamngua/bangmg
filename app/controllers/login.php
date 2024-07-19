<?php
class login extends DController
{
    public function __construct()
    {
        $message = array();
        $data = array();     
        parent::__construct();
    }
    public function index()
    {
        $this->login();
       
    }
    public function login()
    {
        $this->load->view('header');
        Session::init();
        if(Session::get("login") == true)
        {
            header("Location:" . BASE_URL . "/login/quanly");
        }
        $this->load->view('cpanel/login');
        $this->load->view('footer');
    }
    public function quanly()
    {
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/quanly');
        $this->load->view('cpanel/footer');
    }
    public function xacthuc_login()
    {
      $username =$_POST['username'];
      $password = md5($_POST['password']);
        $table_admin = 'admin';
        $loginmodel = $this->load->model('loginmodel');
        $count = $loginmodel->login($table_admin, $username, $password);
        if($count == 0 )
        {
            $message['msg'] = "Tài khoản hoặc mật khẩu sai, xin kiểm tra lại!";
            header("Location:" . BASE_URL . "/login");
        }else
        {
            $result = $loginmodel->getlogin($table_admin, $username, $password);
            Session::init();
            Session::set('login',true);
            Session::set('username',$result[0]['username']);
            Session::set('userid',$result[0]['id']);
            header("Location:" . BASE_URL . "/login/quanly");
        }
    }
    public function logout()
    {
        Session::init();
        Session::destroy();
        header("Location:" . BASE_URL . "/login");

    }
  
    
}
?>