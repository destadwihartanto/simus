<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
   <style>

body {
    background-image: url(assets/img/gambar-login.jpg) ;
     background-size: 100% 130% ;
    font-family: Arial, Helvetica, sans-serif;}
.background {
    background:url(assets/img/gambar-login.jpg) no-repeat fixed;.

}
button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 200px;
    margin: 5px ;
    border: none;
    cursor: pointer;
    width: 300px;
}
</style>

</head>
<body>
    <div class="container">
      <br><br><br><br><br><br>

         <div class="row ">

                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                      <center><img  width="80%" src="assets/img/logo-mushola.png"> </center>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Username " name="username" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Password" name="password" />
                                        </div>
                                        <center>
                                     <button class="btn btn-primary " name="login" >Login</button>
                                     <button class="btn btn-danger" type="reset" name="cancel">Reset</button>
                                     <a  href="index.php"></i> Halaman Depan</a>

                                     </center>
                                    <hr />
                                     <?php
include ("koneksi.php");
if (isset($_POST['login']))
  {
    $data=$koneksi->query("SELECT * FROM admin where username='$_POST[username]' AND password=md5('$_POST[password]')");
    if ($d=$data->fetch_assoc()) {
      /* remove all session */
      session_unset();
      /* Create new session */
      session_start();
      $_SESSION['id_admin'] = $d['id_admin'];
      $_SESSION['username'] = $d['username'];
      $_SESSION['role']    = $d['role'];
      /* redirect dashboard */
      header("Location:admin.php?page=home");

    }else{
      ?><b><?php echo "USERNAME ATAU PASSWORD SALAH ! "; ?></b><?php
    }
  }
?>
                                    </form>
                            </div>

                        </div>
                    </div>


        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
