<!DOCTYPE html>
<?php include('../konekdb.php');
session_start();
$username=$_SESSION['username'];
$idpegawai=$_SESSION['idpegawai'];
$cekuser=mysql_query("SELECT count(username) as jmluser FROM authorization WHERE username = '$username' AND modul = 'Warehouse'");
$user=mysql_fetch_array($cekuser);
$getpegawai=mysql_query("SELECT * FROM pegawai where id_pegawai='$idpegawai'");
$pegawai=mysql_fetch_array($getpegawai);
if($user['jmluser']=="0")
{
header("location:../index.php");
};?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Warehouse Cabang Blitar</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="../css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                E-Pharm
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $username;?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                 <li class="user-header bg-light-blue">
                                    <img src="img/<?php echo $pegawai['foto'];?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php 
										echo $pegawai['Nama']." - ".$pegawai['Jabatan']." ".$pegawai['Departemen'];?>
                                        <small>Member since <?php echo "$pegawai[Tanggal_Masuk]"; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Warehouse</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Cabang</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Blitar</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
								 <div class="pull-left">
                                        <a href="profil.php" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/<?php echo $pegawai['foto'];?>" class="img-circle" alt="User Image" />
                             
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $username;?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Statistical</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="order.php">
                                <i class="fa fa-th"></i> <span>Order</span>
                            </a>
                        </li>
						<li >
                            <a href="cuti.php">
                                <i class="fa fa-suitcase"></i> <span>Cuti</span>
                            </a>
                        </li>
                         <li>
                            <a href="mailbox.php">
                                <i class="fa fa-comments"></i> <span>Mailbox</span>
								
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Warehouse
                        <small>Blitar</small>
                    </h1>
                    <ol class="breadcrumb">
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <h1>Order Barang</h1>
                    <form method="post">
                    <div class="row">
                        <div class="col-md-2">
                        <strong>Nama Barang</strong>
						<input type="text" class="form-control" placeholder="Input Nama Barang..." name="nama">
                        </div>
                        <div class="col-md-2">
                        <strong>Jenis Barang</strong>
                        <input type="text" class="form-control" placeholder="Input Jenis Barang..." name="jenis">
                        </div>
                        <div class="col-md-2">
                        <strong>Jumlah</strong>
                        <input type="text" class="form-control" placeholder="Input Jumlah Barang..." name="jumlah">
                        </div>
                        <div class="col-md-2">
                        <strong>Satuan</strong>
                        <input type="text" class="form-control" placeholder="Input Satuan Barang..." name="satuan">
                        </div>
                        <div class="col-md-2">
                        <strong>Supplier</strong>
                        <select name="supplier" class="form-control">
                            <option value="">---Pilih Supplier---</option>
                            <option value="Tempo Group">Tempo Group</option>
                            <option value="Combiphar">Combiphar</option>
                        </select>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-1">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                    </form>
                    <?php
                    include "konekdb.php";
                    error_reporting(0);
                    $nama=$_POST['nama'];
                    $jenis=$_POST['jenis'];
                    $jumlah=$_POST['jumlah'];
                    $satuan=$_POST['satuan'];
                    $supplier=$_POST['supplier'];
                    if($nama&&$jumlah&&$satuan&&$supplier){
                    mysql_query("INSERT INTO dariwarehouse (nama,jumlah,satuan,supplier,pemesan,jenis) VALUES ('$nama','$jumlah','$satuan','$supplier','Blitar','$jenis')");
                    }
                    else{};
                    ?><br>
                    <h1>Daftar Pesanan</h1>                
                    <table class="table table-striped table-bordered">
                        <tr><td>ID</td><td>Nama</td><td>Jenis</td><td>Jumlah</td><td>Satuan</td><td>Supplier</td><td>Status</td><td>Hapus</td></tr>
                    <?php
                        $sql = "SELECT * FROM dariwarehouse";
                        $hasil = mysql_query ($sql, $mysql_connect);
                
                        while ($baris=mysql_fetch_array($hasil)){
                         $no=$baris[0];
                        $nama=$baris[1];
                        $jumlah=$baris[2];
                        $satuan=$baris[3];
                        $supplier=$baris[4];
                        $status=$baris[5];
                        $cabang=$baris[6];
						$jenis=$baris[7];
        
                        echo "<tr><td>$no</td><td>$nama</td><td>$jenis</td><td>$jumlah</td><td>$satuan</td><td>$supplier</td>";
                        
                        if($status==0){
                        echo "<td><button class=\"btn btn-warning\">Pending</button></td><td><a href=\"hapus.php?no=$no\"><button class=\"btn btn-danger\">Hapus</button></a></td></tr>";}
                        if($status==1){
                        echo "<td><button class=\"btn btn-success\">Accepted</button></td><td><a href=\"hapus.php?no=$no\"><button class=\"btn btn-danger\">Hapus</button></a></td></tr>";}
                        }
                    ?>
                    </table>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="../js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>        

    </body>
</html>