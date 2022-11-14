<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 font-weight-bold text-gray-800">Transaksi</h1>
  <a href="/createTransaksi" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
              
  <!-- DataTables-->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th scope="col">#</th>
                  <th scope="col">No Invoice</th>
                  <th scope="col">Tanggal Masuk</th>
                  <th scope="col">Nama Pelanggan</th>
                  <th scope="col">Berat</th>
                  <th scope="col">Layanan</th>
                  <th scope="col">Biaya</th>
                  <th scope="col">Status Pembayaran</th>
                  <th scope="col">Status Pengembalian</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  foreach ($transaksi as $trans) :
                ?>
                <tr>
                  <th scope="row"><?=$no?></th>
                  <td><?php echo $trans->no_invoice ?></td>
                  <td><?php echo date('d/m/Y', strtotime($trans->tanggal_masuk));?></td>
                  <td><?php echo $trans->nama_pelanggan ?></td>
                  <td><?php echo $trans->berat ?> KG</td>
                  <td><?php echo $trans->jenis_layanan ?></td>
                  <td>Rp <?php echo number_format($trans->biaya,0,',','.'); ?></td>
                  <td><?php
                        if($trans->status_pembayaran == "Belum Dibayar"){ ?>
                        <span class="badge badge-warning"><?=$trans->status_pembayaran; ?></span>
                        <?php } else { ?>
                        <span class="badge badge-success"><?=$trans->status_pembayaran; ?></span>
                        <?php } ?>
                  </td>
                  <td><?php
                        if($trans->status_pengambilan == "Belum Diambil"){ ?>
                        <span class="badge badge-warning"><?=$trans->status_pengambilan; ?></span>
                        <?php } else { ?>
                        <span class="badge badge-success"><?=$trans->status_pengambilan; ?></span>
                        <?php } ?>
                  </td>
                  <td>
                    <div class="d-flex">
                      <a href="/detailTransaksi/<?= $trans->id_transaksi ?>"><button class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye"></i></button></a>&nbsp;                    
                      <a class="btn btn-danger btn-circle btn-sm" href="#" data-toggle="modal" data-target="#hapusModal-<?= $trans->id_transaksi ?>"><i class="fas fa-trash"></i></a>
                      <!-- Logout Modal-->
                      <div class="modal fade" id="hapusModal-<?= $trans->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                      </button>
                                  </div>
                                  <form action="/deleteTransaksi/<?= $trans->id_transaksi ?>" method="post">
                                  <div class="modal-body">Apakah anda yakin ingin menghapus transaksi dengan no invoice <?= $trans->no_invoice ?>?</div>
                                  <div class="modal-footer">
                                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                      <input type="hidden" name="_methode" value="DELETE">
                                      <button type="submit" class="btn btn-danger">Hapus</a>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $no++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>