<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_mustahiq = $_GET['id'];


// menghapus data dari database
$data=mysqli_query($koneksi,"delete from mustahiq where id_mustahiq='$id_mustahiq'");

if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_mustahiq";
	</script>
	<?php
}

?>