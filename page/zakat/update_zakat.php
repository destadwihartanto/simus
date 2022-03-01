
<?php 
include 'koneksi.php';
    $id_zakat = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT zakat.id_zakat, muzakki.id_muzakki, muzakki.nama, zakat.jenis_zakat, zakat.tanggal, zakat.jumlah, zakat.beras FROM muzakki JOIN zakat ON muzakki.id_muzakki = zakat.id_muzakki where id_zakat ='$id_zakat'");
	while($d = mysqli_fetch_array($data)){


?>
<div class="panel panel-default">
     <div class="panel-heading">
           <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Update Zakat</h3>

                                    <form method="post"  >
                                       <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control"  name="nama" value="<?php echo $d['nama']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Zakat</label>
                                            <select class="form-control" name="jenis_zakat">
                                                <option value="Zakat Fitrah" <?php if ($d["jenis_zakat"]=='Zakat Fitrah') {
                                                    echo "selected";
                                                } ?>>Zakat Fitrah</option>
                                                <option value="Zakat Mal (Profesi)" <?php if ($d["jenis_zakat"]=='Zakat Mal (Profesi)') {
                                                    echo "selected";
                                                } ?>>Zakat Mal (Profesi)</option>
                                                <option value="Zakat Mal (Kekayaan)" <?php if ($d["jenis_zakat"]=='Zakat Mal (Kekayaan)') {
                                                    echo "selected";
                                                } ?>>Zakat Mal (Kekayaan)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" type="number" name="jumlah" value="<?php echo $d['jumlah']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Beras</label>
                                            <input  class="form-control" type="text" name="beras" value="<?php echo $d['beras']; ?>" required>
                                        </div>


                                         <div class="footer">
                                             <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                                            <a href="?page=form_zakat"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
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
$jenis_zakat  = $_POST['jenis_zakat']; 
$tanggal      = $_POST['tanggal']; 
$jumlah       = $_POST['jumlah'];
$beras      = $_POST['beras'];
                              
 // menginput data ke database
   $data=mysqli_query($koneksi,"UPDATE zakat set jenis_zakat='$jenis_zakat', tanggal='$tanggal',jumlah='$jumlah',beras='$beras' where id_zakat='$id_zakat'");
  $data= mysqli_query($koneksi,"UPDATE muzakki set nama='$nama', alamat='$alamat',pekerjaan='$pekerjaan',no_telp='$no_telp' where id_muzakki='$id_muzakki'");
 if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_zakat";
	</script>
	<?php
}	
}



?>
 

