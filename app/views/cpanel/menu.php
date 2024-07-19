<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            
            <ul class="nav menu">
                <li class="active"><a href="<?php echo BASE_URL ?>/login/dashboard"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ quản trị</a></li>
                <li class="parent ">
                    <a href="<?php echo BASE_URL ?>/khachhangController/list_khachhang">
                        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý khách hàng
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li>
                            <a href="<?php echo BASE_URL ?>/khachhangController/add_khachhang">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                                Thêm mới
                            </a>
                        </li>
                    </ul>			
                </li>
                <li class="parent ">
                    <a >
                        <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý danh mục
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li>
                            <a class="" href="<?php echo BASE_URL ?>/loaisanphamController/list_loaisp">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý loại sản phẩm
                            </a>
                        </li>
                        <li>
                            <a class="" href="<?php echo BASE_URL ?>/nhasanxuatController/list_nhasanxuat">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý nhà sản xuất
                            </a>
                        </li>
                        <li>
                            <a class="" href="<?php echo BASE_URL ?>/sanphamController/list_sanpham">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Quản lý sản phẩm
                            </a>
                        </li>
                    </ul>		
                    	
                </li>
                <!-- <li class="parent ">
                    <a href="<?php echo BASE_URL ?>/sanphamController/list_sanpham">
                        <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý sản phẩm
                    </a>
                    <ul class="children collapse" id="sub-item-3">
                        <li>
                            <a class="" href="<?php echo BASE_URL ?>/sanphamController/add_sanpham">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>				
                </li> -->
                <li class="parent ">
                    <a href="<?php echo BASE_URL ?>/baivietController/list_baiviet">
                        <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý bài viết
                    </a>
                    <ul class="children collapse" id="sub-item-4">
                        <li>
                            <a class="" href="<?php echo BASE_URL ?>/baivietController/add_baiviet">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>				
                </li>
                <li class="parent ">
                    <a href="<?php echo BASE_URL ?>/donhangController/list_donhang">
                        <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg></use></svg></span> Quản lý đơn hàng
                    </a>
                   	
                </li>
                <li class="parent ">
                    <a href="<?php echo BASE_URL ?>/binhluanController/list_binhluan">
                        <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg></span> Quản lý bình luận
                    </a>

                </li>
                <li class="parent ">
                    <a href="<?php echo BASE_URL ?>/khuyenmaiController/list_khuyenmai">
                        <span data-toggle="collapse" href="#sub-item-6"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý khuyến mãi
                    </a>
                    <ul class="children collapse" id="sub-item-6">
                        <li>
                            <a class="" href="<?php echo BASE_URL ?>/khuyenmaiController/add_khuyenmai">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>			
                </li>
                <!-- <li class="parent ">
                    <a href="<?php echo BASE_URL ?>/nhasanxuatController/list_nhasanxuat">
                        <span data-toggle="collapse" href="#sub-item-7"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý nhà sản xuất
                    </a>
                    <ul class="children collapse" id="sub-item-7">
                        <li>
                            <a class="" href="<?php echo BASE_URL ?>/nhasanxuatController/add_nhasanxuat">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>			
                </li> -->
               

                <li role="presentation" class="divider"></li>
                <li><a href="<?php echo BASE_URL ?>/login/logout"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng xuất</a></li>
            </ul>

        </div><!--/.sidebar-->