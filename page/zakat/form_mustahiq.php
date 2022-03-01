 <?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
   // menangkap data yang di kirim dari form
$id_mustahiq    = $_POST['id_mustahiq'];
$id_admin       = $_POST['id_admin'];
$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];
$kategori       = $_POST['kategori'];


 // menginput data ke database
   mysqli_query($koneksi,"INSERT INTO `mustahiq` (`id_mustahiq`, `id_admin`, `nama`, `alamat`, `kategori`) VALUES ('$id_mustahiq', '$id_admin', '$nama', '$alamat', '$kategori')");

 }






?>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              Tambah Data
                            </button>
                             <a class="btn btn-warning" href="page/zakat/cetak_mustahiq.php" target="blank" type="button" class="btn btn-primary">Cetak Mustahiq</a>
<br><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             Data Mustahiq Mushola Al-Amin
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th>ID Mustahiq</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kategori</th>
                                            <th><center>Aksi</center> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                         include 'koneksi.php';

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
                                     <td align="center">
                                       <a href="?page=zakat&aksi=update_mustahiq&id=<?php echo $d['id_mustahiq']; ?>"type="button"  class="btn btn-info"><i class="fa fa-edit"></i> EDIT</a>
                                       <a onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?page=zakat&aksi=hapus_mustahiq&id=<?php echo $d['id_mustahiq']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>

                                      </td>
                                        </tr>
                                        <?php
                                       }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                            <h5><strong>Informasi</strong></h5>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                1.fitur ini digunakan untuk melihat semua data mustahiq <br>
                                2.fitur ini dapat mneambah, ubah , dan hapus data<br>
                                2.fitur ini dapat mencetak data mustahiq
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
                                            <h4 class="modal-title" id="myModalLabel">Form Mustahiq</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post">
                                         <div class="form-group">
                                          <?php


include "koneksi.php";
// mencari id mustahiq dengan nilai paling besar
date_default_timezone_set('Asia/Jakarta');
$date= date('YmdHis');



$query = "SELECT max(id_mustahiq) as maxKode FROM mustahiq";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$id = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($id, 14, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut = 0;
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "MTQ";


$id = $char .$date. sprintf("%03s", $noUrut);

?>
                                            <label>ID Mustahiq</label>
                                            <input class="form-control"  name="id_mustahiq" value="<?php echo $id ?>" readonly></input>
                                        </div>
                                        <div class="form-group">
                                            <label>ID Admin</label>
                                            <input class="form-control"  name="id_admin" value="<?php echo $_SESSION['id_admin'] ?>" readonly></input>

                                        </div>
                                        <div class="form-group">
                                            <label>Nama Mustahiq</label>
                                            <textarea class="form-control" name="nama"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input  class="form-control" name="alamat">
                                        </div>
                                         <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori">
                                                <option>Fakir</option>
                                                <option>Miskin</option>
                                                <option>Amil Zakat</option>
                                                <option>Muallaf</option>
                                                <option>Gharimin</option>
                                                <option>Fi sabilillah</option>
                                                <option>Ibnu Sabil</option>
                                            </select>
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
