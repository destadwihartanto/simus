<?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
// Ambil Data yang Dikirim dari Form
$id_admin = $_POST['id_admin'];
$keterangan = $_POST['keterangan'];
$tanggal = $_POST['tanggal'];
$jumlah_keluar = $_POST['jumlah_keluar'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "page/waqaf/images/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $data=mysqli_query($koneksi,"INSERT INTO `waqaf` (`id_waqaf`, `id_admin`, `keterangan`, `tanggal`, `jumlah_masuk`, `jumlah_keluar`, `foto`) VALUES (NULL, '$id_admin', '$keterangan', '$tanggal', '0', '$jumlah_keluar', '$fotobaru')"); // Eksekusi/ Jalankan query dari variabel $query
  if($data){ // Cek jika proses simpan ke database sukses atau tidak
    ?>
    <script type="text/javascript">
    window.location.href="?page=waqaf_keluar";
  </script>
    <?php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
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
                             Data Pengeluaran Keuangan Waqaf Pembangunan
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
                                            <th>Tanda Terima</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                         include 'koneksi.php';

                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT * from waqaf where jumlah_keluar ");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                     <td><?php echo $d['id_admin']; ?></td>
                                     <td><?php echo $d['keterangan']; ?></td>
                                     <td><?php echo date('d F Y',strtotime($d['tanggal'])); ?></td>
                                     <td align="right"><?php echo"Rp.". number_format( $d['jumlah_keluar']).",-"; ?></td>
                                     <td><a href="page/waqaf/images/<?php echo $d['foto'] ;?>"><img src="page/waqaf/images/<?php echo $d['foto']; ?>" width="100" height="100"></a></td>
                                     <td align="center">
                                     <?php
              if ($_SESSION['role']=="1") {
              ?>

                                     <a href="?page=waqaf&aksi=update_waqaf_keluar&id=<?php echo $d['id_waqaf']; ?>"type="button"  class="btn btn-info"><i class="fa fa-edit"></i> EDIT</a>
                                       <a onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?page=waqaf&aksi=hapus_waqaf_keluar&id=<?php echo $d['id_waqaf']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>
                                       <?php
                  }
                  ?>
                                      </td>
                                        </tr>
                                        <?php
                                        error_reporting(0);
                                        $total=$total+$d['jumlah_keluar'];
                                       }
                                        ?>
                                    </tbody>
                                    <tr>
                                      <th colspan="5" style="text-align: center;font-size: 20px">Total Pemakaian </th>
                                      <th style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
                                    </tr>
                                </table>
                            </div>
                            <h5><strong>Informasi</strong></h5>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                1.fitur ini digunakan untuk melihat data waqaf keluar<br>
                                2.fitur ini dapat menambah, ubah dan hapus data  waqaf keluar
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
                                            <h4 class="modal-title" id="myModalLabel">Form Pemakaian Dana Waqaf </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post" enctype="multipart/form-data" >
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
                                            <input  class="form-control" type="number" name="jumlah_keluar">
                                        </div>
                                         <div class="form-group">
                                            <label>Tanda Terima</label>
                                            <input  class="form-control" type="file" name="foto">
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
