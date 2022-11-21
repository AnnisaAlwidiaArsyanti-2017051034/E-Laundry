<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Pendapatan Berdasarkan Transaksi</h1>
    <p class="mb-4">Halaman laporan pendapatan berisi informasi seluruh transaksi per periode tertentu.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- form -->
            <form action="<?= base_url('/viewLaporan'); ?>" method="post" id="form">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="date" class="form-control"  name="tgl_akhir" id="tgl_akhir" required>
                    </div>
                    <div class="col-sm-3">
                        <button  type="submit" name="btn-tampil" id="btn-tampil"  class="btn btn-info"><span class="text"><i class="fas fa-search fa-sm"></i> Tampilkan</span></button>
                    </div>
                </div>
            </form>
            <!-- Tampil Laporan -->
            <div name="tampil_laporan" id="tampil_laporan">
                
            </div>            
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#btn-tampil').on('click',function(){
        laporan();
    });
    function laporan_per_admin(){
        var data = $('#form').serialize();
        $.ajax({
            type : 'POST',
            url	: "laporan/view.php",
            data: data,
            cache	: false,
            success	: function(data){
            $("#tampil_laporan").html(data);

            }
        });
    }
</script>
<?= $this->endSection(); ?>