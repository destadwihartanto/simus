<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_admin = $_GET['id'];


// menghapus data dari database
$data=mysqli_query($koneksi,"DELETE from admin where id_admin='$id_admin'");

if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_staff";
	</script>
	<?php
}

?>