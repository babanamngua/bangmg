<div class="container6">
    <div class="container4">

   
    <a id="tencacthuonghieuphanthoi">Best Sellers</a>  <a id="xemthem" href="#">Xem thêm<i class="bi bi-arrow-right-short"></i></a>
    <div class="container8">
    <?php 
            foreach($sanpham as $key => $sp){
                foreach($nhasanxuat as $key => $nsx){
                    
                if ($sp['makm']==14 ) {
                    if($sp['mansx'] == $nsx['mansx'] ){
    ?>   
<!-- the real one -->
    <div class="theloaidanhmuc11">
            <div class="bocbestsellers">
            <div class="iconbestsalers">sale</div> 
        <div class="anhbestsellers"><a href="<?php echo BASE_URL?>/product/chitietsanpham/<?php echo $sp['masp'] ?>"><img src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $sp['hinhsp'] ?>" class="anhtrongbestsellers"></a></div>
        <div><a href="<?php echo BASE_URL?>/product/chitietsanpham/<?php echo $sp['masp'] ?>" class="theloaibestsellers"><?php echo $nsx['tennsx']?></a></div>
        <div><a href="<?php echo BASE_URL?>/product/chitietsanpham/<?php echo $sp['masp'] ?>" class="tenbestsellers"><?php echo $sp['tensp']?></a></div>
        <div><a class="sobestsellersold"><?php echo number_format($sp['gia'],0,',','.').'đ'?></a></div>
        <div><a class="sobestsellerssale"><?php echo number_format($sp['gia'],0,',','.').'đ'?></a></div>
    </div>     
    </div>
    <?php 
            }
                }
                   
                }
            }
    ?>
<!-- /////////// -->


    </div>
 </div>
</div>