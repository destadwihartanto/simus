<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_pembagian_zakat = $_GET['id'];


// menghapus data dari database
$data=mysqli_query($koneksi,"delete from pembagian_zakat where id_pembagian_zakat='$id_pembagian_zakat'");

if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_pembagian_zakat";
	</script>
	<?php
}

?>