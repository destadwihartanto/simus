<?php
$koneksi= new mysqli("localhost","root","","zis");


?>
<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mushola Al-Amin</title>

    <link rel="icon" href="assets/img/icon-web.png">
  <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="#">Mushola Al-Amin</a>
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
                    <img src="../assets/img/logo-mushola.png" class="user-image img-responsive"/>

          </li>


                    <li>
                        <a  href="../?page=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <li>
                        <a  href="../?page=profil"><i class="glyphicon glyphicon-link"></i> Profil</a>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Laporan Keuangan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../?halaman=kas"><i class="glyphicon glyphicon-floppy-save"></i>Kas</a>
                            </li>
                            <li>
                                <a href="../?page=waqaf"><i class="glyphicon glyphicon-floppy-save"></i>Waqaf Pembangunan</a>
                            </li>
                        </ul>
                     <li>
                        <a  href="../?page=kontak"><i class="glyphicon glyphicon-phone-alt"></i> Kontak Kami</a>
                    </li>
            </div>

            </nav>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             Data Keuangan Kas
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th>ID Bendahara</th>
                                            <th>Kategori</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                           $tanggal_awal = $_POST['tanggal_awal'];
                                           $tanggal_akhir = $_POST['tanggal_akhir'];
                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT * from infaq_shodaqoh WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'  ");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                      <td><?php echo $d['id_admin']; ?></td>
                                       <td><?php echo $d['kategori']; ?></td>
                                     <td><?php echo $d['keterangan']; ?></td>
                                     <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                                      <td align="right"><?php echo"Rp.". number_format( $d['jumlah_masuk']).",-"; ?></td>
                                     <td align="right"><?php echo"Rp.". number_format( $d['jumlah_keluar']).",-"; ?></td>

                                        </tr>
                                        <?php
                                          error_reporting(0);
                                        $total=$total+$d['jumlah_masuk'];
                                        $total_keluar=$total_keluar+$d['jumlah_keluar'];

                                       }
                                        ?>
                                    </tbody>
                                    <tr>
                                      <th colspan="5" style="text-align: center;font-size: 17px">Total Kas Masuk</th>
                                      <th colspan="2" style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
                                    </tr>
                                    <tr>
                                      <th colspan="5" style="text-align: center;font-size: 17px">Total Kas Keluar</th>
                                      <th colspan="2" style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total_keluar).",-"  ; ?></th>
                                    </tr>
                                      <?php
                                      $no = 1;
                                      $data = mysqli_query($koneksi,"SELECT * from infaq_shodaqoh ");
                                      while($d = mysqli_fetch_array($data)){

                                      error_reporting(0);
                                      $total1=$total1+$d['jumlah_masuk'];
                                      $total_keluar1=$total_keluar1+$d['jumlah_keluar'];
                                      $grand_total1=$total1-$total_keluar1;
                                       }

                                     ?>
                                    <tr>
                                      <th colspan="5" style="text-align: center;font-size: 17px">Saldo Akhir</th>
                                      <th colspan="2" style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($grand_total1).",-"  ; ?></th>
                                    </tr>

                                </table>
                            </div>
                            <div class="panel-body">
                           <a href="../?halaman=kas" class="btn btn-warning"> Kembali</a>
                          </div>

                    <!--End Advanced Tables -->
                </div>
            </div>

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>

</body>
</html>


