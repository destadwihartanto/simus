<?PHP error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
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
<center><img src="logo-mushola.png"></center>
<p align="center"><b>Laporan Penerimaan Zakat </b></p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption><B></B></caption>
	<thead>
		<tr>
			<th >No</th>
            <th>Muzakki</th>
            <th>Jenis Zakat</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Beras</th>

		</tr>
	</thead>
	<tbody>
		 <?php

		       $tanggal_awal = $_POST['tanggal_awal'];
		       $tanggal_akhir = $_POST['tanggal_akhir'];


                $no = 1;
                $data = $koneksi->query("SELECT muzakki.nama, zakat.jenis_zakat, zakat.tanggal, zakat.jumlah, zakat.beras FROM muzakki JOIN zakat ON muzakki.id_muzakki = zakat.id_muzakki where tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'  ");
                while($d = $data-> fetch_assoc()){
                   ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['jenis_zakat']; ?></td>
                <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                <td align="right"><?php echo"Rp.". number_format( $d['jumlah']).",-"; ?></td>
                <td align="center"><?php echo $d['beras']; ?>  Kg</td>
              </tr>
        <?php
         error_reporting(0);
        $total=$total+$d['jumlah'];
        $total_beras=$total_beras+$d['beras'];

         }

         ?>
	</tbody>
    <tr>
        <th colspan="4">Total Penerimaan Zakat</th>
        <th colspan="2"  style="text-align: center;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
     </tr>
     <tr>
       <th colspan="4" >Total Penerimaan Beras</th>
       <th colspan="2" style="text-align: center;font-size: 17px"><?php echo $total_beras   ; ?>  KG</th>
     </tr>
</table>
<table align="right">
  <tr>

  <td height="150px">Serang,               </td>
  <td width="50px"></td>
</tr>

<tr>
  <td>Amil </td>
</tr>
</table>

<br><input type="button" value="cetak" class="noPrint" onclick="window.print()">

