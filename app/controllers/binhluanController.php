<?php
class binhluanController extends DController
{
    public function __construct()
    {
        Session::checkSession();
        parent:: __construct();
    }
    public function index()
    {
        $this->binhluan();
    }
    public function binhluan()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/binhluan/list_binhluan');
        $this->load->view('cpanel/footer');
    }
    
    public function add_binhluan()
    {
        
        $this->load->view('cpanel/header');
        $this->load->view('cpanel/menu');
        $this->load->view('cpanel/binhluan/add_binhluan');
        $this->load->view('cpanel/footer');
    }
    public function insert_binhluan(){
        $tensp = $_POST['tensp'];
        $tenkh = $_POST['tenkh'];
        $sodienthoai = $_POST['sodienthoai'];
        $table_binhluan = "binhluan";
        $data= array(
           'tensp' => $tensp,
           'tenkh' => $tenkh,
           'sodienthoai' => $sodienthoai,
           'ngaygio' => $tennsx

        );
        $binhluanmodel = $this->load->model('binhluanmodel');
        $result = $binhluanmodel->insertbinhluan($table_binhluan,$data);
        if($result == 1){
           $message['msg']= "Thêm bình luận thành công";
           header('Location:'.BASE_URL."/binhluanController/list_binhluan?msg=".urlencode(serialize($message)));

        }else{
           $message['msg']= "Thêm bình luận thất bại";
           header('Location:'.BASE_URL."/binhluanController/list_binhluan?msg=".urlencode(serialize($message)));
        }
   }
   public function list_binhluan(){
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $table_binhluan = "binhluan";
   
    $binhluanmodel = $this->load->model('binhluanmodel');
    $data['binhluan'] = $binhluanmodel->binhluan($table_binhluan);
    $this->load->view('cpanel/binhluan/list_binhluan',$data);
    $this->load->view('cpanel/footer');
}

public function delete_sanpham($id){
    $table = "tbl_product";
    $cond = "id_product='$id'";
    $categorymodel = $this->load->model('categorymodel');
    $result = $categorymodel->deleteproduct($table,$cond);
    if($result == 1){
        $message['msg']= "Xóa sản phẩm thành công";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));

     }else{
        $message['msg']= "Xóa sản phẩm thất bại";
        header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
     }
}
public function edit_sanpham($id){

    $table = "tbl_product";
    $table_category = "tbl_category_product";

    $cond = "id_product='$id'";
    $categorymodel = $this->load->model('categorymodel');
    $data['productbyid'] = $categorymodel->productbyid($table,$cond);
    $data['category'] = $categorymodel->category($table_category);
    $this->load->view('cpanel/header');
    $this->load->view('cpanel/menu');
    $this->load->view('cpanel/product/edit_product',$data);
    $this->load->view('cpanel/footer');
}

public function update_sanpham($id){
    $table = "tbl_product";
    $cond = "id_product='$id'";
    $categorymodel = $this->load->model('categorymodel');
    $hot = $_POST['product_hot'];
    $title = $_POST['title_product'];
    $price = $_POST['price_product'];
    $desc = $_POST['desc_product'];
    $quantity = $_POST['quantity_product'];
    $category = $_POST['category_product'];
    $image = $_FILES['image_product']['name'];
    $tmp_image = $_FILES['image_product']['tmp_name'];  
    $div = explode('.',$image);
    $file_ext = strtolower(end($div));
    $unique_image = $div[0].time().'.'. $file_ext ;
    $path_uploads = "public/uploads/product/".$unique_image;
    

   if($image){
    $data['productbyid']=$categorymodel -> productbyid($table,$cond);
    foreach ($data['productbyid']  as $key => $value){
       $path_unlink= "public/uploads/product";
       unlink($path_unlink.$value['image_product']);
    }
    $data= array(
       'title_product' => $title,
       'price_product' => $price,
       'desc_product' => $desc,
       'quantity_product'=> $quantity ,
       'product_hot' =>$hot,
       'image_product' =>   $unique_image,
       'id_category_product' =>$category 
    );
    move_uploaded_file($tmp_image, $path_uploads);
}else{
    $data= array(
        'title_product' => $title,
        'price_product' => $price,
        'desc_product' => $desc,
        'product_hot' =>$hot,

        'quantity_product'=> $quantity ,
        // 'image_product' =>   $unique_image,
        'id_category_product' =>$category 
     );
}
   
    $result = $categorymodel->updateproduct($table,$data,$cond);
    if($result == 1){
      
        $message['msg']= "Cập nhật sản phẩm thành công";
       header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));

    }else{
       $message['msg']= "Cập nhật sản phẩm thất bại";
       header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
    }
}
}
?>