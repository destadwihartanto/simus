
<?php
include 'koneksi.php';
    $id_admin = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT * FROM admin where id_admin ='$id_admin'");
	while($d = mysqli_fetch_array($data)){


?>
<script type="text/javascript">
function validation(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var nama = document.getElementById("nama");
  if (nama.value.match(validasiHuruf)) {
      alert("Nama Anda adalah " + nama.value);
  } else {
      alert("Silahkan Chek Kembali Kolom Nama!\nFormat wajib huruf!");
      nama.value="";
      nama.focus();
      return false;
  }
}
</script>

<div class="panel panel-default">
     <div class="panel-heading">
           <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Update Pengguna</h3>

                                    <form method="post"  >
                                       <div class="form-group">
                                            <label>ID Admin</label>
                                            <input class="form-control"  name="id_admin" value="<?php echo $d['id_admin']; ?>" required></input>
                                       <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="form-control" name="jabatan" value="<?php echo $d['jabatan']; ?>" required>
                                                <option value="DKM" <?php if ($d["jabatan"]=='DKM') {
                                                    echo "selected";
                                                } ?>>
                                                DKM</option>
                                                <option value="Bendahara" <?php if ($d["jabatan"]=='Bendahara') {
                                                    echo "selected";
                                                } ?>>Bendahara</option>
                                                <option value="Amil" <?php if ($d["jabatan"]=='Amil') {
                                                    echo "selected";
                                                } ?>>Amil</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" id="nama"  name="nama" value="<?php echo $d['nama']; ?>" required ></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control"  name="username" value="<?php echo $d['username']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"  name="password" value="<?php echo $d['password']; ?>" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat" required><?php echo $d['alamat']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telp</label>
                                            <input  class="form-control" type="number" name="no_telp" value="<?php echo $d['no_telp']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <input  class="form-control" type="number" name="role" value="<?php echo $d['role']; ?>" required>
                                        </div>
                                         <div class="footer">
                                             <input type="submit" name="simpan" value="simpan" class="btn btn-primary"  onclick="validation()">
                                             <!-- <button onclick="validation()"> cek </button> -->
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
$jabatan        = $_POST['jabatan'];
$nama           = $_POST['nama'];
$username       = $_POST['username'];
$password       = md5($_POST['password']);
// $password       = $_POST['password'];
$alamat         = $_POST['alamat'];
$no_telp        = $_POST['no_telp'];
$role           = $_POST['role'];

 // menginput data ke database
   mysqli_query($koneksi,"UPDATE admin set id_admin='$id_admin', jabatan='$jabatan', nama='$nama',username='$username',password='$password',alamat='$alamat',no_telp='$no_telp',role='$role'    where id_admin='$id_admin'");
 if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_staff";
	</script>
	<?php
}
}



?>


