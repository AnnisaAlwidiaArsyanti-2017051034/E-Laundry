<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="card card-primary">
    
    <div class="card-header">
        <h3 class="card-title">Tambah Jenis Laundry</h3>
    </div>
    <!-- /.card-header -->
    
    <!-- form start -->
    <form action="/storeTransaksi" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan">
            </div>
            <div class="form-group">
                <label for="nomor_tlp_pelanggan">No Telp Pelanggan</label>
                <input type="text" name="nomor_tlp_pelanggan" class="form-control" id="nomor_tlp_pelanggan">
            </div>
            <div class="form-group">
                <label for="alamat_pelanggan">Alamat_Pelanggan</label>
                <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan">
            </div>
            <div class="form-group">
                <label for="layanan">Pilih Layanan</label>
                <input type="text" name="layanan" class="form-control" id="layanan">
            </div>
            <div class="form-group">
                <label for="berat">Berat</label>
                <input type="text" name="berat" class="form-control" id="berat">
            </div>
            <div class="form-group">
                <label for="status_pembayaran">Status Pembayaran :</label>
                <input type="text" name="status_pembayaran" class="form-control" id="status_pembayaran">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>