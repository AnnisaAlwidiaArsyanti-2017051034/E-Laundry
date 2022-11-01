<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 font-weight-bold text-gray-800">Transaksi</h1>
  <a href="/createTransaksi" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
              
  <!-- DataTables-->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th scope="col">No Invoice</th>
                  <th scope="col">Nama Pelanggan</th>
                  <th scope="col">No. Telp. Pelanggan</th>
                  <th scope="col">Alamat Pelanggan</th>
                  <th scope="col">Tanggal Masuk</th>
                  <th scope="col">Berat</th>
                  <th scope="col">Layanan</th>
                  <th scope="col">Tanggal Keluar</th>
                  <th scope="col">Biaya</th>
                  <th scope="col">Status Pembayaran</th>
                  <th scope="col">Status Pengembalian</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($transaksi as $trans) :
                ?>
                <tr>
                  <th><?=$trans['no_invoice']?></th>
                  <td><?=$trans['nama_pelanggan']?></td>
                  <td><?=$trans['nomor_tlp_pelanggan']?></td>
                  <td><?=$trans['alamat_pelanggan']?></td>
                  <td><?=$trans['tanggal_masuk']?></td>
                  <td><?=$trans['berat']?> KG</td>
                  <td><?=$trans['layanan']?></td>
                  <td><?=$trans['tanggal_keluar']?></td>
                  <td><?=$trans['biaya']?></td>
                  <td><?php
                        if($trans['status_pembayaran'] == "Belum Dibayar"){ ?>
                        <span class="badge badge-warning"><?=$trans['status_pembayaran']; ?></span>
                        <?php } else { ?>
                        <span class="badge badge-success"><?=$trans['status_pembayaran']; ?></span>
                        <?php } ?>
                  </td>
                  <td><?php
                        if($trans['status_pengambilan'] == "Belum Diambil"){ ?>
                        <span class="badge badge-warning"><?=$trans['status_pengambilan']; ?></span>
                        <?php } else { ?>
                        <span class="badge badge-success"><?=$trans['status_pengambilan']; ?></span>
                        <?php } ?>
                  </td>
                  <td>
                    <div class="d-flex">
                      <a href="/editTransaksi/<?= $trans['no_invoice'] ?>"><button class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></button></a>&nbsp;                    
                      <form action="/deleteTransaksi/<?= $trans['no_invoice'] ?>" method="post">
                        <input type="hidden" name="_methode" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>