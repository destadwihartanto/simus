
<?php
include 'koneksi.php';
    $id_infaq = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT * FROM infaq_shodaqoh where id_infaq ='$id_infaq'");
	while($d = mysqli_fetch_array($data)){


?>
<div class="panel panel-default">
     <div class="panel-heading">
           <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Edit Penerimaan Kas</h3>

                                    <form method="post"  >
                                       <div class="form-group">
                                            <label>ID_Admin</label>
                                            <input class="form-control"  name="id_admin" value="<?php echo $d['id_admin']; ?>" readonly></input>
                                        </div>
                                         <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" value="<?php echo $d['kategori']; ?>" >
                                                <option value="Kotak Amal Sholat Jumat" <?php if ($d["kategori"]=='Kotak Amal Sholat Jumat') {
                                                    echo "selected";
                                                } ?>>Kotak Amal Sholat Jumat</option>
                                                <option value="Kotak Amal Sholat Tarawih" <?php if ($d["kategori"]=='Kotak Amal Sholat Tarawih') {
                                                    echo "selected";
                                                } ?>>Kotak Amal Sholat Tarawih</option>
                                                <option value="Kotak Amal Sholat Idul Fitri" <?php if ($d["kategori"]=='Kotak Amal Sholat Idul Fitri') {
                                                    echo "selected";
                                                } ?>>Kotak Amal Sholat Idul Fitri</option>
                                                <option value="Kotak Amal Sholat Idul adha" <?php if ($d["kategori"]=='Kotak Amal Sholat Idul adha') {
                                                    echo "selected";
                                                } ?>>Kotak Amal Sholat Idul adha</option>
                                                <option value="Infaq Shodaqoh" <?php if ($d["kategori"]=='Infaq Shodaqoh') {
                                                    echo "selected";
                                                } ?>>Infaq Shodaqoh</option>
                                            </select>
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
$kategori       = $_POST['kategori'];
$keterangan     = $_POST['keterangan'];
$tanggal        = $_POST['tanggal'];
$jumlah_masuk   = $_POST['jumlah_masuk'];

 // menginput data ke database
   mysqli_query($koneksi,"UPDATE infaq_shodaqoh set id_admin='$id_admin', kategori='$kategori', keterangan='$keterangan',tanggal='$tanggal',jumlah_masuk='$jumlah_masuk' where id_infaq='$id_infaq'");
 if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=kas_masuk";
	</script>
	<?php
}
}



?>


