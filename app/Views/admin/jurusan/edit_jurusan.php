<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Jurusan</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/jurusan">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/udpatejurusan/<?= $jurusan['id']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit Jurusan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id">ID Jurusan</label>
                                    <input type="text" name="id" id="id" class="form-control" value="<?= $jurusan['id']; ?>" readonly>
                                    <div id="id" class="invalid-feedback">
                                        <?= $validation->getError('id'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_jurusan">Nama Jurusan</label>
                                    <input type="text" class="form-control" name="nama_jurusan" id="name" value="<?= $jurusan['nama_jurusan']; ?>">
                                    <div id="nama_jurusan" class="invalid-feedback">
                                        <?= $validation->getError('nama_jurusan'); ?>
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