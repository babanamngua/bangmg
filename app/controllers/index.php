<?php
class index extends DController
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function index()
    {
        $this->homepage();
       
    }
    public function homepage()
    {
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
         $this->load->view('banner');
         $this->load->view('bosieutap');
         $this->load->view('cacnhaphanphoi');
         $this->load->view('bestsellers',$data);
          $this->load->view('tintuc',$data);
        //$this->load->view('giohang');
        // $this->load->view('listsanpham',$data);
        $this->load->view('footer');
    }
    public function notfound()
    {
        Session::init();
        $this->load->view('header');
        $this->load->view('404');
        $this->load->view('footer');
    }
    public function lienhe()
    {
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
        $this->load->view('lienhe');
        $this->load->view('footer');
    }
    public function tintuc()
    {
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
        $this->load->view('tintuc');
        $this->load->view('footer');
    }
}
?>