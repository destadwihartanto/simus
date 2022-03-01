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
<center><img width="15%" src="images/logo-mushola.png"></center>
<p align="center"><b>Laporan Data Keuangan Kas</b></p>
<input type="button"  value="cetak" class="noPrint" onclick="window.print()"><br><br>
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption><B></B></caption>
	<thead>
		<tr style="background-color: yellow;">
			<th >No</th>
            <th>ID Admin</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Tanggal</th>
            <th>Debit</th>
            <th>Kredit</th>
		</tr>
	</thead>
	<tbody>
		 <?php

		       $tanggal_awal = $_POST['tanggal_awal'];
		       $tanggal_akhir = $_POST['tanggal_akhir'];


                $no = 1;
                $data = $koneksi->query("SELECT * from infaq_shodaqoh WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'  ");
                while($d = $data-> fetch_assoc()){
                   ?>
               <tr  align="center">
                 <td><?php echo $no++; ?></td>
                 <td><?php echo $d['id_admin']; ?></td>
                 <td><?php echo $d['kategori']; ?></td>
                 <td><?php echo $d['keterangan']; ?></td>
                 <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                 <td align="right"><?php echo"Rp.". number_format( $d['jumlah_masuk']).",-"; ?></td>
                 <td align="right"><?php echo"Rp.". number_format( $d['jumlah_keluar']).",-"; ?></td>
               </tr>
        <?php
             error_reporting(0);
             $total=$total+$d['jumlah_masuk'];
             $total_keluar=$total_keluar+$d['jumlah_keluar'];
         }

         ?>
	</tbody>
	 <tr>
        <th colspan="5">Total Pemasukkan Dan Pengeluaran </th>
        <th  style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
        <th  style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total_keluar).",-"  ; ?></th>
     </tr>
      <?php
       include 'koneksi.php';
       $no = 1;
       $data = mysqli_query($koneksi,"SELECT * from infaq_shodaqoh ");
       while($d = mysqli_fetch_array($data)){

             error_reporting(0);
             $total1=$total1+$d['jumlah_masuk'];
             $total_keluar1=$total_keluar1+$d['jumlah_keluar'];
             $grand_total1=$total1-$total_keluar1;
         }

         ?>
     <tr>
     <th colspan="5" style="text-align: center;font-size: 17px">Saldo Akhir</th>
      <th colspan="2" style="text-align: center;font-size: 17px; background-color: yellow;"><?php echo"Rp.".number_format($grand_total1).",-"  ; ?></th>
    </tr>
</table>
<table align="left">
  <tr>
  <td height="150px">Dichek Oleh</td>
  <td width="50px"></td>
</tr>
<tr>
  <td>Ketua</td>
</tr>
</table>

<table align="right">
  <tr>
  <td height="150px">Serang, <?php echo date('d-M-Y'); ?></td>
  <td width="50px"></td>
</tr>
<tr>
  <td>Bendahara</td>
</tr>
</table>

