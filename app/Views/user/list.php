<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 font-weight-bold text-gray-800">Pengguna</h1>
  <a href="/createUser" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
              
  <!-- DataTables-->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th scope="col">User ID</th>
                  <th scope="col">Nama Pengguna</th>
                  <th scope="col">E-mail Pengguna</th>
                  <th scope="col">Username</th>
                  <th scope="col">Password</th>
                  <th scope="col">Level</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($user as $u) :
                ?>
                <tr>
                  <th><?=$u['id_pengguna']?></th>
                  <td><?=$u['nama_pengguna']?></td>
                  <td><?=$u['email_pengguna']?></td>
                  <td><?=$u['username_pengguna']?></td>
                  <td><?=$u['password_pengguna']?></td>
                  <td><?=$u['level_pengguna']?></td>
                  <td>
                    <div class="d-flex">
                      <a href="/editUser/<?= $u['id_pengguna'] ?>"><button class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></button></a>&nbsp;                    
                      <form action="/deleteUser/<?= $u['id_pengguna'] ?>" method="post">
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