
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
                                    <h4>Edit Data Pengeluaran Waqaf Pembangunan</h4>

                                    <form method="post" enctype="multipart/form-data">
                                       <div class="form-group">
                                            <label>ID_Admin</label>
                                            <input class="form-control"  name="id_admin" value="<?php echo $d['id_admin']; ?>" readonly></input>
                                        </div>
                                         <div class="form-group">
                                            <label>Keterangan</label>
                                             <input class="form-control"  name="keterangan" value="<?php echo $d['keterangan']; ?>"></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input  class="form-control" type="number" name="jumlah_keluar" value="<?php echo $d['jumlah_keluar']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanda Terima</label>
                                             <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                                            <input  class="form-control" type="file" name="foto">
                                        </div>

                                         <div class="footer">
                                             <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
$jumlah_keluar   = $_POST['jumlah_keluar'];
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

  // Set path folder tempat menyimpan fotonya
$path = "page/waqaf/images/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
    $data = mysqli_query($koneksi,"SELECT * FROM waqaf where id_waqaf ='$id_waqaf'"); // Eksekusi/Jalankan query dari variabel $query
    $d = mysqli_fetch_array($data); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("page/waqaf/images/".$d['foto'])) // Jika foto ada
      unlink("page/waqaf/images/".$d['foto']); // Hapus file foto sebelumnya yang ada di folder images

    // Proses ubah data ke Database
    $data = mysqli_query($koneksi,"UPDATE waqaf set id_admin='$id_admin', keterangan='$keterangan',tanggal='$tanggal',jumlah_keluar='$jumlah_keluar',foto='$fotobaru' where id_waqaf='$id_waqaf'"); // Eksekusi/ Jalankan query dari variabel $query
    if($data){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      ?>
      <script type="text/javascript">
        window.location.href="?page=waqaf_keluar";
    </script>
      <?php // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $data = mysqli_query($koneksi,"UPDATE waqaf set id_admin='$id_admin', keterangan='$keterangan',tanggal='$tanggal',jumlah_keluar='$jumlah_keluar' where id_waqaf='$id_waqaf'"); // Eksekusi/ Jalankan query dari variabel $query
  if($data){
  ?> // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    <script type="text/javascript">
        window.location.href="?page=waqaf_keluar";
    </script>
   <?php
  }else{

    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
}
?>
<?php
}
?>