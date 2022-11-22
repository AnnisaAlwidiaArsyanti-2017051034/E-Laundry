<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Laporan Pendapatan Periode Transaksi</title>
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
                <div class="mb-4">
                    <center><strong><h3>Laporan Pendapatan Laundry</h3></strong></center>
                    <center>Periode tanggal <?php echo $tgl_awal;?> s/d <?php echo $tgl_akhir;?> </center>               
                    <div class="card-body">
                        <div name="tampil_laporan" id="tampil_laporan">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <!-- Tabel daftar transaksi -->
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No Invoice</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Berat</th>
                                            <th>Layanan</th>
                                            <th>Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $total_biaya=0;
                                            foreach ($datalaporan as $key => $value) :?>

                                        <tr>
                                            <th scope="row"><?=$no?></th>
                                            <td><?php echo date('d/m/Y', strtotime($value["tanggal_masuk"]));?></td>
                                            <td><?php echo $value['no_invoice']; ?></td>
                                            <td><?php echo $value['nama_pelanggan']; ?></td>                                
                                            <td><?php echo $value['berat'];?></td>
                                            <td><?php echo $value['jenis_layanan']; ?></td>
                                            <td>Rp. <?php echo number_format($value['biaya'],0,',','.'); ?></td>
                                        <?php $no++;
                                            $biaya= $value['biaya'];
                                            $total_biaya+=$biaya;
                                            endforeach; ?>
                                        </tr>
                                            <td colspan="6">
                                                <strong>Total</strong>
                                            </td>
                                            <td>
                                                <strong>Rp. <?php echo number_format($total_biaya,0,',','.'); ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>                
                    </div>            
                </div>
            </div>
        </div>
    </body>
</html>