<?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
   // menangkap data yang di kirim dari form
$id_mustahiq     = $_POST['id_mustahiq'];
$tanggal        = $_POST['tanggal'];
$jumlah_keluar         = $_POST['jumlah_keluar'];
$beras_keluar          = $_POST['beras_keluar'];

 // menginput data ke database
 $data=mysqli_query($koneksi,"INSERT INTO `pembagian_zakat` (`id_pembagian_zakat`, `id_mustahiq`, `tanggal`, `jumlah_keluar`, `beras_keluar`) VALUES (NULL, '$id_mustahiq', '$tanggal', '$jumlah_keluar', '$beras_keluar')");
 if ($data) {
  ?>
  <script type="text/javascript">
    window.location.href="?page=form_pembagian_zakat";
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
                             Data Pembagian Zakat
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th hidden="">Id Zakat</th>
                                             <th>Mustahiq (Penerima)</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Beras</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                         include 'koneksi.php';

                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT pembagian_zakat.id_pembagian_zakat, mustahiq.nama, mustahiq.kategori, pembagian_zakat.tanggal, pembagian_zakat.jumlah_keluar, pembagian_zakat.beras_keluar FROM mustahiq JOIN pembagian_zakat ON mustahiq.id_mustahiq = pembagian_zakat.id_mustahiq");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                      <td align="center" hidden=""><?php echo $d['id_pembagian_zakat']; ?></td>
                                     <td><?php echo $d['nama']; ?></td>
                                     <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                                     <td align="right"><?php echo"Rp.". number_format( $d['jumlah_keluar']).",-"; ?></td>
                                     <td><?php echo $d['beras_keluar']; ?>  Kg</td>
                                     <td align="center">
                                     <a href="?page=zakat&aksi=update_pembagian&id=<?php echo $d['id_pembagian_zakat']; ?>"type="button"  class="btn btn-info"><i class="fa fa-edit"></i> EDIT</a>
                                       <a onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?page=zakat&aksi=hapus_pembagian_zakat&id=<?php echo $d['id_pembagian_zakat']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>
                                    </td>
                                        </tr>
                                        <?php
                                        error_reporting(0);
                                        $total=$total+$d['jumlah_keluar'];
                                         $total_beras=$total_beras+$d['beras_keluar'];
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
                                3.fitur ini dapat mencetak data zakat
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
                                            <label> mustahiq</label>
                                            <select class="form-control"  name="id_mustahiq">
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT *FROM mustahiq ORDER BY nama");
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo '<option value="'.$row['id_mustahiq'].'">'.$row['nama'].'</option>';

                                                }

                                            ?>
                                        </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal" required>
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
