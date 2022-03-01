
<?php 
include 'koneksi.php';
    $id_mustahiq = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT * FROM mustahiq where id_mustahiq ='$id_mustahiq'");
	while($d = mysqli_fetch_array($data)){


?>
<div class="panel panel-default">
     <div class="panel-heading">
           <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Update Mustahiq</h3>

                                    <form method="post"  >
                                       <div class="form-group">
                                            <label>ID Mustahiq</label>
                                            <input class="form-control"  name="id_mustahiq" value="<?php echo $d['id_mustahiq']; ?>" readonly></input>
                                        </div>
                                           <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control"  name="nama" value="<?php echo $d['nama']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input  class="form-control" type="text" name="alamat" value="<?php echo $d['alamat']; ?>" required>
                                        </div>
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
$id_mustahiq   = $_POST['id_mustahiq']; 
$nama          = $_POST['nama']; 
$alamat        = $_POST['alamat']; 
$kategori      = $_POST['kategori'];

                              
 // menginput data ke database
   mysqli_query($koneksi,"UPDATE mustahiq set id_mustahiq='$id_mustahiq', nama='$nama', alamat='$alamat',kategori='$kategori' where id_mustahiq='$id_mustahiq'");
 if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_mustahiq";
	</script>
	<?php
}	
}



?>
 

