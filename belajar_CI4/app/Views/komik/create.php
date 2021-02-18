<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form tambah data komik</h2>
            <form action="/komik/save" method="POST">
                <?= csrf_field(); // untuk menjaga agar form nya hanya dapat diisi didalam halaman yang sudah dibuat saja (CSRF : Cross Site Resource Forgery) 
                ?>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                        name="judul" id="judul" placeholder="Masukkan judul" autofocus value="<?= old('judul') ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Penulis">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="Penulis" placeholder="penulis"
                        value="<?= old('penulis') ?>">
                </div>
                <div class="form-group">
                    <label for="penerbit">penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="penerbit"
                        value="<?= old('penerbit') ?>">
                </div>
                <div class="form-group">
                    <label for="sampul">sampul</label>
                    <input type="text" class="form-control" name="sampul" id="sampul" placeholder="sampul"
                        value="<?= old('sampul') ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-4">tambah data</button>
            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>