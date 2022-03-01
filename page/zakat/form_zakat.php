 <?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
   // menangkap data yang di kirim dari form
$id_muzakki     = $_POST['id_muzakki'];
$jenis_zakat    = $_POST['jenis_zakat'];
$tanggal        = $_POST['tanggal'];
$jumlah         = $_POST['jumlah'];
$beras          = $_POST['beras'];
$dibuat =   date('d/m/Y');

 // menginput data ke database
 $data=mysqli_query($koneksi,"INSERT INTO `zakat` (`id_zakat`, `id_muzakki`, `jenis_zakat`, `tanggal`, `jumlah`, `beras`, `dibuat`) VALUES (NULL, '$id_muzakki', '$jenis_zakat', '$tanggal', '$jumlah', '$beras', '$dibuat')");
 if ($data) {
  ?>
  <script type="text/javascript">
    window.location.href="?page=form_zakat";
  </script>
  <?php
}
 }



?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              Tambah Data
                            </button>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modal" >
                              Cetak
                            </button><br><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             Data Pembayar Zakat
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th hidden="">Id Zakat</th>
                                             <th>Muzakki</th>
                                            <th>Jenis Zakat</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Beras</th>
                                            <th><center>Aksi</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                         include 'koneksi.php';

                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT zakat.id_zakat, muzakki.nama, zakat.jenis_zakat, zakat.tanggal, zakat.jumlah, zakat.beras, zakat.dibuat FROM muzakki JOIN zakat ON muzakki.id_muzakki = zakat.id_muzakki");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                     <td hidden=""><?php echo $d['id_zakat']; ?></td>
                                     <td><?php echo $d['nama']; ?></td>
                                     <td><?php echo $d['jenis_zakat']; ?></td>
                                     <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                                     <td align="right"><?php echo"Rp.". number_format( $d['jumlah']).",-"; ?></td>
                                     <td><?php echo $d['beras']; ?>  Kg</td>
                                     <td align="center">
                                       <a href="?page=zakat&aksi=update_zakat&id=<?php echo $d['id_zakat']; ?>"type="button"  class="btn btn-info"><i class="fa fa-edit"></i> EDIT</a>
                                       <a onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?page=zakat&aksi=hapus_zakat&id=<?php echo $d['id_zakat']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>
                                      </td>
                                        </tr>
                                        <?php
                                        error_reporting(0);
                                        $total=$total+$d['jumlah'];
                                         $total_beras=$total_beras+$d['beras'];
                                       }
                                        ?>
                                    </tbody>
                                    <tr>
                                      <th colspan="4" style="text-align: center;font-size: 20px">Total Zakat</th>
                                      <th style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
                                    </tr>
                                    <tr>
                                      <th colspan="4" style="text-align: center;font-size: 20px">Total Beras</th>
                                      <th style="text-align: right;font-size: 17px"><?php echo $total_beras   ; ?>  KG</th>
                                    </tr>
                                </table>
                            </div>
                            <h5><strong>Informasi</strong></h5>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                1.fitur ini digunakan untuk melihat semua data zakat <br>
                                2.fitur ini dapat mneambah, ubah , dan hapus data<br>
                                2.fitur ini dapat mencetak data zakat
                            </div>
                    </div>
             </div>
                            <div class="panel-body">

                          </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form zakat</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">

                                            <div class="form-group">
                                            <label> Muzakki</label>
                                            <select class="form-control"  name="id_muzakki">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT *FROM muzakki ORDER BY nama");
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                //  echo "<option value='$row[pelanggan_id]'>$row[nama]</option>";
                                                echo '<option value="'.$row['id_muzakki'].'">'.$row['nama'].'</option>';

                                                }

                                            ?>
                                        </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Zakat</label>
                                            <select class="form-control" name="jenis_zakat">
                                                <option>Zakat Fitrah</option>
                                                <option>Zakat Mal (Profesi)</option>
                                                <option>Zakat Mal (Kekayaan)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input  class="form-control" type="number" name="jumlah">
                                        </div>
                                        <div class="form-group">
                                            <label>Beras</label>
                                            <input  class="form-control" type="text" name="beras">
                                        </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-body">
                          </div>
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Pemasukan Zakat</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="page/zakat/cetak_zakat.php" method="POST"  >
                                         <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input class="form-control" type="date"  name="tanggal_awal" >
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input  class="form-control" type="date" name="tanggal_akhir" >
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="cetak" value="Cetak" class="btn btn-primary">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
