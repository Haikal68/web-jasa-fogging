<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit services</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/Services">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/updateServices/<?= $services['service_id']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit services</h4>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nama_layanan">Nama Layanan</label>
                                    <input type="text" class="form-control" name="nama_layanan" id="nama_layanan" value="<?= $services['nama_layanan']; ?>" required="">
                                    <div id="nama_layanan" class="invalid-feedback">
                                        <?= $validation->getError('nama_layanan'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Nama Layanan</label>
                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $services['deskripsi']; ?>" required="">
                                    <div id="deskripsi" class="invalid-feedback">
                                        <?= $validation->getError('deskripsi'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="harga" value="<?= $services['harga']; ?>" required="">
                                    <div id="harga" class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="luas">Luas Area</label>
                                    <input type="number" class="form-control" name="luas" id="luas" value="<?= $services['luas_area']; ?>" required="">
                                    <div id="luas" class="invalid-feedback">
                                        <?= $validation->getError('luas'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="durasi">Durasi</label>
                                    <input type="number" class="form-control" name="durasi" id="durasi" value="<?= $services['durasi']; ?>" required="">
                                    <div id="durasi" class="invalid-feedback">
                                        <?= $validation->getError('durasi'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endsection(); ?>