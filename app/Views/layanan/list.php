<a href="/create" type="button" class="btn btn-primary mb-3">Tambah</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Jenis Layanan</th>
      <th scope="col">Estimasi Waktu</th>
      <th scope="col">Tarif</th>
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
          <a class="btn btn-warning mr-3" href="/edit/<?= $lyn['layanan_id'] ?>">Edit</a>                    
          <form action="/delete/<?= $lyn['layanan_id'] ?>" method="post">
            <input type="hidden" name="_methode" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    <?php $no++; endforeach; ?>
  </tbody>
</table>