<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mata Kuliah</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-primary" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/tambah_matkul">
                <i class=" fas fa-plus"></i>
                Tambah Mata Kuliah
            </a>
            <!-- <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?> -->

            <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Mata Kuliah</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Jam</th>
                                            <th>Semester</th>
                                            <th>Program Studi</th>
                                            <th>Jurusan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($matkul as $j) : ?>
                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $j['nama_matakuliah']; ?></td>
                                                <td><?= $j['sks']; ?></td>
                                                <td><?= $j['jam']; ?></td>
                                                <td><?= $j['semester']; ?></td>
                                                <td><?= $j['nama_program_studi']; ?></td>
                                                <td><?= $j['nama_jurusan']; ?></td>

                                                <td class="text-center">
                                                    <a href="/admin/editmatkul/<?= $j['kode_matakuliah']; ?>"><button class=" btn btn-primary btn-sm rounded-3" title="Edit"><i class="fas fa-edit "></i></button></a>
                                                    <a class="btn-hapus" href="/admin/deletematkul/<?= $j['kode_matakuliah']; ?>"><button class=" btn btn-danger btn-sm rounded-3" title="Delete"><i class="fas fa-trash "></i></button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endsection(); ?>