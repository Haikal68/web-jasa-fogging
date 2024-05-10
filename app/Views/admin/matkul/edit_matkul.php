<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Mata Kuliah</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/matkul">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <form action="/admin/updatematkul/<?= $matkul['kode_matakuliah']; ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="card-header">
                                <h4>Form Edit matkul</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_matakuliah">Kode Matakuliah </label>
                                    <input type="text" name="kode_matakuliah" id="kode_matakuliah" class="form-control" value="<?= $matkul['kode_matakuliah']; ?>" readonly>
                                    <div id="kode_matakuliah" class="invalid-feedback">
                                        <?= $validation->getError('kode_matakuliah'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_matakuliah">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" name="nama_matakuliah" id="name" value="<?= $matkul['nama_matakuliah']; ?>" required="">
                                    <div id="nama_matakuliah" class="invalid-feedback">
                                        <?= $validation->getError('nama_matakuliah'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sks">SKS</label>
                                    <input type="text" class="form-control" name="sks" id="sks" value="<?= $matkul['sks']; ?>" required="">
                                    <div id="sks" class="invalid-feedback">
                                        <?= $validation->getError('sks'); ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jam">Jam</label>
                                    <input type="text" class="form-control" name="jam" id="jam" value="<?= $matkul['jam']; ?>" required="">
                                    <div id="jam" class="invalid-feedback">
                                        <?= $validation->getError('jam'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="semester">Semester</label>
                                    <input type="text" class="form-control" name="semester" id="semester" value="<?= $matkul['semester']; ?>" required="">
                                    <div id="semester" class="invalid-feedback">
                                        <?= $validation->getError('semester'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kode_prodi">Program Studi</label>
                                    <select class="form-control" id="kode_prodi" name="kode_prodi">
                                        <?php foreach ($prodi as $p) : ?>
                                            <option value="<?= $p['kode_prodi']; ?>" <?= ($matkul['kode_prodi'] == $p['kode_prodi']) ? 'selected' : ''; ?>><?= $p['nama_program_studi']; ?> - <?= $p['nama_jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_jurusan">Jurusan</label>
                                    <select class="form-control" id="id_jurusan" name="id_jurusan">
                                        <?php foreach ($jurusan as $j) : ?>
                                            <option value="<?= $j['id']; ?>" <?= ($matkul['id_jurusan'] == $j['id']) ? 'selected' : ''; ?>><?= $j['nama_jurusan']; ?></option>
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