<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna</h6>
        </div>
        <?= view('Myth\Auth\Views\_message_block') ?>
        <form action="<?= url_to('createUser') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="email">E-mail pengguna</label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                </div>
                <div class="form-group">
                    <label for="username">Username Pengguna</label>
                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password Pengguna</label>
                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                </div>
                <div class="form-group">
                            <label for="pass_confirm">Konfirmasi Password</label>
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                        </div>
                <div class="form-group">
                    <label for="level">Level Pengguna</label>
                    <select name="group_id" id="level" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
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