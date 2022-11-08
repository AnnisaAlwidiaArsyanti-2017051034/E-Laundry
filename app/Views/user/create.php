<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna</h6>
        </div>
        <form action="/storeUser" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Pengguna</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
                <div class="form-group">
                    <label for="email">E-mail pengguna</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="username">Username Pengguna</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password Pengguna</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
<<<<<<< HEAD
                    <label for="role">Level Pengguna</label>
                    <select name="role" id="role" class="form-control" required>
=======
                    <label for="level">Level Pengguna</label>
                    <select name="level" id="level" class="form-control" required>
>>>>>>> 5dcbec202b6a21da831f460619e6ad883d9563cd
                        <option value="" hidden>--Pilih--</option>
                        <option value="Super Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Buat Pengguna</button>
            </div>
        </form>

    </div>
</div>
<?= $this->endSection(); ?>