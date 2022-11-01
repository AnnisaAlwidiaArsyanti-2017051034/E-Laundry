<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pengguna</h6>
        </div>
        <!-- form start -->
        <form action="/updateUser/<?= $user['id_pengguna'] ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input type="text" name="nama_pengguna" class="form-control" id="nama_pengguna" value="<?= $user['nama_pengguna']?>">
                </div>
                <div class="form-group">
                    <label for="email_pengguna">E-mail Pengguna</label>
                    <input type="email" name="email_pengguna" class="form-control" id="email_pengguna" value="<?= $user['email_pengguna']?>">
                </div>
                <div class="form-group">
                    <label for="username_pengguna">Username Pengguna</label>
                    <input type="text" name="username_pengguna" class="form-control" id="username_pengguna" value="<?= $user['username_pengguna']?>">
                </div>
                <div class="form-group">
                    <label for="password_pengguna">Password Pengguna</label>
                    <input type="password" name="password_pengguna" class="form-control" id="password_pengguna" value="<?= $user['password_pengguna']?>">
                </div>
                <div class="form-group">
                    <label for="level_pengguna">Level Pengguna</label>
                    <select name = "level_pengguna" id="level_pengguna" class="form-control" required>
                        <option value="" hidden>--Pilih--</option>
                            <option value="Super Admin" <?= "Super Admin" == $user['level_pengguna'] ? 'selected' :null?>>Super Admin</option>
                            <option value="Admin" <?= "Admin" == $user['level_pengguna'] ? 'selected' :null?>>Admin</option>
                            <option value="Manager" <?= "Manager" == $user['level_pengguna'] ? 'selected' :null?>>Manager</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Edit Pengguna</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>