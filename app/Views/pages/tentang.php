<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>


<div class="jumbotron jumbotron-fluid bg-info">
    <div class="container text-white text-center">
        <img style="box-shadow: 5px 5px 5px rgba(0,0,0,0.3)" src="<?= base_url(); ?>/assets/adminlte/laundry.jpg" alt="logo" class="img-fluid rounded mb-2" width="200">
        <h1 class="text-shadow display-4 oleo-font font-weight-bold">E-Laundry</h1>

        <h4 class="text-shadow my-3">Mencuci dengan <span class="font-weight-bold">Cepat</span> dan <span class="font-weight-bold">Bersih.</span></h4>
        <h5 class="text-shadow my-2">Membuat pakaian anda seperti baru kembali.</span></h5>
        <a href="#tentang" class="page-scroll px-3 py-2 btn btn-primary rounded-pill my-5">Tentang Kami</a>
    </div>
</div>
<?= $this->endSection(); ?>