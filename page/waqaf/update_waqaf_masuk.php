
<?php
include 'koneksi.php';
    $id_waqaf = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT * FROM waqaf where id_waqaf ='$id_waqaf'");
	while($d = mysqli_fetch_array($data)){


?>
<div class="panel panel-default">
     <div class="panel-heading">
           <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Edit Data Pemasukan Waqaf Pembangunan</h4>

                                    <form method="post"  >
                                       <div class="form-group">
                                            <label>ID Admin</label>
                                            <input class="form-control"  name="id_admin" value="<?php echo $d['id_admin']; ?>" readonly></input>
                                        </div>
                                         <div class="form-group">
                                            <label>Kategori</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" name="keterangan" required> <?php echo $d['keterangan']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input  class="form-control" type="number" name="jumlah_masuk" value="<?php echo $d['jumlah_masuk']; ?>">
                                        </div>

                                         <div class="footer">
                                             <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                                            <a href="?page=kas_masuk"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
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
$id_admin       = $_POST['id_admin'];
$keterangan     = $_POST['keterangan'];
$tanggal        = $_POST['tanggal'];
$jumlah_masuk   = $_POST['jumlah_masuk'];

 // menginput data ke database
   mysqli_query($koneksi,"UPDATE waqaf set id_admin='$id_admin', keterangan='$keterangan',tanggal='$tanggal',jumlah_masuk='$jumlah_masuk' where id_waqaf='$id_waqaf'");
 if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=waqaf_masuk";
	</script>
	<?php
}
}



?>


