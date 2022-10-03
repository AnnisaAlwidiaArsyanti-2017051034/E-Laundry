<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<<<<<<< HEAD
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Jenis Layanan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/update/<?= $layanan['layanan_id'] ?>" method="post">
        <div class="card-body">
=======
<form action="/update/<?= $layanan['layanan_id'] ?>" method="post">
    <div class="row">
        <div class="col-6">
>>>>>>> a4b9a2029f84faf9ada1beab9ec165d5afe4af73
            <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" name="jenis_layanan" class="form-control" id="jenis_layanan" value="<?= $layanan['jenis_layanan']?>">
            </div>
            <div class="form-group">
                <label for="estimasi_waktu">Estimasi Waktu</label>
                <input type="text" name="estimasi_waktu" class="form-control" id="estimasi_waktu" value="<?= $layanan['estimasi_waktu']?>">
            </div>
            <div class="form-group">
                <label for="tarif">Tarif</label>
                <input type="text" name="tarif" class="form-control" id="tarif" value="<?= $layanan['tarif']?>">
            </div>
        </div>
<<<<<<< HEAD
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">Edit</button>
        </div>
    </form>
</div>
=======
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
>>>>>>> a4b9a2029f84faf9ada1beab9ec165d5afe4af73
<?= $this->endSection(); ?>