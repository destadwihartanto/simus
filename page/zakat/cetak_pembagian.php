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
<p align="center"><b>Laporan Pembagian Zakat</b></p>
<table border="1" width="100%" style="border-collapse: collapse;">
    <caption><B></B></caption>
    <thead>
        <tr>
            <th >No</th>
             <th>Mustahiq</th>
             <th>Kategori</th>
             <th>Tanggal</th>
             <th >Jumlah</th>
             <th >Beras</th>


        </tr>
    </thead>
    <tbody>
         <?php

               $tanggal_awal = $_POST['tanggal_awal'];
               $tanggal_akhir = $_POST['tanggal_akhir'];


                $no = 1;
                $data = mysqli_query($koneksi,"SELECT zakat.id_zakat, mustahiq.nama, zakat.jenis_zakat, zakat.tanggal, zakat.jumlah, zakat.beras, zakat.jumlah_rupiah_keluar, zakat.jumlah_beras_keluar FROM mustahiq JOIN zakat ON mustahiq.id_mustahiq = zakat.id_mustahiq");
                while($d = $data-> fetch_assoc()){
                   ?>
                <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                      <td align="center" hidden=""><?php echo $d['id_zakat']; ?></td>
                                     <td><?php echo $d['nama']; ?></td>
                                     <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                                     <td align="right"><?php echo"Rp.". number_format( $d['jumlah_rupiah_keluar']).",-"; ?></td>
                                     <td><?php echo $d['jumlah_beras_keluar']; ?>  Kg</td>

                                        </tr>
                                        <?php
         error_reporting(0);
         $total=$total+$d['jumlah_rupiah_keluar'];
                                        $total_beras=$total_beras+$d['jumlah_beras_keluar'];
                                       }
                                        ?>
                                    </tbody>
                                    <tr>
                                      <th colspan="4" style="text-align: center;font-size: 20px">Total Pembagian Zakat</th>
                                      <th style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
                                    </tr>
                                    <tr>
                                      <th colspan="4" style="text-align: center;font-size: 20px">Total Pembagian Zakat (Beras)</th>
                                      <th style="text-align: right;font-size: 17px"><?php echo $total_beras  ; ?> Kg</th>
                                    </tr>
                                </table>
                            </div>
<table align="right">
  <tr>

  <td height="150px">Pamulang,               </td>
  <td width="50px"></td>
</tr>

<tr>
  <td>Amil Masjid</td>
</tr>
</table>
<br><input type="button" value="cetak" class="noPrint" onclick="window.print()">

