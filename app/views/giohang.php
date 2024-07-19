<div class="container8">
    <div class="contain4">
        <div class="boliclistsanpham">Giỏ hàng của tôi</div>
        <div class="contain4">
            <!--  left-->
            <div class="giohangleft">
                <div class="giohangsanpham"></div>
                <table class="tablegiohangsanpham">
                    <tr class="tablegiohangsanpham1">
                        <td>Sản phẩm</td>
                        <td>Số lượng</td>
                        <td>Tổng</td>
                    </tr>
                    <!-- real  -->
                    <?php 
                                 if(isset($_SESSION['giohang'])){
                                    ?>
                           <form action='<?php echo BASE_URL ?>/giohang/updategiohang' method="POST">
                                 <?php 
                                
                                    $total = 0;
                                 foreach($_SESSION['giohang'] as $key => $value)  {
                                    $subtotal = $value['soluong']*$value['gia'];
                                    $total += $subtotal;
                                 ?>
                    <tr class="tablegiohangsanpham2">
                        <td>
                            
                            <div class="bocsanphamgiohang">
                                <img src="<?php echo BASE_URL ?>/public/uploads/sanpham/<?php echo $value['hinhsp'] ?>"
                                    class="anhtronggiohang">
                                <div class="bocsanphamgiohang1">
                                    <div class="bocthuonghieugiohang">LAMZU</div>
                                    <div class="boctengiohang"><?php echo $value['tensp'] ?></div>
                                    <div>
                                        <a class="boctienold"><?php echo number_format( $value['product_price'],0,',','.').'đ' ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="wrapper">
                                <span class="minus">-</span>
                                <span class="num">01</span>
                                <span class="plus">+</span>
                            </div>
                        </td>
                        <td><a class="boctienold1">1990000</a>
                        <input type="submit" value="xóa">

                    </td>
                        
                    </tr>
                    <?php
                                
                            }
                            ?>
                         </form>
                         <?php
                                
                            }
                            ?>
                </table>
            </div>
            <!-- right -->
            <div class="giohangright">
                <div class="giohangsanpham">
                    <a class="tongcongbenhdaynolalam">Tổng cộng:</a>
                    <a class="tongcongbenhdaynolalam">100300 VND</a>
                </div>
                <div class="nutdatmuabengiohangnha">
                    <div class="form-group">
                        <input type="submit" value="Thanh toán" id="id-btn-login">
                    </div>
                </div>
            </div>
        </div>
    </div>