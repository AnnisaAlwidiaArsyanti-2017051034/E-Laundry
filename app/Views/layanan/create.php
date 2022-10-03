<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<<<<<<< HEAD
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Jenis Laundry</h3>
    </div>
    <!-- /.card-header -->
    
    <!-- form start -->
    <form action="/store" method="post">
        <div class="card-body">
=======
<form action="/store" method="post">
    <div class="row">
        <div class="col-6">
>>>>>>> a4b9a2029f84faf9ada1beab9ec165d5afe4af73
            <div class="form-group">
                <label for="jenis_layanan">Jenis Layanan</label>
                <input type="text" name="jenis_layanan" class="form-control" id="jenis_layanan">
            </div>
            <div class="form-group">
                <label for="estimasi_waktu">Estimasi Waktu</label>
                <input type="text" name="estimasi_waktu" class="form-control" id="estimasi_waktu">
            </div>
            <div class="form-group">
                <label for="tarif">Tarif</label>
                <input type="text" name="tarif" class="form-control" id="tarif">
            </div>
        </div>
<<<<<<< HEAD
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
=======
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
>>>>>>> a4b9a2029f84faf9ada1beab9ec165d5afe4af73
<?= $this->endSection(); ?>