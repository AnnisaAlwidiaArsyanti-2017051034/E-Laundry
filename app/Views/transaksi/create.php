<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h6>
        </div>
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
                    <button type="submit" class="btn btn-primary">Buat Transaksi</button>
                </div>
            </form>
        
    </div>
</div>
<?= $this->endSection(); ?>