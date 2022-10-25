<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 font-weight-bold text-gray-800">Layanan</h1><a href="/createLayanan" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>

  <!-- DataTables-->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Layanan</h6>
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
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Layanan</th>
                    <th scope="col">Estimasi Waktu</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $no = 1;
                      foreach ($layanan as $lyn) :
                  ?>
                  <tr>
                    <th scope="row"><?=$no?></th>
                    <td><?=$lyn['jenis_layanan']?></td>
                    <td><?=$lyn['estimasi_waktu']?> hari</td>
                    <td><?=$lyn['tarif']?></td>
                    <td>
                      <div class="d-flex">
                        <a href="/editLayanan/<?= $lyn['layanan_id'] ?>"><button class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></button></a>                    
                        <form action="/deleteLayanan/<?= $lyn['layanan_id'] ?>" method="post">
                          <input type="hidden" name="_methode" value="DELETE">
                          <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
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