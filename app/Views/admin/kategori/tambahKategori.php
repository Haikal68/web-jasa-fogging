<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Kategori</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/categories">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/saveCategories" method="POST">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Kategori</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori">Nama Kategori</label>
                                    <input type="text" class="form-control" name="kategori" id="kategori" required="" autofocus>
                                    <div id="kategori" class="invalid-feedback">
                                        <?= $validation->getError('kategori'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" required="">
                                    <div id="deskripsi" class="invalid-feedback">
                                        <?= $validation->getError('deskripsi'); ?>
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
    </section>
</div>

<?= $this->endsection(); ?>