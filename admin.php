<?php
 include ("koneksi.php");
session_start();
ob_start();
if(empty($_SESSION)){

 header("Location: login.php");
}

?>
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
font-size: 16px;"><?php echo date('d-M-Y'); ?> &nbsp; <a href="?page=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo-mushola.png" class="user-image img-responsive"/>
                    <span class="label label-success"><?php echo $_SESSION['id_admin'] ?></span>
					</li>



                    <li>
                        <a  href="?page=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                   <?php
              if ($_SESSION['role']=="1") {
              ?>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Infaq dan Shodaqoh <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=kas_masuk"><i class="glyphicon glyphicon-floppy-save"></i>Kas Masuk</a>
                            </li>
                            <li>
                                <a href="?page=kas_keluar"><i class="glyphicon glyphicon-floppy-open"></i>Kas Keluar</a>
                            </li>
                            <li>
                                <a href="?page=kas_rekap"><i class="glyphicon glyphicon-list"></i>Kas Rekap</a>
                            </li>
                        </ul>
                      </li>
                       <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Waqaf Pembangunan <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=waqaf_masuk"><i class="glyphicon glyphicon-floppy-save"></i>Waqaf Masuk</a>
                            </li>
                            <li>
                                <a href="?page=waqaf_keluar"><i class="glyphicon glyphicon-floppy-open"></i>Waqaf Keluar</a>
                            </li>
                            <li>
                                <a href="?page=rekap_waqaf"><i class="glyphicon glyphicon-list"></i>Waqaf Rekap</a>
                            </li>

                        </ul>
                      </li>

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Zakat <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-user"></i>Form Pendaftaran<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                <li>
                                    <a href="?page=form_muzakki"><i class="glyphicon glyphicon-user"></i>Form Muzakki</a>
                                </li>
                                <li>
                                    <a href="?page=form_mustahiq"><i class="glyphicon glyphicon-user"></i>Form Mustahiq</a>
                                </li>

                            </ul>

                            </li>
                            <li>
                                <a href="?page=form_zakat"><i class="glyphicon glyphicon-floppy-save"></i>Form Zakat</a>
                            </li>
                            <li>
                                <a href="?page=form_pembagian_zakat"><i class="glyphicon glyphicon-floppy-open"></i>Form Pembagian Zakat</a>
                            </li>
                        </ul>
                      </li>

                    <li>
                        <a  href="?page=form_staff"><i class="glyphicon glyphicon-user"></i> Form Staff</a>
                    </li>
                    <!-- awal log  -->
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Log System<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=log_infaq_shodaqoh"><i class="glyphicon glyphicon-floppy-list"></i>Infaq Shodaqoh</a>
                            </li>
                            <!-- <li>
                                <a href="?page=kas_keluar"><i class="glyphicon glyphicon-floppy-open"></i>Kas Keluar</a>
                            </li>
                            <li>
                                <a href="?page=kas_rekap"><i class="glyphicon glyphicon-list"></i>Kas Rekap</a>

                            </li> -->
                        </ul>
                      </li>
                    <!-- <li>
                                <a href="?page=log_infaq_shodaqoh"><i class="glyphicon glyphicon-list"></i>Log Infaq Shodaqoh</a>
                            </li> -->
                    <li>
                    <a onclick="return confirm('Apakah anda ingin keluar ?')"  href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a>

                    </li>
                    <!-- batas log -->
                    <?php
                  }
                  ?>
                  <?php
              if ($_SESSION['role']=="2") {
              ?>
               <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Infaq dan Shodaqoh <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=kas_masuk"><i class="glyphicon glyphicon-floppy-save"></i>Kas Masuk</a>
                            </li>
                            <li>
                                <a href="?page=kas_keluar"><i class="glyphicon glyphicon-floppy-open"></i>Kas Keluar</a>
                            </li>
                            <li>
                                <a href="?page=kas_rekap"><i class="glyphicon glyphicon-list"></i>Kas Rekap</a>

                            </li>
                        </ul>
                      </li>
                       <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Waqaf Pembangunan <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=waqaf_masuk"><i class="glyphicon glyphicon-floppy-save"></i> Waqaf Masuk</a>
                            </li>
                            <li>
                                <a href="?page=waqaf_keluar"><i class="glyphicon glyphicon-floppy-open"></i> Waqaf Keluar</a>
                            </li>
                            <li>
                                <a href="?page=rekap_waqaf"><i class="glyphicon glyphicon-list"></i> Rekap Waqaf</a>

                            </li>

                        </ul>
                      </li>
                      <li>
                      <a onclick="return confirm('Apakah anda ingin keluar ?')"  href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
                    </li>
                      <?php
                    }
                    ?>
                     <?php
              if ($_SESSION['role']=="3") {

              ?>
              <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Zakat <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-user"></i>Form Pendaftaran<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                <li>
                                    <a href="?page=form_muzakki"><i class="glyphicon glyphicon-user"></i>Form Muzakki</a>
                                </li>
                                <li>
                                    <a href="?page=form_mustahiq"><i class="glyphicon glyphicon-user"></i>Form Mustahiq</a>
                                </li>

                            </ul>

                            </li>
                            <li>
                                <a href="?page=form_zakat"><i class="glyphicon glyphicon-floppy-save"></i>Form Zakat</a>
                            </li>
                            <li>
                                <a href="?page=form_pembagian_zakat"><i class="glyphicon glyphicon-floppy-open"></i>Form Pembagian Zakat</a>
                            </li>

                        </ul>
                      </li>
                      <li>
                      <a onclick="return confirm('Apakah anda ingin keluar ?')"  href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a>
                    </li>
                       <?php
                     }
                      ?>
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

                         $page = $_GET['page'];
                         $aksi = $_GET['aksi'];

                         if ($page == "form_staff") {
                           include "page/staff/form_staff.php";
                          }if ($page == "log_infaq_shodaqoh") {
                          include "page/log_infaq_shodaqoh/log_infaq_shodaqoh.php";
                         }elseif ($aksi == "update_staff") {
                            include  "page/staff/update_staff.php";
                         }elseif ($aksi == "hapus_staff") {
                            include  "page/staff/hapus_staff.php";
                            //awal ifelse sadaqah
                         }elseif ($page == "kas_masuk") {
                             include "page/infaq_shodaqoh/kas_masuk.php";
                         }elseif ($aksi == "update_infaq_masuk") {
                            include  "page/infaq_shodaqoh/update_infaq_masuk.php";
                        //  }elseif ($aksi == "multi_infaq_masuk") {
                        //     include  "page/infaq_shodaqoh/multi_infaq_masuk.php";
                        //  }elseif ($aksi == "multi_infaq_keluar") {
                        //     include  "page/infaq_shodaqoh/multi_infaq_keluar.php";
                         }elseif ($aksi == "hapus_masuk") {
                            include  "page/infaq_shodaqoh/hapus_masuk.php";
                         }elseif ($page == "kas_keluar") {
                            include "page/infaq_shodaqoh/kas_keluar.php";
                         }elseif ($aksi == "update_infaq_keluar") {
                            include  "page/infaq_shodaqoh/update_infaq_keluar.php";
                        }elseif ($aksi == "hapus_keluar") {
                            include  "page/infaq_shodaqoh/hapus_keluar.php";
                        }elseif ($page == "kas_rekap") {
                            include  "page/infaq_shodaqoh/kas_rekap.php";
                             //akhir ifelse sadaqah
                         }elseif ($page == "waqaf_masuk") {
                           include  "page/waqaf/waqaf_masuk.php";
                         }elseif ($aksi == "update_waqaf_masuk") {
                          include  "page/waqaf/update_waqaf_masuk.php";
                        }elseif ($aksi == "hapus_waqaf_masuk") {
                          include  "page/waqaf/hapus_masuk.php";
                        }elseif ($page == "waqaf_keluar") {
                           include  "page/waqaf/waqaf_keluar.php";
                        }elseif ($aksi == "update_waqaf_keluar") {
                          include  "page/waqaf/update_waqaf_keluar.php";
                         }elseif ($aksi == "hapus_waqaf_keluar") {
                          include  "page/waqaf/hapus_keluar.php";
                        }elseif ($page == "rekap_waqaf") {
                          include  "page/waqaf/rekap_waqaf.php";
                          //formzakat
                        }elseif ($page == "form_zakat") {
                          include  "page/zakat/form_zakat.php";
                        }elseif ($aksi == "update_zakat") {
                          include  "page/zakat/update_zakat.php";
                        }elseif ($aksi == "hapus_zakat") {
                          include  "page/zakat/hapus_zakat.php";
                          //form bagi zakat
                        }elseif ($page == "form_pembagian_zakat") {
                          include  "page/zakat/form_pembagian_zakat.php";
                        }elseif ($aksi == "update_pembagian") {
                          include  "page/zakat/update_pembagian_zakat.php";
                        }elseif ($aksi == "hapus_pembagian_zakat") {
                          include  "page/zakat/hapus_pembagian_zakat.php";
                        }elseif ($page == "form_muzakki") {
                          include  "page/zakat/form_muzakki.php";
                        }elseif ($aksi == "update_muzakki") {
                          include  "page/zakat/update_muzakki.php";
                        }elseif ($aksi == "hapus_muzakki") {
                          include  "page/zakat/hapus_muzakki.php";
                        }elseif ($page == "form_mustahiq") {
                          include  "page/zakat/form_mustahiq.php";
                        }elseif ($aksi == "update_mustahiq") {
                          include  "page/zakat/update_mustahiq.php";
                        }elseif ($aksi == "hapus_mustahiq") {
                          include  "page/zakat/hapus_mustahiq.php";
                        }elseif ($page == "logout") {
                          include  "logout.php";
                        }elseif ($page == "home") {
                          include "home.php";
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


     <div class="panel-body">

                          </div>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Zakat</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="page/zakat/laporan_zakat.php" method="POST"  >
                                         <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input class="form-control" type="date"  name="tanggal_awal" >
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input  class="form-control" type="date" name="tanggal_akhir" >
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="cetak" value="Cetak" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



</body>
</html>
