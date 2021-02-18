<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($alamat as $a) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['tipe']; ?></td>
                        <td><?= $a['alamat']; ?> </td>
                        <td><?= $a['kota']; ?></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>