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
<p align="center"><b>Data Muzakki </b></p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption><B></B></caption>
	<thead>
		<tr>
			<th >No</th>
            <th>ID Muzakki</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
            <th>No Telp</th>
		</tr>
	</thead>
	<tbody>
		 <?php

                $no = 1;
                $data = $koneksi->query("SELECT * from muzakki ");
                while($d = $data-> fetch_assoc()){
                   ?>
               <tr  align="center">
                 <td><?php echo $no++; ?></td>
                 <td><?php echo $d['id_muzakki']; ?></td>
                 <td><?php echo $d['nama']; ?></td>
                 <td><?php echo $d['alamat']; ?></td>
                 <td><?php echo $d['pekerjaan']; ?></td>
                 <td><?php echo $d['no_telp']; ?></td>
               </tr>
               <?php
         }

         ?>
	</tbody>
</table>
<br><input type="button" value="cetak" class="noPrint" onclick="window.print()">