 <?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
// Ambil Data yang Dikirim dari Form
$id_admin = $_POST['id_admin'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];
$jumlah_masuk = $_POST['jumlah_masuk'];

  $data=mysqli_query($koneksi,"INSERT INTO `waqaf` (`id_waqaf`, `id_admin`, `keterangan`, `tanggal`, `jumlah_masuk`, `jumlah_keluar`, `foto`) VALUES (NULL, '$id_admin', '$keterangan', '$tanggal', '$jumlah_masuk', '0', '')");
  if($data){
    ?>
    <script type="text/javascript">
    window.location.href="?page=waqaf_masuk";
  </script>
    <?php
  }
}

?>
  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              Tambah Data
                            </button><br><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Pemasukkan Keuangan Waqaf Pembangunan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th>ID Bendahara</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                         include 'koneksi.php';

                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT * from waqaf where jumlah_masuk ");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                     <td><?php echo $d['id_admin']; ?></td>
                                     <td><?php echo $d['keterangan']; ?></td>
                                     <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                                     <td align="right"><?php echo"Rp.". number_format( $d['jumlah_masuk']).",-"; ?></td>
                                     <td align="center">
                                     <?php
              if ($_SESSION['role']=="1") {
              ?>
                                       <a href="?page=waqaf&aksi=update_waqaf_masuk&id=<?php echo $d['id_waqaf']; ?>"type="button"  class="btn btn-info"><i class="fa fa-edit"></i> EDIT</a>
                                        <a onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?page=waqaf&aksi=hapus_waqaf_masuk&id=<?php echo $d['id_waqaf']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>

                                        <?php
                  }
                  ?>
                                      </td>
                                        </tr>
                                        <?php
                                        error_reporting(0);
                                        $total=$total+$d['jumlah_masuk'];
                                       }
                                        ?>
                                    </tbody>
                                    <tr>
                                      <th colspan="4" style="text-align: center;font-size: 20px">Total Penerimaan Waqaf</th>
                                      <th style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
                                    </tr>
                                </table>
                            </div>
                            <h5><strong>Informasi</strong></h5>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                1.fitur ini digunakan untuk melihat data waqaf masuk<br>
                                2.fitur ini dapat menambah, ubah dan hapus data  waqaf masuk
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
                                            <h4 class="modal-title" id="myModalLabel">Form Pemasukkan Waqaf Pembangunan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post">
                                         <div class="form-group">
                                            <label>ID_Admin</label>
                                            <!-- <input class="form-control"  name="id_admin"></input> -->
                                            <input class="form-control"  name="id_admin" value="<?php echo $_SESSION['id_admin'] ?>" readonly></input>

                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" name="keterangan"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input  class="form-control" type="number" name="jumlah_masuk">
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

                        </div>
                    </div>
