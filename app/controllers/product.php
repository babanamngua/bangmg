<?php

    class product extends DController{
        
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index()
        {
             $this->danhmuc();
        }
        // public function tatca()
        // {
        //     Session::init();
           
        //     $table_loaisanpham = 'loaisanpham';
        //     $table_nhasanxuat='nhasanxuat';
        //     $table_sanpham = 'sanpham';
            
        //     $loaisanphammodel = $this->load->model('loaisanphammodel');
        //     $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
        //     $sanphammodel = $this->load->model('sanphammodel');

        //     $data['loaisanpham'] = $loaisanphammodel->loaisanpham( $table_loaisanpham);

        //     $data['listsanpham'] = $sanphammodel->sanphamtatca_home($table_sanpham);
        //     $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
        //     $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
        //     $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);

        //     $this->load->view('header',$data);
        //     $this->load->view('listsanpham',$data);
        //     $this->load->view('footer');
        // }
        
        public function danhmuc(){
            Session::init();
            $table_loaisanpham = 'loaisanpham';
            $table_nhasanxuat='nhasanxuat';
            $table_sanpham = 'sanpham';
            $sanphammodel = $this->load->model('sanphammodel');
            $loaisanphammodel = $this->load->model('loaisanphammodel');
            $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
            $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);    
            $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
            $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
            $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);
        
            $this->load->view('header',$data);
            $this->load->view('listtatca',$data);
            $this->load->view('footer');
        }
        public function listtheloai($id){
            Session::init();
            $table_loaisanpham = 'loaisanpham';
            $table_nhasanxuat='nhasanxuat';
            $table_sanpham = 'sanpham';
            $sanphammodel = $this->load->model('sanphammodel');
            $loaisanphammodel = $this->load->model('loaisanphammodel');
            $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
            $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);
            $data['sanpham_by_id'] = $sanphammodel->sanphambyid_home($table_loaisanpham,$table_sanpham,$id);
            $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
            $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
            $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);
            $data['nhasanxuat_by_id'] = $nhasanxuatmodel->nhasanxuatbyid_home($table_nhasanxuat,$table_sanpham,$id);

            $this->load->view('header',$data);
            $this->load->view('listsanpham',$data);
            $this->load->view('footer');
        }
        public function listnhasanxuat($id){
            Session::init();
            $table_loaisanpham = 'loaisanpham';
            $table_nhasanxuat='nhasanxuat';
            $table_sanpham = 'sanpham';
            $sanphammodel = $this->load->model('sanphammodel');
            $loaisanphammodel = $this->load->model('loaisanphammodel');
            $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
            $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);
            $data['sanpham_by_id'] = $sanphammodel->sanphambyid_home($table_loaisanpham,$table_sanpham,$id);
            $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
            $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
            $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);
            $data['nhasanxuat_by_id'] = $nhasanxuatmodel->nhasanxuatbyid_home($table_nhasanxuat,$table_sanpham,$id);

            $this->load->view('header',$data);
            $this->load->view('listthuonghieu',$data);
            $this->load->view('footer');
        }
        // public function nhasanxuat($maloai){
        //     Session::init();
        //     $table_loaisanpham = 'loaisanpham';
        //     $table_nhasanxuat='nhasanxuat';
        //     $table_sanpham = 'sanpham';
        //     $sanphammodel = $this->load->model('sanphammodel');
        //     $loaisanphammodel = $this->load->model('loaisanphammodel');
        //     $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
        //     $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);
        //     $data['sanpham_by_nsx'] = $sanphammodel->sanphambynsx_home($table_loaisanpham,$table_sanpham,$table_nhasanxuat,$maloai);
        //     $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
        //     $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
        //     $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);

        //     $this->load->view('header',$data);
        //     $this->load->view('sanphamnsx',$data);
        //     $this->load->view('footer');
        // }
        public function chitietsanpham($id){
            Session::init();
            $table_loaisanpham = 'loaisanpham';
            $table_nhasanxuat='nhasanxuat';
            $table_sanpham = 'sanpham';
            $cond = "$table_sanpham.maloai = $table_loaisanpham.maloai AND $table_sanpham.masp='$id'";
            $sanphammodel = $this->load->model('sanphammodel');
            $loaisanphammodel = $this->load->model('loaisanphammodel');
            $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');

            $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);
            $data['chitietsanpham'] = $sanphammodel->chitietsanpham($table_loaisanpham,$table_sanpham,$cond);
            foreach($data['chitietsanpham'] as $maloai => $loaisp){
                $maloai = $loaisp['maloai'];
            }
            
            $cond_related = "$table_sanpham.maloai = $table_loaisanpham.maloai 
            AND $table_loaisanpham.maloai = '$maloai' AND $table_sanpham.masp NOT IN('$id') ";
            $data['related'] = $sanphammodel->related_product_home($table_loaisanpham,$table_sanpham,$cond_related);

            $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
            $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
            $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);

            $this->load->view('header',$data);           
            $this->load->view('chitietsanpham',$data);
            $this->load->view('footer');
        }
        
    }
    
?>