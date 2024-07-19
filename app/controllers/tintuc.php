<?php

    class tintuc extends DController{
        
        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index()
        {
             $this->tatca();
             
        }
        public function tatca(){
            Session::init();
            $table_loaisanpham = 'loaisanpham';
            $table_nhasanxuat='nhasanxuat';
            $table_baiviet = 'baiviet';
            $table_sanpham = 'sanpham';
            $sanphammodel = $this->load->model('sanphammodel');
            $loaisanphammodel = $this->load->model('loaisanphammodel');
            $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
            $baivietmodel= $this->load->model('baivietmodel');
            $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);
            $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
            $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
            $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);
            $data['baiviet']=$baivietmodel->baiviet_home($table_baiviet);
            $this->load->view('header',$data);
            $this->load->view('listtintuc',$data);
            $this->load->view('footer');
        }
        // public function danhmuc($id){
        //     Session::init();
        //     $table = 'tbl_category_product';
        //     $table_post = 'tbl_category_post';
        //     $post='tbl_post';
        //     $categorymodel = $this->load->model('categorymodel');
        //     $data['category'] = $categorymodel->category_home($table);
        //     $data['category_post'] = $categorymodel->categorypost_home($table_post);
        //     $data['postbyid'] = $categorymodel->postbyid_home( $table_post,$post,$id);
        //     $this->load->view('header',$data);
        //     $this->load->view('categorypost',$data);
        //     $this->load->view('footer');

        //     Session::init();
        //     $table_loaisanpham = 'loaisanpham';
        //     $table_nhasanxuat='nhasanxuat';
        //     $table_tintuc = 'tintuc';
        //     $table_sanpham = 'sanpham';
        //     $sanphammodel = $this->load->model('sanphammodel');
        //     $loaisanphammodel = $this->load->model('loaisanphammodel');
        //     $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
        //     $tintucmodel= $this->load->model('tintucmodel');
        //     $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);
        //     $data['sanpham_by_id'] = $sanphammodel->sanphambyid_home($table_loaisanpham,$table_sanpham,$id);
        //     $data['tintuc_by_id'] = $tintucmodel->tintucbyid_home($table_tintuc,$id);
        //     $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
        //     $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
        //     $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);

        //     $this->load->view('header',$data);
        //     $this->load->view('listtintuc',$data);
        //     $this->load->view('footer');
        // }
        public function chitiettin($id){
            Session::init();
            $table_loaisanpham = 'loaisanpham';
            $table_nhasanxuat='nhasanxuat';
            $table_baiviet = 'baiviet';
            $table_sanpham = 'sanpham';

            $cond=" $table_baiviet.mabv='$id'";
            $sanphammodel = $this->load->model('sanphammodel');
            $loaisanphammodel = $this->load->model('loaisanphammodel');
            $nhasanxuatmodel= $this->load->model('nhasanxuatmodel');
            $baivietmodel= $this->load->model('baivietmodel');
            $data['sanphamtatca_home'] = $sanphammodel->sanphamtatca_home( $table_loaisanpham);
            $data['loaisanpham']=$loaisanphammodel->loaisanpham($table_loaisanpham);
            $data['sanpham']=$sanphammodel->sanpham_menu($table_sanpham);
            $data['nhasanxuat']=$nhasanxuatmodel->nhasanxuat_menu($table_nhasanxuat);

            $data['chitietbaiviet'] = $baivietmodel->chitietbaiviet_home($table_baiviet,$cond);
            
            foreach($data['chitietbaiviet'] as $key => $bv){
                $mabv = $bv['mabv'];
            }
            $cond_related = " $table_baiviet.mabv='$id' AND $table_baiviet.mabv NOT IN('$id') ";
            $data['related'] = $baivietmodel->related_post_home($table_baiviet,$cond_related);
            
            $this->load->view('header',$data);
            $this->load->view('chitiettintuc',$data);
            $this->load->view('footer');
        }

            
    }
    
?>