<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Prodi</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/prodi">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/saveprodi" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Prodi</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_prodi">Kode Program Studi</label>
                                    <input type="text" class="form-control" name="kode_prodi" id="kode_prodi" required="" autofocus>
                                    <div id="kode_prodi" class="invalid-feedback">
                                        <?= $validation->getError('kode_prodi'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_program_studi">Nama Program Studi</label>
                                    <input type="text" class="form-control" name="nama_program_studi" id="nama_program_studi" required="">
                                    <div id="nama_program_studi" class="invalid-feedback">
                                        <?= $validation->getError('nama_program_studi'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_jurusan">Jurusan</label>
                                    <select class="form-control" id="id_jurusan" name="id_jurusan">
                                        <?php foreach ($jurusan as $j) : ?>
                                            <option value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
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