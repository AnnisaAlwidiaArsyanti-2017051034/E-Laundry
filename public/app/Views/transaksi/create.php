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
                        <select name = "layanan" id="layanan" class="form-control" required>
                            <option value="" hidden>--Pilih--</option>
                            <?php foreach ($layanan as $lyn) : ?>
                                <option value="<?=$lyn['jenis_layanan']?>"><?=$lyn['jenis_layanan']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="text" name="berat" class="form-control" id="berat">
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>                            
                        <input type="text" name="biaya" class="form-control" id="biaya" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label>Status Pembayaran : </label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="status_pembayaran" name="status_pembayaran" value="Belum Dibayar">
                            <label class="custom-control-label" for="status_pembayaran">Belum Dibayar</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="status_pembayaran2" name="status_pembayaran" value="Telah Dibayar">
                            <label class="custom-control-label" for="status_pembayaran2">Telah Dibayar</label>
                        </div>
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