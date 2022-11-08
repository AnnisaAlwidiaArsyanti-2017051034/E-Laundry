<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Transaksi</h6>
        </div>
        <!-- form start -->
        <form action="/updateTransaksi/<?= $transaksi['no_invoice'] ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" value="<?= $transaksi['nama_pelanggan']?>">
                </div>
                <div class="form-group">
                    <label for="nomor_tlp_pelanggan">No Telp Pelanggan</label>
                    <input type="text" name="nomor_tlp_pelanggan" class="form-control" id="nomor_tlp_pelanggan" value="<?= $transaksi['nomor_tlp_pelanggan']?>">
                </div>
                <div class="form-group">
                    <label for="alamat_pelanggan">Alamat Pelanggan</label>
                    <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan" value="<?= $transaksi['alamat_pelanggan']?>">
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="<?= $transaksi['tanggal_masuk']?>">
                </div>
                <div class="form-group">
                    <label for="berat">Berat</label>
                    <input type="number" name="berat" class="form-control" id="berat" value="<?= $transaksi['berat']?>">
                </div>
                <div class="form-group">
                    <label for="layanan">Pilih Layanan</label>
                    <select name = "layanan" id="layanan" class="form-control" required>
                        <option value="" hidden>--Pilih--</option>
                        <?php foreach ($layanan as $lyn) : ?>
                            <option value="<?=$lyn['layanan_id']?>" <?=$transaksi['layanan'] == $lyn['layanan_id'] ? 'selected' :null?>><?=$lyn['jenis_layanan']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_keluar">Tanggal Keluar</label>                            
                    <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" value="<?= $transaksi['tanggal_keluar']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="text" name="biaya" class="form-control" id="biaya" value="<?= $transaksi['biaya']?>" readonly>
                </div>
                <div class="form-group">
                    <label>Status Pembayaran : </label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="status_pembayaran" name="status_pembayaran" value="Belum Dibayar" <?= "Belum Dibayar" == $transaksi['status_pembayaran'] ? 'checked' :null?>>
                        <label class="custom-control-label" for="status_pembayaran">Belum Dibayar</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="status_pembayaran2" name="status_pembayaran" value="Telah Dibayar" <?= "Telah Dibayar" == $transaksi['status_pembayaran'] ? 'checked' :null?>>
                        <label class="custom-control-label" for="status_pembayaran2">Telah Dibayar</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status Pengambilan : </label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="status_pengambilan" name="status_pengambilan" value="Belum Diambil" <?= "Belum Diambil" == $transaksi['status_pengambilan'] ? 'checked' :null?>>
                        <label class="custom-control-label" for="status_pengambilan">Belum Diambil</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="status_pengambilan2" name="status_pengambilan" value="Telah Diambil" <?= "Telah Diambil" == $transaksi['status_pengambilan'] ? 'checked' :null?>>
                        <label class="custom-control-label" for="status_pengambilan2">Telah Diambil</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Edit Transaksi</button>
            </div>
        </form>
    </div>
</div>
<script src="<?= base_url('assets/sbadmin/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#layanan').change(function() {
            var layanan_id = $('#layanan').val();
            var berat = $('#berat').val();
            var action = 'get_layanan';

            $('#tanggal_masuk').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#tanggal_keluar').datepicker({
                format: 'yyyy-mm-dd'
            });

            $.ajax({
                url: "<?php echo site_url('/getLayanan'); ?>",
                method: "post",
                data: {
                    layanan_id: layanan_id,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    $('#biaya').val(data[0].tarif * berat);
                    var tanggal_masuk = $('#tanggal_masuk').datepicker('getDate');
                    var date = new Date(Date.parse(tanggal_masuk));
                    date.setDate(date.getDate() + +data[0].estimasi_waktu);

                    var newDate = date.toDateString();
                    newDate = new Date(Date.parse(newDate));

                    $('#tanggal_keluar').datepicker('setDate', newDate);

                }
            });
        });

    });
</script>
<?= $this->endSection(); ?>