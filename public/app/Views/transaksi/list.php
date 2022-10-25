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
            <div class="col-sm-12 col-md-6">
              <div class="dataTables_length" id="dataTable_length">
                <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> entries</label>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div id="dataTable_filter" class="dataTables_filter">
                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
              </div>
            </div>
          </div>
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
                  $no = 1;
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
                  <td><?=$trans['status_pembayaran']?></td>
                  <td><?=$trans['status_pengambilan']?></td>
                  <td>
                    <div class="d-flex">
                      <a href="/editTransaksi/<?= $trans['no_invoice'] ?>"><button class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></button></a>                    
                      <form action="/deleteTransaksi/<?= $trans['no_invoice'] ?>" method="post">
                        <input type="hidden" name="_methode" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                <?php $no++; endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
              <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                  <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                </li>
                <li class="paginate_button page-item active">
                  <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                </li>
                <li class="paginate_button page-item ">
                  <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                </li>
                <li class="paginate_button page-item ">
                  <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                </li>
                <li class="paginate_button page-item ">
                  <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                </li>
                <li class="paginate_button page-item ">
                  <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                </li>
                <li class="paginate_button page-item ">
                  <a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                </li>
                <li class="paginate_button page-item next" id="dataTable_next">
                  <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>