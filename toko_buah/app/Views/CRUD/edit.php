<?= $this->extend('template/layout.php'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mt-3">
            <h1>Edit Data</h1>
            <?php foreach ($buah as $b) : ?>
            <form action="/Buah/update/<?= $b['product_id'] ?>" method="POST">
                <div class="mb-3">
                    <label for="nama_buah" class="form-label">Nama Buah</label>
                    <input type="text" class="form-control" id="nama_buah" name="nama_buah" value="<?= $b['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" value="<?= $b['price'] ?>">
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="text" class="form-control" name="foto" id="foto" value="<?= $b['image'] ?>">
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="text" value="<?= $b['description'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/" class="btn btn-danger">cancel</a>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>