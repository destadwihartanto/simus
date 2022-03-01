<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_waqaf = $_GET['id'];


// menghapus data dari database
$data=mysqli_query($koneksi,"DELETE from waqaf where id_waqaf='$id_waqaf'");

if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=waqaf_masuk";
	</script>
	<?php
}

?>