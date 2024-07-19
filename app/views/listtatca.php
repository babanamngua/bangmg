
<div  class="container8">
<div class="contain4">
<div class="tenlistsanhpham">Trang chủ > Danh Mục</div>
    <div class="contain4">
        <!-- left -->
        <div class="listsanphamleft">

        <div class="boliclistsanpham">Bộ lọc</div>
        <div class="boctinhtranglishlai">
        <?php 
            $total=0;
            foreach($sanpham as $key => $sp){
                foreach($nhasanxuat as $key => $nsx){
                    
                        $total+=$sp['soluong'];
   
                }
            }
            ?>
        <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>TÌNH TRẠNG</div>
        <ul>
        <li>Còn hàng<a class="sohangcontrongkho">(<?php echo $total; ?>)</a></li>
        </ul>
        </div>
        <div class="cachlishbentrai">-------------------------------</div>
        <div class="boctinhtranglishlai">
        <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>THƯƠNG HIỆU</div>
        <ul>
        <?php 
            $total=0;
            foreach($sanpham as $key => $sp){
                foreach($nhasanxuat as $key => $nsx){
                    if($sp['mansx'] == $nsx['mansx']){
                        $total++;
            ?> 
            <li><?php echo $nsx['tennsx']?><a class="sohangcontrongkho">(<?php echo $total ?>)</a></li>
            <?php
                    }
                }
            }
            ?>
        </ul>
        </div>
        <div class="cachlishbentrai">-------------------------------</div>
        <div class="boctinhtranglishlai">
        <div class="tinhtranglistsanpham"><i class="bi bi-justify-right"></i>GIÁ (₫)</div>
       <div class="price-input">
<div class="field">
    <span>Min</span>
    <input type="number" class="input-min" value="2500">
</div>    
<div class="separator">-</div>  
<div class="field">
    <span>Max</span>
    <input type="number" class="input-min" value="7500">
</div>    
       </div>
       <div class="slider">
        <div class="progress"></div>
       </div>
       <div class="range-input">
    <input type="range" class="range-min" min="0" max="100000" value="0" step="100">
    <input type="range" class="range-max" min="0" max="100000" value="100000" step="100">
       </div>
        </div>
</div>
        </div>

        <!-- right -->
        <div class="listsanphamright">
       
            <div class="sapxephienthi">
                <div class="hienthisoluong">
                <div class="menu__bar1">
<ul class="no-bullets">
<?php 
            $total=0;
            foreach($sanpham as $key => $sp){
                foreach($nhasanxuat as $key => $nsx){
                    
                    if($sp['mansx'] == $nsx['mansx']){
                        $total++;
                    }
                }
                    }
                
     ?>  
<li><a class="form-listsanpham"><?php echo $total?> sản phẩm</a></li>
<li><a class="form-listsanpham">Hiển thị: mỗi trang&nbsp;<i class="bi bi-chevron-down"></i></a>
<div class="dropdown__list1 dropdown_menu-6">
    <ul>
        <li><a class="nameonlist-3" href="#">4 mỗi trang</a></li>
        <li><a class="nameonlist-3" href="#">8 mỗi trang</a></li>
        <li><a class="nameonlist-3" href="#">12 mỗi trang</a></li>
    </ul>
</div>
</li>

</ul>
</div>
                </div>
            </div>
            
            <div class="sanphamlistsanpham">
            <?php 
            foreach($sanpham as $key => $sp){
                foreach($nhasanxuat as $key => $nsx){
                    if($sp['mansx'] == $nsx['mansx'] ){
                        
            ?>
            <!-- the real 1 -->
            <div class="theloaidanhmuc11">
            <div class="bocbestsellers">
            <!-- <div class="iconbestsalers">sale</div>  -->
        <div class="anhbestsellers"><a href="<?php echo BASE_URL?>/product/chitietsanpham/<?php echo $sp['masp'] ?>"><img src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $sp['hinhsp']?>" class="anhtrongbestsellers"></a></div>
        <div><a href="#" class="theloaibestsellers"><?php echo $nsx['tennsx']?></a></div>
        <div><a href="<?php echo BASE_URL?>/product/chitietsanpham/<?php echo $sp['masp'] ?>" class="tenbestsellers"><?php echo $sp['tensp']?></a></div>
        <div><a class="sobestsellersold"><?php echo number_format($sp['gia'],0,',','.').'đ'?></a></div>
        <!-- <div><a class="sobestsellerssale">1.150.00d</a></div> -->
        </div>     
        </div>
        <?php 
                    
                    }
            }
        }
            ?>
            <!-- //// -->

            </div>
            
            </div>
            
            <div class="listtrang">

            <!-- phan trang o day, chua lam` -->
            </div>
        </div>
    </div>
    </div>
</div>