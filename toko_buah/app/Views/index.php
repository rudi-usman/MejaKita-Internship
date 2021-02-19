<?= $this->extend('template/layout.php'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Tabel Buah</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>

            <a class="btn btn-primary" href="/Pages/tambah_data">Tambah Data</a>
            <table class="table mt-3">
                <thead>
                    <tr class="text-center">
                        <th scope="col-sm">No</th>
                        <th scope="col-sm">Nama Buah</th>
                        <th scope="col-sm">Harga</th>
                        <th scope="col-sm">Foto</th>
                        <th scope="col-sm">Deskripsi</th>
                        <th scope="col-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($buah as $b) : ?>

                    <tr class="text-center">
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $b['name']; ?></td>
                        <td><?= $b['price']; ?></td>
                        <td> <img style="width: 200px;" src="/img/<?= $b['image']; ?>" alt="default.jpg"></td>
                        <td><?= $b['description']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="/Buah/edit/<?= $b['product_id']; ?>">Edit</a>
                            <!-- metode HTTP Spoofing -->
                            <form action="/Buah/delete/<?= $b['product_id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus?');">Delete</button>
                            </form><br><br>
                            <!-- akhir metode HTTP Spoofing -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>