 <div class="panel-body">
                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" >
                              Cetak Infaq
                            </button>
                          </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Laporan Zakat</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="page/zakat/laporan_zakat.php" method="POST"  >
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