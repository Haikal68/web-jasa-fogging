<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Kategori</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/categories">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/updateCategories/<?= $kategori['kategori_id']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit Kategori</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori">Nama Kategori</label>
                                    <input type="text" name="kategori" id="kategori" class="form-control" value="<?= $kategori['nama_kategori']; ?>" required="">
                                    <div id="kategori" class="invalid-feedback">
                                        <?= $validation->getError('kategori'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $kategori['deskripsi']; ?>" required="">
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