<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="mt-2">Daftar Komik</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>

            <?php endif; ?>

            <a href="/komik/create" class="btn btn-primary mb-3">Tambah data komik</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($komik as $key) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img class="sampul" src="/img/<?= $key['sampul']; ?>" alt="Sampul"></td>
                        <td><?= $key['judul']; ?></td>
                        <td><a class="btn btn-success" href="/komik/<?= $key['slug']; ?>">Detail</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>