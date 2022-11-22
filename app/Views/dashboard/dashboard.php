<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Transaksi Hari Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 
                                <?php echo number_format(floatval($hari_ini[0]['total']));?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Transaksi Bulan Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format(floatval($bulan_ini[0]['total'],0,',','.')); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Transaksi Tahun Ini
                            </div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?php echo number_format(floatval($year_ini[0]['total'],0,',','.')); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Transaksi Selama Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format(floatval($selama_ini[0]['total'],0,',','.')); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Transaksi</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header"></div>
                            <a class="dropdown-item" href="#" id="transaksi_by_layanan">Transaksi Berdasarkan Layanan</a>
                            <a class="dropdown-item" href="#" id="transaksi_by_status_bayar">Transaksi Berdasarkan Status Pembayaran</a>
                            <a class="dropdown-item" href="#" id="transaksi_by_status_ambil">Transaksi Berdasarkan Status Pengambilan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="pie_chart"></canvas>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                        <span id="keterangan_chart"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/sbadmin/vendor/chart.js/Chart.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            transaksi_by_layanan();
        });

        $('#transaksi_by_layanan').on('click',function(){    
            transaksi_by_layanan();
        });
        function transaksi_by_layanan(){
            
            var ket = document.getElementById("keterangan_chart");

            // menampilkan output ke elemen ket
            ket.innerHTML = "Jumlah Transaksi Berdasarkan Layanan";
            var pie_chart = document.getElementById("pie_chart");
            var data_trans_layanan = [];
            var label_trans_layanan = [];
            <?php foreach($transbylayanan->getResult() as $key=>$value): ?>
                data_trans_layanan.push(<?= $value->total?>);
                label_trans_layanan.push('<?= $value->jenis_layanan?>');
            <?php endforeach; ?>
            var data_trans_per_layanan = {
                datasets: [{
                    data : data_trans_layanan,
                    backgroundColor: ['#9900ff', '#0066ff', '#ffff00','#ff0000'],
                    hoverBackgroundColor: ['#a31aff', '#3385ff', '#ffff4d', '#ff1a1a'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                    labels:label_trans_layanan
            }
            var chart_trans_layanan = new Chart(pie_chart, {
                type: 'doughnut',
                data : data_trans_per_layanan
            });            
        };

        $('#transaksi_by_status_bayar').on('click',function(){    
            transaksi_by_status_bayar();
        });
        function transaksi_by_status_bayar(){
            
            var ket = document.getElementById("keterangan_chart");

            // menampilkan output ke elemen ket
            ket.innerHTML = "Jumlah Transaksi Berdasarkan Status Pembayaran";
            var pie_chart = document.getElementById("pie_chart");
            var data_trans_bayar = [];
            var label_trans_bayar = [];
            <?php foreach($transbybayar->getResult() as $key=>$value): ?>
                data_trans_bayar.push(<?= $value->total?>);
                label_trans_bayar.push('<?= $value->status_pembayaran?>');
            <?php endforeach; ?>
            var data_trans_per_bayar = {
                datasets: [{
                    data : data_trans_bayar,
                    backgroundColor: ['#9900ff', '#0066ff', '#ffff00','#ff0000'],
                    hoverBackgroundColor: ['#a31aff', '#3385ff', '#ffff4d', '#ff1a1a'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                    labels:label_trans_bayar
            }
            var chart_trans_bayar = new Chart(pie_chart, {
                type: 'doughnut',
                data : data_trans_per_bayar
            });
                       
        };

        $('#transaksi_by_status_ambil').on('click',function(){    
            transaksi_by_status_ambil();
        });
        function transaksi_by_status_ambil(){
            
            var ket = document.getElementById("keterangan_chart");

            // menampilkan output ke elemen ket
            ket.innerHTML = "Jumlah Transaksi Berdasarkan Status Pengambilan";
            var pie_chart = document.getElementById("pie_chart");
            var data_trans_ambil = [];
            var label_trans_ambil = [];
            <?php foreach($transbyambil->getResult() as $key=>$value): ?>
                data_trans_ambil.push(<?= $value->total?>);
                label_trans_ambil.push('<?= $value->status_pengambilan?>');
            <?php endforeach; ?>
            var data_trans_per_ambil = {
                datasets: [{
                    data : data_trans_ambil,
                    backgroundColor: ['#9900ff', '#0066ff', '#ffff00','#ff0000'],
                    hoverBackgroundColor: ['#a31aff', '#3385ff', '#ffff4d', '#ff1a1a'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                    labels:label_trans_ambil
            }
            var chart_trans_ambil = new Chart(pie_chart, {
                type: 'doughnut',
                data : data_trans_per_ambil
            });            
        };
    </script>
<?= $this->endSection() ?>