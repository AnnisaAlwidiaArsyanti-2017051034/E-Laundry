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
                    <td>Rp <?= number_format($lyn['tarif'],0,",",".");?></td>
                    <td>
                      <div class="d-flex">
                        <a href="/editLayanan/<?= $lyn['layanan_id'] ?>"><button class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></button></a>&nbsp;                    
                        <form action="/deleteLayanan/<?= $lyn['layanan_id'] ?>" method="post">
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
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>