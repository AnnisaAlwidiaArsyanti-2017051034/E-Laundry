<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 font-weight-bold text-gray-800">Transaksi</h1>
  <a href="/createTransaksi" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
              
  <!-- transaksiTables-->
  <div class="card shadow mb-4">
    <?php
        foreach ($transaksi as $trans) :
    ?>
    <div class="card-header py-3">
        <div class="row">
            <div class="col-sm-6">
                <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
            </div>
            <div class="col-sm-6 text-right">
                <h6>
                    <?php echo $trans->status_pembayaran == "Telah Dibayar" ? "<span class='badge-pill badge-success'>Telah Dibayar</span>" : "<span class='badge-pill badge-warning'>Belum Dibayar</span>"; ?>
                    <?php echo $trans->status_pengambilan == "Telah Diambil" ? "<span class='badge-pill badge-success'>Telah Diambil</span>" : "<span class='badge-pill badge-warning'>Belum Diambil</span>"; ?>
                </h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <!--rows -->   
        <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>No Invoice</td>
                                <td>: <?php echo $trans->no_invoice;?></td>
                                <input type="hidden" name="no_invoice" id="no_invoice" value="<?php echo $trans->no_invoice;; ?>" >
                            </tr>
                            <tr>
                                <td>Pelanggan</td>
                                <td>: <?php echo $trans->nama_pelanggan;?></td>
                            </tr>
                            <tr>
                                <td>No Telp</td>
                                <td>: <?php echo $trans->nomor_tlp_pelanggan;?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?php echo $trans->alamat_pelanggan;?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-8">
                
                </div>
            </div>
            <!--rows -->
            <div>
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead class="text-center">
                        <tr>
                            <th rowspan="2">Layanan</th>
                            <th rowspan="2">Tarif</th>
                            <th rowspan="2">Berat</th>
                            <th rowspan="2">Total Biaya</th>
                            <th colspan="2">Waktu</th>
                        </tr>
                        <tr>
                            <th>Mulai</th>
                            <th>Selesai</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr>
                            <td><?php echo 1; ?></td>
                            <td><?php echo $trans->jenis_layanan; ?></td>
                            <td>Rp. <?php echo number_format($trans->tarif,0,',','.'); ?>/KG</td>
                            <td><?php echo $trans->berat; ?> KG</td>
                            <td>Rp. <?php echo number_format($trans->biaya,0,',','.'); ?></td>
                            <td><?php echo date("d/m/Y",strtotime($trans->tanggal_masuk)); ?></td>
                            <td><?php echo date("d/m/Y",strtotime($trans->tanggal_keluar)); ?></td>
                        </tr>
                  
                        </tbody>
                    </table>
                </div>
                <a href="/editTransaksi/<?= $trans->no_invoice ?>"><button class="btn btn-warning"><i class="fas fa-edit"></i> Edit Transaksi</button></a>&nbsp;                    
                <!-- Tombol cetak invoice -->
                <a href="#" target='blank' class="btn btn-primary btn-icon-split"><span class="text"><i class="fas fa-print"></i> Cetak Invoice</span></a>
                <a href="#" target='blank' class="btn btn-success btn-icon-split"><span class="text"><i class="fas fa-print"></i> Printer Thermal</span></a>
                <a href="#" target='blank' class="btn btn-danger btn-icon-pdf"><span class="text"><i class="fas fa-file-pdf"></i> Export PDF</span></a>
            </div>
        <!--rows -->
        </div>
    </div>
    <?php endforeach; ?>
</div>