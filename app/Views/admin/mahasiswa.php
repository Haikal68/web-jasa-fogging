<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-primary" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/tambah_mahasiswa">
                <i class=" fas fa-plus"></i>
                Tambah Mahasiswa
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
                            <h4>Data Mahasiswa</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nim</th>
                                            <th>Nama</th>
                                            <th>Jurusan </th>
                                            <th>Prodi </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($mahasiswa as $m) : ?>
                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $m['nim']; ?></td>
                                                <td><?= $m['nama']; ?></td>
                                                <td><?= $m['nama_jurusan']; ?></td>
                                                <td><?= $m['nama_program_studi']; ?></td>

                                                <td class="text-center">
                                                    <a href="/admin/editmahasiswa/<?= $m['nim']; ?>"><button class=" btn btn-primary btn-sm rounded-3" title="Edit"><i class="fas fa-edit "></i></button></a>
                                                    <!-- <form action="/admin/deletemahasiswa/<?= $m['nim']; ?>" method="POST" class="d-inline">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class='btn btn-danger btn-sm rounded-3 mr-2 btn-hapus' type='submit' title='Delete'><i class='fa fa-trash '></i></button></a>
                                                    </form> -->
                                                    <a class="btn-hapus" href="/admin/deletemahasiswa/<?= $m['nim']; ?>"><button class=" btn btn-danger btn-sm rounded-3" title="Delete"><i class="fas fa-trash "></i></button></a>
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