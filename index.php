<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mushola Al-Amin</title>

    <link rel="icon" href="assets/img/icon-web.png">
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo date('d-M-Y'); ?></div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo-mushola.png" class="user-image img-responsive"/>
					</li>


                    <li>
                        <a  href="?halaman=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                        <a  href="?halaman=profil"><i class="glyphicon glyphicon-link"></i> Profil</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Laporan Keuangan <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?halaman=kas"><i class="glyphicon glyphicon-floppy-save"></i>Kas </a>
                            </li>
                            <li>
                                <a href="?halaman=waqaf"><i class="glyphicon glyphicon-floppy-save"></i>Waqaf Pembangunan</a>
                            </li>
                        </ul>
                     <li>
                        <a  href="?halaman=kontak"><i class="glyphicon glyphicon-phone-alt"></i> Kontak Kami</a>
                    </li>
                    <li>
                        <a  href="login.php"><i class="glyphicon glyphicon-log-in"></i> Login</a>
                    </li>
                    <br>
                    <li>
                       <!-- <center><iframe src="https://bimasislam.kemenag.go.id/widget/jadwalshalat/0ea19c8cbc10d109694932475957fce4de7b8af5" width="240" style="background : transparent" height="310px"  frameborder="0" scrolling="no"> </iframe></center> -->
                    </li>
            </div>

            </nav>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                    <?php
                    error_reporting(0);

                         $page = $_GET['halaman'];

                         if ($page == "home") {
                           include "halaman/home.php";
                         }elseif ($page == "profil") {
                            include  "halaman/profil.php";
                         }elseif ($page == "kas") {
                            include  "halaman/kas.php";
                         }elseif ($page == "laporan") {
                            include  "halaman/laporan.php";
                         }elseif ($page == "waqaf") {
                             include "halaman/waqaf.php";
                         }elseif ($page == "kontak") {
                            include  "halaman/kontak.php";

                        } else {
                           include "halaman/home.php";
                       }

                    ?>

                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
