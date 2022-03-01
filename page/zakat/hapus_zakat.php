<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_zakat = $_GET['id'];


// menghapus data dari database
$data=mysqli_query($koneksi,"delete from zakat where id_zakat='$id_zakat'");

if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_zakat";
	</script>
	<?php
}

?>