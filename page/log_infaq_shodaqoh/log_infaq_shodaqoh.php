<div class="row">
                <div class="col-md-15">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             Log Aktifitas Log Infaq Shodaqoh
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th>Id Admin</th>
                                            <th>Kategori</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                         include 'koneksi.php';
                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT * FROM log ORDER BY id DESC");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
                                     <td><?php echo $no++; ?></td>
                                     <td><i class="label label-danger"><?php echo $d['id_admin']; ?></i></td>
                                     <td><?php echo $d['kategori']; ?></td>
                                     <td><?php echo $d['keterangan']; ?></td>
                                     <td><?php echo $d['tanggal']; ?></td>
                                     <td><?php echo $d['jumlah_masuk']; ?></td>
                                     <td><?php echo $d['jumlah_keluar']; ?></td>
                                     <td><?php echo $d['status']; ?></td>


                                        </tr>
                                        <?php
                                       }
                                        ?>
                                    </tbody>
                                    <tr>
                      </div>
                </div>
            </div>
