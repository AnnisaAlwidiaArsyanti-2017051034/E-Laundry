<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="col-sm-6">
<<<<<<< HEAD
    <h1>Jenis Layanan</h1>
=======
        <h1>Jenis Layanan</h1>
>>>>>>> a4b9a2029f84faf9ada1beab9ec165d5afe4af73
</div>
<a href="/create" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Jenis Layanan</th>
      <th scope="col">Estimasi Waktu</th>
      <th scope="col">Tarif</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $no = 1;
        foreach ($layanan as $lyn) :
    ?>
    <tr>
      <th scope="row"><?=$no?></th>
      <td><?=$lyn['jenis_layanan']?></td>
      <td><?=$lyn['estimasi_waktu']?></td>
      <td><?=$lyn['tarif']?></td>
      <td>
        <div class="d-flex">
          <a href="/edit/<?= $lyn['layanan_id'] ?>"><button class="btn btn-warning mr-3"><i class="fas fa-edit"></i> Edit</button></a>                    
          <form action="/delete/<?= $lyn['layanan_id'] ?>" method="post">
            <input type="hidden" name="_methode" value="DELETE">
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
          </form>
        </div>
      </td>
    </tr>
    <?php $no++; endforeach; ?>
  </tbody>
</table>
<?= $this->endSection(); ?>