                            <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" >
                            <span><i class="fa fa-print"> Cetak</i></span>
                            </button><br><br>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                             Data Rekapitulasi Kas (Cashflow)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                       <tr>
                                            <th >No</th>
                                            <th>ID Bendahara</th>
                                            <th>Kategori</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>

                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                         include 'koneksi.php';
                                         $no = 1;
                                         $data = mysqli_query($koneksi,"SELECT * FROM infaq_shodaqoh order by tanggal DESC ");
                                         while($d = mysqli_fetch_array($data)){
                                    ?>
                                        <tr class="odd gradeX">
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
                                        $grand_total=$total-$total_keluar;
                                       }
                                        ?>
                                    </tbody>
                                    <tr>
                                      <th colspan="5" style="text-align: center;font-size: 17px">Total Kas Masuk</th>
                                      <th colspan="2" style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total).",-"  ; ?></th>
                                    </tr>
                                    <tr>
                                      <th colspan="5" style="text-align: center;font-size: 17px">Total Kas Keluar</th>
                                      <th colspan="2" style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($total_keluar).",-"  ; ?></th>
                                    </tr>
                                    <tr>
                                      <th colspan="5" style="text-align: center;font-size: 17px">Saldo Akhir</th>
                                      <th colspan="2" style="text-align: right;font-size: 17px"><?php echo"Rp.".number_format($grand_total).",-"  ; ?></th>
                                    </tr>
                                </table>
                            </div>
                            <h5><strong>Informasi</strong></h5>
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                1.fitur ini digunakan untuk melihat data kas masuk dan keluar<br>
                                2.fitur ini dapat mencetak data Rekapitulasi kas
                            </div>
                    </div>
             </div>
                    <!--End Advanced Tables -->
                     <div class="panel-body">

                          </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Keuangan Infaq Shodaqoh</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="page/infaq_shodaqoh/laporan.php" method="POST"  >
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
