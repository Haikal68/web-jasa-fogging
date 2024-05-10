<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Mahasiswa</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/mahasiswa">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/savemahasiswa" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Mahasiswa</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nim">Nim Mahasiswa</label>
                                    <input type="text" name="nim" id="nim" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autofocus>
                                    <div id="nim" class="invalid-feedback">
                                        <?= $validation->getError('nim'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" name="nama" id="name" required="">
                                    <div id="nama" class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Mahasiswa</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required="">
                                    <div id="alamat" class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jenkel">Jenis Kelamin</label>
                                    <select class="form-control" id="jenkel" name="jenkel">
                                        <option value="Laki Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id">Jurusan</label>
                                    <select class="form-control" id="id" name="id">
                                        <?php foreach ($jurusan as $j) : ?>
                                            <option value="<?= $j['id']; ?>"><?= $j['nama_jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kode_prodi">Program Studi</label>
                                    <select class="form-control" id="kode_prodi" name="kode_prodi">
                                        <?php foreach ($prodi as $p) : ?>
                                            <option value="<?= $p['kode_prodi']; ?>"><?= $p['nama_program_studi']; ?></option>
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