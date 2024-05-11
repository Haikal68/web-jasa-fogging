<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Layanan</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/services">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/saveServices" method="POST">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Layanan</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="layanan">Nama Layanan</label>
                                    <input type="text" class="form-control" name="layanan" id="layanan" required="" autofocus>
                                    <div id="layanan" class="invalid-feedback">
                                        <?= $validation->getError('layanan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" required="">
                                    <div id="deskripsi" class="invalid-feedback">
                                        <?= $validation->getError('deskripsi'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" min="1" class="form-control" name="harga" id="harga" required="">
                                    <div id="harga" class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="luas">Luas Area</label>
                                    <input type="number" min="1" class="form-control" name="luas" id="luas" required="">
                                    <div id="luas" class="invalid-feedback">
                                        <?= $validation->getError('luas'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="durasi">Durasi</label>
                                    <input type="number" min="1" class="form-control" name="durasi" id="durasi" required="">
                                    <div id="durasi" class="invalid-feedback">
                                        <?= $validation->getError('durasi'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="id_kategori" id="id_kategori">
                                        <option selected>--Pilih Kategori--</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['kategori_id']; ?>"><?= $k['nama_kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>

<?= $this->endsection(); ?>