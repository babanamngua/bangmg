<?php
   foreach($chitietsanpham as $key => $value){
            $tensp = $value['tensp'];
            $tenloai = $value['tenloai'];
            $maloai=$value['maloai'];
            $anh=$value['hinhsp'];
            $gia=$value['gia'];

            foreach($nhasanxuat as $key => $value1){
                if($value['mansx'] == $value1['mansx']){
            $hinh = $value1['hinh'];
                }
            }
   }
?>



<div class="container8">
    <div class="contain4">
        <!-- left -->
        <div class="chitietsanphamleft">
            <!-- <div class="iconbestsalers">sale</div> -->
            <img class="hinhanhchitietsanpham1" src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $anh ?>">
        </div>
        <!-- right -->
        <div class="chitietsanphamright">

            <img class="hinhanhchitietsanpham2"
                src="<?php echo BASE_URL ?>/public/uploads/nhasanxuat/<?php echo $hinh ?>">
            <div class="tenmotachitietsanpham"><?php echo $tensp?></div>
            <table border="0" class="bangchitietsanpham">
                <tr>
                    <td><img class="hinhanhchitietsanpham3" src="<?php echo BASE_URL ?>/public/img/contact/free.png">
                    <td>
                        <ul class="anhtruaroixongantoi">
                            <li>
                                <a class="toilucbienhinhroisao">Giao hàng siêu tốc</a>
                            </li>
                            <li>
                                <a class="toilucbienhinhroisao1">Trong vòng 2 giờ tại TP.HCM</a>
                            </li>
                        </ul>
                    </td>
                    </td>

                    <td><img class="hinhanhchitietsanpham3"
                            src="<?php echo BASE_URL ?>/public/img/contact/warranty.png">
                    <td>
                        <ul class="anhtruaroixongantoi">
                            <li>
                                <a class="toilucbienhinhroisao">Hàng mới, chính hãng 100%</a>
                            </li>
                            <li>
                                <a class="toilucbienhinhroisao1">Hoàn 200% nếu phát hiện hàng giả</a>
                            </li>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <td><img class="hinhanhchitietsanpham3" src="<?php echo BASE_URL ?>/public/img/contact/trial.png">
                    <td>
                        <ul class="anhtruaroixongantoi">
                            <li>
                                <a class="toilucbienhinhroisao">Hoàn tiền khi không hài lòng</a>
                            </li>
                            <li>
                                <a class="toilucbienhinhroisao1">Xem thêm tại chính sách hoàn tiền</a>
                            </li>
                        </ul>
                    </td>
                    </td>

                    <td><img class="hinhanhchitietsanpham3" src="<?php echo BASE_URL ?>/public/img/contact/service.png">
                    <td>
                        <ul class="anhtruaroixongantoi">
                            <li>
                                <a class="toilucbienhinhroisao">Miễn phí quẹt thẻ</a>
                            </li>
                            <li>
                                <a class="toilucbienhinhroisao1">Hỗ trợ trả góp 0%</a>
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
            <div class="giachitietsanphamold"><?php  echo number_format($gia,0,',','.').'đ' ?></div>
            <!-- <div class="giachitietsanphamnew">1040000d</div> -->
            <div class="chonmua" onclick="return giohang(371);">
                <input type="submit" value="CHỌN MUA">
            </div>
        </div>

        <div class="sanphamcungnhasanxuat">
            <a id="tencacthuonghieuphanthoi">Sản phẩm cùng nhà sản xuất</a> <a id="xemthem" href="#">Xem thêm<i
                    class="bi bi-arrow-right-short"></i></a>
            <div class="sanphamcungnhasanxuat1">
                <div class="sanphamcungnhasanxuat3">



                    <?php
 foreach($sanpham as $key => $sp){
    foreach($chitietsanpham as $key => $nsx){
        foreach($nhasanxuat as $key => $value1){
            if($sp['mansx'] == $value1['mansx']){
    if($sp['mansx'] == $nsx['mansx']){
?>
                    <!-- the real 1 -->
                    <div class="theloaidanhmuc11">
                        <div class="bocbestsellers">
                            <!-- <div class="iconbestsalers">sale</div>  -->
                            <div class="anhbestsellers"><a
                                    href="<?php echo BASE_URL?>/product/chitietsanpham/<?php echo $sp['masp'] ?>"><img
                                        src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $sp['hinhsp']?>"
                                        class="anhtrongbestsellers"></a></div>
                            <div><a href="#" class="theloaibestsellers"><?php echo $value1['tennsx']?></a></div>
                            <div><a href="<?php echo BASE_URL?>/product/chitietsanpham/<?php echo $sp['masp'] ?>"
                                    class="tenbestsellers"><?php echo $sp['tensp']?></a></div>
                            <div><a class="sobestsellersold"><?php echo number_format($sp['gia'],0,',','.').'đ'?></a>
                            </div>
                            <!-- <div><a class="sobestsellerssale">1.150.00d</a></div> -->
                        </div>
                    </div>
                    <?php
    }}}}}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>