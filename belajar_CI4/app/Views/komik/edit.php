<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form ubah data komik</h2>
            <form action="/komik/update/<?= $komik['id']; ?>" method="POST">
                <?= csrf_field(); // untuk menjaga agar form nya hanya dapat diisi didalam halaman yang sudah dibuat saja (CSRF : Cross Site Resource Forgery) 
                ?>
                <input type="hidden" name="slug" value="<?= $komik['slug']; ?>">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                        name="judul" id="judul" placeholder="Masukkan judul" autofocus value="<?= $komik['judul']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Penulis">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="Penulis" placeholder="penulis"
                        value="<?= $komik['penulis']; ?>">
                </div>
                <div class="form-group">
                    <label for="penerbit">penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="penerbit"
                        value="<?= $komik['penerbit']; ?>">
                </div>
                <div class="form-group">
                    <label for="sampul">sampul</label>
                    <input type="text" class="form-control" name="sampul" id="sampul" placeholder="sampul"
                        value="<?= $komik['sampul']; ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-4">ubah data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>