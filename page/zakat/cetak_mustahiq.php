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
<center><img width="15%" src="logo-mushola.png"></center>
<p align="center"><b>Daftar Mustahiq</b></p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption><B></B></caption>
	<thead>
		<tr>
			<th >No</th>
            <th>ID Mustahiq</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kategori</th>
		</tr>
	</thead>
	<tbody>
		 <?php
              $no = 1;
              $data = mysqli_query($koneksi,"SELECT * from mustahiq ");
              while($d = mysqli_fetch_array($data)){
        ?>
              <tr class="odd gradeX">
              <td><?php echo $no++; ?></td>
              <td><?php echo $d['id_mustahiq']; ?></td>
              <td><?php echo $d['nama']; ?></td>
              <td><?php echo $d['alamat']; ?></td>
              <td><?php echo $d['kategori']; ?></td>
             </tr>
         <?php
         }

         ?>
	</tbody>
</table>
<br><input type="button" value="cetak" class="noPrint" onclick="window.print()">