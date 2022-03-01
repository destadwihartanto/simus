<?php
$koneksi= new mysqli("localhost","root","","zis");


?>
<style type="text/css">
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>
<table border="1" width="100%" style="border-collapse: collapse;">
	<center><img width="15%" src="logo-mushola.png"></center>
<p align="center"><b>Daftar Pengguna System Mushola Al-Amin </b></p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<thead>
		<tr>
			<th>No</th>
            <th>ID Admin</th>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Level</th>
		</tr>
	</thead>
	<tbody>
		 <?php
               $no = 1;
               $data = mysqli_query($koneksi,"SELECT * from admin ");
               while($d = mysqli_fetch_array($data)){
                   ?>
               <tr class="odd gradeX" align="center">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['id_admin']; ?></td>
                  <td><?php echo $d['jabatan']; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['username']; ?></td>
                  <td><?php echo $d['password']; ?></td>
                  <td><?php echo $d['alamat']; ?></td>
                  <td><?php echo $d['no_telp']; ?></td>
                  <td><?php echo $d['role']; ?></td>

              </tr>
          <?php
               }
          ?>
	</tbody>
</table>
<br><input type="button" value="cetak" class="noPrint" onclick="window.print()">