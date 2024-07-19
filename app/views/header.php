<!DOCTYPE html>
<html>

<head>
    <title>babanamngua</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/public/css/dangky.css">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700&subset=latin,cyrillic'
        rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="preloader"></div>
    <div class="container">
        <div class="info_top">
            <div class="bg_in1">
                <p class="p_infor">

                    <span><i class="fa fa-envelope" aria-hidden="true"></i>Mu Sa Sa Liêm </span>
                    <span><i class="fa fa-phone" aria-hidden="true"></i> DH51902901</span>
                </p>
            </div>
        </div>
    </div>
    <div class="container1">
        <div class="info_top1">
            <table class="tableheader" border="0">
                <tr>
                    <td width="20%">
                        <div class="logo">
                            <a href="<?php echo BASE_URL ?>/"><img
                                    src="<?php echo BASE_URL ?>/public/img/logo_chinh.png" height="50"
                                    alt="header_logo.png" /></a>
                        </div>
                    </td>
                    <td width="45%">
                        <div>
                            <form action="" id="search-box">
                                <input type="text" id="search-text" placeholder="Tìm kiếm . . .">
                                <button id="search-btn"><i class="bi bi-search"></i></i></button>
                            </form>
                        </div>
                    </td>
                    <td width="15%">
                        <div>
                            <?php 
                                if(Session::get('khachhang'))
                                {   
                                ?>
                            <a id="form-login">Xin chào <?php if(isset($_SESSION['tenkh'])){echo $_SESSION['tenkh'];} ?></a><br />

                            <?php
                                }
                                else{

                                
                                ?>
                            <a id="form-login">Đăng nhập / Đăng ký</a><br />
                            <?php
                                }
                                ?>
                            <div class="form-dangnhap1">

                                <button class="click"><a id="form-taikhoan1">Tài khoản&nbsp;<i
                                            class="bi bi-chevron-down"></i></a></button>

                                <div class="list">
                                    <?php 
                                if(Session::get('khachhang'))
                                {   
                                ?>
                                    <div class="links1">
                                        <div class="dadangnhap001"><a href="<?php echo BASE_URL ?>/khachhangController/donhang">Đơn hàng</div>
                                        <div class="dadangnhap002"><a href="<?php echo BASE_URL ?>/khachhangController/diachi">Địa chỉ</div>
                                        <div class="dadangnhap003"><a
                                                href="<?php echo BASE_URL ?>/khachhangController/dangxuat">Đăng xuất</a>
                                        </div>
                                    </div>

                                    <?php
                                }
                                else
                                {
                                ?>
                                    <div class="links">
                                        <div id="dangnhap001">Đăng nhập</div>
                                        <a class="dangnhap003">Nhập email và mật khẩu</a>
                                        <form action="<?php echo BASE_URL ?>/khachhangController/login_khachhang"
                                            method="POST">
                                            <div id="dangnhap002">

                                                <div class="form-group">
                                                    <input type="text" name="email" required>
                                                    <label for="">Email</label>
                                                </div><br />
                                                <div class="form-group">
                                                    <input type="password" name="password" required>
                                                    <label for="">Mật khẩu</label>
                                                </div><br />
                                                <div class="form-group">
                                                    <input type="submit" value="Đăng nhập" id="id-btn-login">
                                                </div>
                                            </div>
                                        </form>
                                        <div class="dangnhap004">Khách mới? <a
                                                href="<?php echo BASE_URL ?>/khachhangController/dangky">Tạo tài
                                                khoản</a></div>
                                        <div class="dangnhap005">Mất mật khẩu? <a
                                                href="<?php echo BASE_URL ?>/khachhangController/khoiphucmatkhau">Khôi
                                                phục mật khẩu</a></div>
                                    </div>
                                </div>
                                <?php 
                            }
                            ?>

                                <!-- <div class="list">
<div class="links1">
<div class="dadangnhap001">Đơn hàng</div>
<div class="dadangnhap002">Địa chỉ</div>
<div class="dadangnhap003">Đăng xuất</div>
</div>
</div> -->

                            </div>


                        </div>
                    </td>
                    <td width="15%">
                        <div>
                            <?php 
        $total = 0;
    if (isset($_SESSION['shopping_cart'])) {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            $total++;
        }
    }
         ?>
                            <a id="form-giohang" href="<?php echo BASE_URL ?>/giohang/giohang">
                                <p class="giohangbienhinh"><?php echo $total;?></p>
                                <i class="bi bi-cart"  ></i>&nbsp;&nbsp;&nbsp;Giỏ hàng</a>
                                
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="container2">
        <div class="info_top2">
            <div class="menu__bar">
                <ul class="no-bullets">
                    <li><a class="form-danhmuc1" href="<?php echo BASE_URL ?>/">Trang chủ</a></li>
                    <li><a class="form-danhmuc1" href="<?php echo BASE_URL ?>/product/danhmuc/">Danh mục&nbsp;<i
                                class="bi bi-chevron-down"></i></a>
                        <div class="dropdown__menu dropdown_menu-7">
                            <ul>
                                <?php
            foreach($loaisanpham as $key => $lsp){
        ?>
                                <li><a class="nameonmenu-1"
                                        href="<?php echo BASE_URL ?>/product/listtheloai/<?php echo $lsp['maloai']?>"><?php echo $lsp['tenloai']?></a>

                                    <div class="dropdown__menu2 dropdown_menu-6">
                                        <ul>
                                            <?php
                    foreach($nhasanxuat as $key => $nsx){
                    foreach($sanpham as $key => $sp){
                        if($sp['maloai']==$lsp['maloai'] && $sp['mansx']==$nsx['mansx']){
                ?>
                                            <li><a class="nameonmenu-2"
                                                    href="<?php echo BASE_URL ?>/product/listnhasanxuat/<?php echo $nsx['mansx']?>"><?php echo $nsx['tennsx']?></a>
                                            </li>
                                            <!-- /////////// -->
                                            <?php
                        }
                    }  
                }
                ?>

                                        </ul>
                                    </div>
                                </li>
                                <?php
        }
        ?>
                                <!-- /////////// -->


                            </ul>
                        </div>
                    </li>

                    <?php
     foreach($loaisanpham as $key => $lsp){
        
?>
                    <li><a class="form-danhmuc1"
                            href="<?php echo BASE_URL ?>/product/listtheloai/<?php echo $lsp['maloai']?>"><?php echo  $lsp['tenloai']?>&nbsp;<i
                                class="bi bi-chevron-down"></i></a>
                        <div class="dropdown__menu1 dropdown_menu-6">
                            <ul>
                                <?php
                foreach($nhasanxuat as $key => $nsx){
                    foreach($sanpham as $key => $sp){
                        if($sp['maloai']==$lsp['maloai'] && $sp['mansx']==$nsx['mansx']){
        ?>
                                <li><a class="nameonmenu-3"
                                        href="<?php echo BASE_URL ?>/product/listnhasanxuat/<?php echo $nsx['mansx']?>"><?php echo $nsx['tennsx']?></a>
                                </li>
                                <?php
                        }
                    }  
         }
        ?>
                            </ul>
                        </div>
                    </li>
                    <?php
        
    }
?>
                    <li><a class="form-danhmuc1" href="<?php echo BASE_URL ?>/tintuc/tatca">Tin tức</a></li>
                    <li><a class="form-danhmuc1" href="<?php echo BASE_URL ?>/index/lienhe">Liên hệ</a></li>
                </ul>
            </div>
        </div>

    </div>