<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gaming gear</title>

        <link href="<?php echo BASE_URL ?>/public/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>/public/template/css/datepicker3.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>/public/template/css/styles.css" rel="stylesheet">
        <link src="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
        <link src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
       
        <script src="<?php echo BASE_URL ?>/public/template/js/lumino.glyphs.js"></script>

      
        <script type="text/javascript" src="<?php echo BASE_URL ?>/public/template/ckeditor/ckeditor.js"></script>
    </head>
<body>
<div id="preloader"></div>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo BASE_URL ?>/login/dashboard"><span>BaBaNaMnGuA</span>Admin</a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
                            <span style="color: white;">Xin chào, <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                
                                <li><a href=""><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Thông tin thành viên</a></li>
                                <li><a href="<?php echo BASE_URL ?>/login/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>