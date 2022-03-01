
<?php 
include 'koneksi.php';
    $id_muzakki = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT * FROM muzakki where id_muzakki ='$id_muzakki'");
	while($d = mysqli_fetch_array($data)){


?>
<div class="panel panel-default">
     <div class="panel-heading">
           <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Update Muzakki</h3>

                                    <form method="post"  >
                                       <div class="form-group">
                                            <label>ID Muzakki</label>
                                            <input class="form-control"  name="id_muzakki" value="<?php echo $d['id_muzakki']; ?>" readonly></input>
                                        </div>
                                           <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control"  name="nama" value="<?php echo $d['nama']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input  class="form-control" type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input class="form-control"  name="pekerjaan" value="<?php echo $d['pekerjaan']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telp</label>
                                            <input  class="form-control" type="number" name="no_telp" value="<?php echo $d['no_telp']; ?>" required>
                                        </div>


                                         <div class="footer">
                                             <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                                            <a href="?page=form_muzakki"><button type="button" class="btn btn-default">Cancel</button></a>
                                        </div>
                                    </form>

                                    <?php
                                }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

 <?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
   // menangkap data yang di kirim dari form
$id_muzakki   = $_POST['id_muzakki']; 
$nama         = $_POST['nama']; 
$alamat       = $_POST['alamat']; 
$pekerjaan    = $_POST['pekerjaan'];
$no_telp      = $_POST['no_telp'];
                              
 // menginput data ke database
   $data=mysqli_query($koneksi,"UPDATE muzakki set id_muzakki='$id_muzakki', nama='$nama', alamat='$alamat',pekerjaan='$pekerjaan',no_telp='$no_telp' where id_muzakki='$id_muzakki'");
 if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_muzakki";
	</script>
	<?php
}	
}



?>
 

