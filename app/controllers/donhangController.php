<?php
class donhangController extends DController
{
    public function __construct()
    {
        Session::checkSession();
        parent:: __construct();
    }
    public function index()
    {
        $this->donhang();
    }
    public function donhang()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/donhang/donhang');
        $this->load->view('cpanel/footer');
    }
    public function add_donhang()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/donhang/add_donhang');
        $this->load->view('cpanel/footer');
    }
    public function list_donhang(){
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $table_donhang = "donhang";
       
        $donhangmodel = $this->load->model('donhangmodel');
        $data['donhang'] = $donhangmodel->donhang($table_donhang);
        $this->load->view('cpanel/donhang/list_donhang',$data);
        $this->load->view('cpanel/footer');
    }
}

?>