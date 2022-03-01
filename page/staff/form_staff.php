  <?php
 include ("koneksi.php");
 if (isset($_POST['simpan'])) {
   // menangkap data yang di kirim dari form
$id_admin       = $_POST['id_admin'];
$jabatan        = $_POST['jabatan'];
$nama           = $_POST['nama'];
$username       = $_POST['username'];
$password       = md5($_POST['password']);
$alamat         = $_POST['alamat'];
$no_telp        = $_POST['no_telp'];
$role           = $_POST['role'];






 // menginput data ke database
   mysqli_query($koneksi,"INSERT INTO `admin` (`id_admin`, `jabatan`, `nama`, `username`, `password`, `alamat`, `no_telp`, `role` ) VALUES ('$id_admin', '$jabatan', '$nama', '$username', '$password', '$alamat', '$no_telp', '$role')");

 }
?>
<script type="text/javascript">
function validation(){
  var validasiHuruf = /^[a-zA-Z ]+$/;
  var nama = document.getElementById("nama");
  if (nama.value.match(validasiHuruf)) {
      alert("Nama Anda adalah " + nama.value);
  } else {
      alert("Silahkan Chek Kembali Kolom Nama!\nFormat wajib huruf!");
      nama.value="";
      nama.focus();
      return false;
  }
}
</script>

 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                              Tambah Data
                            </button>
                             <a href="page/staff/cetak.php" class="btn btn-warning" target="blank" type="button" >Cetak Staff</a>
<br><br>
 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data User

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th>ID Admin</th>
                                            <th>Jabatan</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Level</th>
                                            <th width="200px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                         include 'koneksi.php';

                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT * from admin ");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                     <td><?php echo $d['id_admin']; ?></td>
                                     <td><?php echo $d['jabatan']; ?></td>
                                     <td><?php echo $d['nama']; ?></td>
                                     <td><span class="label label-success"><?php echo $d['username']; ?></span></td>
                                     <td><?php echo $d['alamat']; ?></td>
                                     <td><?php echo $d['no_telp']; ?></td>
                                     <td><?php echo $d['role']; ?></td>
                                     <td align="center">
                                     <a href="?page=staff&aksi=update_staff&id=<?php echo $d['id_admin']; ?>"type="button"  class="btn btn-info"><i class="fa fa-edit"></i> EDIT</a>
                                       <a onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="?page=staff&aksi=hapus_staff&id=<?php echo $d['id_admin']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i>HAPUS</a>

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
                                1.fitur ini digunakan untuk melihat data  pengguna<br>
                                2.fitur ini dapat menambah, ubah dan hapus data  pengguna<br>
                                3.fitur ini dapat digunakan untuk mencetak data pengguna
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
                                            <h4 class="modal-title" id="myModalLabel">Form User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                         <div class="form-group">
                                          <?php


include "koneksi.php";
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(id_admin) as maxKode FROM admin";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeBarang, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "BDR";
$char1 = "AML";
$kodeBarang = $char . sprintf("%03s", $noUrut);
$kodeBarang = $char1 . sprintf("%03s", $noUrut);
?>
                                            <label>ID_Admin</label>
                                            <input class="form-control"  name="id_admin" value="<?php echo $kodeBarang ?>"></input>
                                        </div>
                                       <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="form-control" name="jabatan">
                                                <option>DKM</option>
                                                <option>Bendahara</option>
                                                <option>Amil</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" id="nama" name="nama" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control"  name="username" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control"  name="password" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>No Telp</label>
                                            <input  class="form-control" type="text" name="no_telp" onkeypress="return angka(event)">
                                        </div>
                                        <script type="text/javascript" >function angka (evt) {
                                         var charCode=(evt.which) ? evt.which : event.keyCode
                                          if (charCode > 31 && ( charCode < 48 || charCode > 57))
                                            return false;
                                          return true;
                                          }

                                        </script>
                                        <!-- <div class="form-group">
                                            <label>Level</label>
                                            <input  class="form-control" type="text" name="role" onkeypress="return angka(event)">
                                        </div> -->
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="role">
                                            <option>--Pilih--</option>
                                                <option value="1">DKM</option>
                                                <option value="2">Bendahara</option>
                                                <option value="3">Amil</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary" onclick="validation()">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


