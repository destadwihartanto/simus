<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id_muzakki = $_GET['id'];


// menghapus data dari database
$data=mysqli_query($koneksi,"delete from muzakki where id_muzakki='$id_muzakki'");

if ($data) {
	?>
	<script type="text/javascript">
		window.location.href="?page=form_muzakki";
	</script>
	<?php
}

?>