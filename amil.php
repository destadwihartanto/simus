<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
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
                <a class="navbar-brand" href="index.html">Babussalam</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo.jpg" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="amil.php?page=home"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>
                     <li>
                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i>Form Pendaftaran <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                     <li>
                        <a href="amil.php?page=form_muzakki"><i class="glyphicon glyphicon-user"></i>Form Muzakki</a>
                     </li>
                     <li>
                        <a href="amil.php?page=form_mustahiq"><i class="glyphicon glyphicon-user"></i>Form Mustahiq</a>
                    </li>
                            
                    </ul>
                    </li>     
                    <li>
                        <a href="amil.php?page=form_zakat"><i class="glyphicon glyphicon-floppy-save"></i>Form Zakat</a>
                    </li>
                     <li>
                        <a href="amil.php?page=form_pembagian_zakat"><i class="glyphicon glyphicon-floppy-open"></i>Form Pembagian Zakat</a>
                    </li>
                     <li>
                        <a href="amil.php?page=form_rekap"><i class="glyphicon glyphicon-list"></i>Form Rekap Data Zakat</a>
                     </li>
                    <li>
                        <a href="amil.php?page=kalkulator"><i class="glyphicon glyphicon-user"></i>Kalkulator Zakat</a>
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
                         if(isset($_GET['page'])){
                         $page = $_GET['page'];

                         switch ($page) {
                       case 'form_zakat':
                         include "zakat/form_zakat.php";
                         break;      
                       case 'form_pembagian_zakat':
                         include "zakat/form_pembagian_zakat.php";
                         break;
                       case 'form_rekap':
                         include "zakat/form_rekap.php";
                         break; 
                        case 'kalkulator':
                          include "zakat/kalkulator.php";
                          break;
                        case 'form_muzakki':
                         include "zakat/form_muzakki.php";
                          break;
                        case 'form_mustahiq':
                          include "zakat/form_mustahiq.php";
                          break;     
                       case 'logout':
                         include "logout.php";
                         break;       
                            default:
                                 echo "<center><h3>Maaf, Halaman Tidak Ditemukan !</h3></center>";
                                 break;
                              }
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
