<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Invoice Transaksi</title>
        <link href="<?= base_url('assets/sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    </head>
    <body onload="window.print();">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <img src="\assets\washing-machine.png" width="95px" alt="brand"/>
                        </div>
                        
                        <div class="col-sm-10 text-left">
                            <h3>Laundry</h3>
                            <h6>Jl. Brawijaya No. 60, Telp 082017051034</h6>
                            <h6>www.laundry.com</h6>
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
                                            <td>: <?php echo $trans['no_invoice'];?></td>
                                            <input type="hidden" name="no_invoice" id="no_invoice" value="<?php echo $trans['no_invoice'];?>" >
                                        </tr>
                                        <tr>
                                            <td>Pelanggan</td>
                                            <td>: <?php echo $trans['nama_pelanggan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>No Telp</td>
                                            <td>: <?php echo $trans['nomor_tlp_pelanggan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: <?php echo $trans['alamat_pelanggan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Pembayaran</td>
                                            <td>: <?php echo $trans['status_pembayaran'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Pengambilan</td>
                                            <td>: <?php echo $trans['status_pengambilan']; ?></td>
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
                                        <th colspan="2">Waktu</th>
                                    </tr>
                                    <tr>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <tr>
                                        <td><?php echo $trans['jenis_layanan']; ?></td>
                                        <td>Rp <?php echo number_format($trans['tarif'],0,',','.'); ?>/KG</td>
                                        <td><?php echo $trans['berat']; ?> KG</td>
                                        <td><?php echo date("d/m/Y",strtotime($trans['tanggal_masuk'])); ?></td>
                                        <td><?php echo date("d/m/Y",strtotime($trans['tanggal_keluar'])); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>
                                <span class="text-right"><h3>Total Bayar : Rp <?php echo number_format($trans['biaya'],0,',','.'); ?></h3></span>
                            </div>
                        </div>
                    <!--rows -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>