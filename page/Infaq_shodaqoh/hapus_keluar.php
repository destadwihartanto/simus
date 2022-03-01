<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_infaq = $_GET['id'];


// menghapus data dari database
$data=mysqli_query($koneksi,"delete from infaq_shodaqoh where id_infaq='$id_infaq'");

if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=kas_keluar";
	</script>
	<?php
}

?>