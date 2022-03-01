 <?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
// Ambil Data yang Dikirim dari Form
$id_admin = $_POST['id_admin'];
$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];
$jumlah_masuk = $_POST['jumlah_masuk'];

  $data=mysqli_query($koneksi,"INSERT INTO `infaq_shodaqoh` (`id_infaq`, `id_admin`, `kategori`, `keterangan`, `tanggal`, `jumlah_masuk`, `jumlah_keluar`, `foto`) VALUES (NULL, '$id_admin', '$kategori', '$keterangan', '$tanggal', '$jumlah_masuk', '0', '')");
  if($data){
    ?>
    <script type="text/javascript">
    window.location.href="?page=kas_masuk";
  </script>
    <?php
  }
}

?>
 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              Tambah Data
                            </button><br><br>
 <div class="row">
                <div class="col-md-15">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             Data Penerimaan Kas
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th>ID Bendahara</th>
                                            <th>Kategori</th>
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
                                         $data = mysqli_query($koneksi,"SELECT * from infaq_shodaqoh where jumlah_masuk ");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                     <td><?php echo $d['id_admin']; ?></td>
                                     <td><?php echo $d['kategori']; ?></td>
                                     <td><?php echo $d['keterangan']; ?></td>
                                     <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                                     <td align="right"><?php echo"Rp.". number_format( $d['jumlah_masuk']).",-"; ?></td>
                                     <td align="center">
                                     <?php
                                        if ($_SESSION['role']=="1") {?>
                                       <a href="?page=infaq_shodaqoh&aksi=update_infaq_masuk&id=<?php echo $d['id_infaq']; ?>"type="button"  class="btn btn-info"><i class="fa fa-edit"></i> EDIT</a>
                                       <a onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?page=infaq_shodaqoh&aksi=hapus_masuk&id=<?php echo $d['id_infaq']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>
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
                                      <th colspan="5" style="text-align: center;font-size: 20px">Total Kas Masuk</th>
                                      <th style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
                                    </tr>
                                </table>
                            </div>
                            <h5><strong>Informasi</strong></h5>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                1.fitur ini digunakan untuk melihat data kas masuk<br>
                                2.fitur ini dapat menambah, ubah dan hapus data kas masuk
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
                                            <h4 class="modal-title" id="myModalLabel">Form Penerimaan Kas Masuk</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post">
                                         <div class="form-group">
                                            <label>ID_Admin</label>
                                            <input class="form-control"  name="id_admin" value="<?php echo $_SESSION['id_admin'] ?>" readonly></input>

                                            <!-- <input class="form-control"  name="id_admin" required></input> -->
                                        </div>
                                         <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" required>
                                                <option>Kotak Amal Sholat Jumat</option>
                                                <option>Kotak Amal Sholat Tarawih</option>
                                                <option>Kotak Amal Sholat Idul Fitri</option>
                                                <option>Kotak Amal Sholat Idul adha</option>
                                                <option>Infaq Shodaqoh</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" rows="3" name="keterangan" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input  class="form-control" type="date" name="tanggal" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input  class="form-control" type="number" name="jumlah_masuk" required>
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

