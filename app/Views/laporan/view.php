<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Pendapatan Berdasarkan Transaksi</h1>
    <p class="mb-4">Periode tanggal <?php echo $tgl_awal;?> s/d <?php echo $tgl_akhir;?></p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- form -->
            <form action="<?= base_url('/viewLaporan'); ?>" method="post" id="form">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" value="<?= $tgl_awal?>" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"  name="tgl_akhir" id="tgl_akhir" value="<?= $tgl_akhir?>" required>
                    </div>
                    <div class="col-sm-3">
                        <button  type="submit" name="btn-tampil" id="btn-tampil"  class="btn btn-info"><span class="text"><i class="fas fa-search fa-sm"></i> Tampilkan</span></button>
                    </div>
                </div>
            </form>
          <br>
            <!-- Tampil Laporan -->
            <div name="tampil_laporan" id="tampil_laporan">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <!-- Tabel daftar transaksi -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
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
                <br>
                <a href="<?php echo '/printLaporan/'.$tgl_awal.'/'.$tgl_akhir?>" target='blank' class="btn btn-primary btn-icon-split"><span class="text"><i class="fas fa-print fa-sm"></i> Cetak Laporan</span></a>
            </div>                
        </div>            
    </div>
</div>


<?= $this->endSection(); ?>