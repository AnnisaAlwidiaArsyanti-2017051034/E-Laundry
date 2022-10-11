<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<div class="col-sm-6">
    <h1>Transaksi</h1>
</div>
<a href="/createTransaksi" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">No Invoice</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">No. Telp. Pelanggan</th>
      <th scope="col">Alamat Pelanggan</th>
      <th scope="col">Tanggal Masuk</th>
      <th scope="col">Berat</th>
      <th scope="col">Layanan</th>
      <th scope="col">Tanggal Keluar</th>
      <th scope="col">Biaya</th>
      <th scope="col">Status Pembayaran</th>
      <th scope="col">Status Pengembalian</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $no = 1;
        foreach ($transaksi as $trans) :
    ?>
    <tr>
      <th scope="row"><?=$no?></th>
      <td><?$trans['no_invoice']?></td>
      <td><?=$trans['nama_pelanggan']?></td>
      <td><?=$trans['nomor_tlp_pelanggan']?></td>
      <td><?=$trans['alamat_pelanggan']?></td>
      <td><?=$trans['tanggal_masuk']?></td>
      <td><?=$trans['berat']?> KG</td>
      <td><?=$trans['layanan']?></td>
      <td><?=$trans['tanggal_keluar']?></td>
      <td><?=$trans['biaya']?></td>
      <td><?=$trans['status_pembayaran']?></td>
      <td><?=$trans['status_pengambilan']?></td>
      <td>
        <div class="d-flex">
          <a href="/editTransaksi/<?= $trans['no_invoice'] ?>"><button class="btn btn-warning mr-3"><i class="fas fa-edit"></i> Edit</button></a>                    
          <form action="/deleteTransaksi/<?= $trans['no_invoice'] ?>" method="post">
            <input type="hidden" name="_methode" value="DELETE">
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
          </form>
        </div>
      </td>
    </tr>
    <?php  $no++; endforeach; ?>
  </tbody>
</table>
<?= $this->endSection(); ?>