<?php
       include 'koneksi.php';
       $no = 1;
       $data = mysqli_query($koneksi,"SELECT * from infaq_shodaqoh ");
       while($d = mysqli_fetch_array($data)){
       	$total=$total+$d['jumlah_masuk'];
        $total_keluar=$total_keluar+$d['jumlah_keluar'];
        $grand_total=$total-$total_keluar;
    }
 ?>
 <?php
       include 'koneksi.php';
       $no = 1;
       $data = mysqli_query($koneksi,"SELECT * from waqaf ");
       while($d = mysqli_fetch_array($data)){
        $total=$total+$d['jumlah_masuk'];
        $total_keluar=$total_keluar+$d['jumlah_keluar'];
        $grand_total1=$total-$total_keluar;
    }
 ?>
 <?php
       include 'koneksi.php';
       $no = 1;
       $data = mysqli_query($koneksi,"SELECT * from zakat ");
       while($d = mysqli_fetch_array($data)){
        $total1=$total1+$d['jumlah'];
    }
 ?>

            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h4><b>Selamat Datang</b>, <i class="label label-warning"><?php echo $_SESSION['username'] ?></i></h4>
                        <!-- <h5>Sistem Manajemen Mushola Al-Amin </h5> -->
                    </div>
                </div>
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo"Rp.".number_format($grand_total).",-"  ; ?></p>
                    <p class="text-muted"><b>Total Kas</b></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="glyphicon glyphicon-credit-card"></i>
                </span>
                <div class="text-box" >
                   <p class="main-text"><?php echo"Rp.".number_format($grand_total1).",-"  ; ?></p>
                    <p class="text-muted"><b>Total Waqaf</b> </p>
                </div>
             </div>
		     </div>
                    <div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i  class="glyphicon glyphicon-transfer"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo"Rp.".number_format($total1).",-"  ; ?></p>
                    <p class="text-muted"><b>Total Zakat</b></p>
                </div>
             </div>
		     </div>
</div>


             <h5><strong>Informasi</strong></h5>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Halaman ini berfungsi sebagai dashboard
                            </div>
                    </div>
             </div>
