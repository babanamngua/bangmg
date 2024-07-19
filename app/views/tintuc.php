<div    class="container8">
    <div class="contain4">
    <a id="tencacthuonghieuphanthoi">Tin tức</a>  <a id="xemthem" href="#">Xem thêm<i class="bi bi-arrow-right-short"></i></a>
    <?php 
            foreach($baiviet as $key => $bv){
            
    ?>
      <!-- real -->   
    <div class="boctintcuc">
        <div class="bocmoitintuc">
        <a class="totnhat" href="<?php echo BASE_URL?>/tintuc/chitiettin/<?php echo $bv['mabv'] ?>">
<div class="hinhanhtintuc"><img class="hinhanhtrongtintuc" src="<?php echo BASE_URL ?>/public/uploads/baiviet/<?php echo $bv['anh'] ?>"></div>       
        <div class="mieutatintuc"><?php echo $bv['tenbv'] ?></div>
        <div class="thoigian">27 Thg 11, 2022</div>
    </a>
</div>
  </div>
<!-- /////// -->
<?php 
    }     
?> 


  
    </div>
</div>