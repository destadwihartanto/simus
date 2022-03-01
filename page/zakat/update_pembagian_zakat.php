
<?php 
include 'koneksi.php';
$id_pembagian_zakat = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT pembagian_zakat.id_pembagian_zakat, mustahiq.id_mustahiq, mustahiq.nama, mustahiq.kategori, pembagian_zakat.tanggal, pembagian_zakat.jumlah_keluar, pembagian_zakat.beras_keluar FROM mustahiq JOIN pembagian_zakat ON mustahiq.id_mustahiq = pembagian_zakat.id_mustahiq where id_pembagian_zakat ='$id_pembagian_zakat'");
	while($d = mysqli_fetch_array($data)){


?>
<div class="panel panel-default">
     <div class="panel-heading">
           <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Update Pembagian Zakat</h3>

                                    <form method="post"  >
                                       <div class="form-group" hidden="">
                                            <label>ID Pembagian</label>
                                            <input class="form-control"  name="id_pembagian_zakat" value="<?php echo $d['id_pembagian_zakat']; ?>" readonly></input>
                                          </div>
                                            <div class="form-group" hidden="">
                                            <label>Id Musyahiq</label>
                                            <input class="form-control"  name="id_mustahiq" value="<?php echo $d['id_mustahiq']; ?>" readonly></input>
                                          </div>
                                            <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control"  name="nama" value="<?php echo $d['nama']; ?>" ></input>
                                            <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" required="">
                                                <option value="Fakir" <?php if ($d["kategori"]=='Fakir') {
                                                    echo "selected";
                                                } ?>>Fakir</option>
                                                <option value="Miskin" <?php if ($d["kategori"]=='Miskin') {
                                                    echo "selected";
                                                } ?>>Miskin</option>
                                                <option value="Amil Zakat" <?php if ($d["kategori"]=='Amil Zakat') {
                                                    echo "selected";
                                                } ?>>Amil Zakat</option>
                                                <option value="Muallaf" <?php if ($d["kategori"]=='Muallaf') {
                                                    echo "selected";
                                                } ?>>Muallaf</option>
                                                <option value="Gharimin" <?php if ($d["kategori"]=='Gharimin') {
                                                    echo "selected";
                                                } ?>>Gharimin</option>
                                                <option value="Fi sabilillah" <?php if ($d["kategori"]=='Fi sabilillah') {
                                                    echo "selected";
                                                } ?>>Fi sabilillah</option>
                                                <option value="Ibnu Sabil" <?php if ($d["kategori"]=='Ibnu Sabil') {
                                                    echo "selected";
                                                } ?>>Ibnu Sabil</option>
                                            </select>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" type="number" name="jumlah_keluar" value="<?php echo $d['jumlah_keluar']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Beras</label>
                                            <input  class="form-control" type="text" name="beras_keluar" value="<?php echo $d['beras_keluar']; ?>" required>
                                        </div>


                                         <div class="footer">
                                             <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                                            <a href="?page=form_pembagian_zakat"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
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
$id_mustahiq         = $_POST['id_mustahiq'];  
$tanggal             = $_POST['tanggal']; 
$jumlah_keluar       = $_POST['jumlah_keluar'];
$beras_keluar        = $_POST['beras_keluar'];
$nama                = $_POST['nama'];
$kategori            = $_POST['kategori'];
$id_pembagian_zakat            = $_POST['id_pembagian_zakat'];
                              
 // menginput data ke database
  $data= mysqli_query($koneksi,"UPDATE pembagian_zakat set tanggal='$tanggal',jumlah_keluar='$jumlah_keluar',beras_keluar='$beras_keluar' where id_pembagian_zakat='$id_pembagian_zakat'");
    $data=mysqli_query($koneksi,"UPDATE mustahiq set nama='$nama', alamat='$alamat',kategori='$kategori' where id_mustahiq='$id_mustahiq'");
 if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_pembagian_zakat";
	</script>
	<?php
}	
}



?>
 

