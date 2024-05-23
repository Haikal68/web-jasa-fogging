<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Services</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-primary" style="margin-bottom:20px" href="<?php echo base_url(); ?>admin/tambahServices">
                <i class=" fas fa-plus"></i>
                Tambah Services
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
                            <h4>Data Services</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama Layanan</th>
                                            <th>deskripsi</th>
                                            <th>Harga</th>
                                            <th>Luas Area</th>
                                            <th>Durasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($service as $j) : ?>

                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $j['nama_layanan']; ?></td>
                                                <td><?= $j['deskripsi']; ?></td>
                                                <td>Rp <?= number_format($j['harga'], 0, ',', '.') ?></td>
                                                <td><?= $j['luas_area']; ?> m2</td>
                                                <td><?= $j['durasi']; ?> jam</td>

                                                <td class="text-center">
                                                    <a href="/admin/editServices/<?= $j['service_id']; ?>"><button class=" btn btn-primary btn-sm rounded-3" title="Edit"><i class="fas fa-edit "></i></button></a>
                                                    <a class="btn-hapus" href="/admin/deleteServices/<?= $j['service_id']; ?>"><button class=" btn btn-danger btn-sm rounded-3" title="Delete"><i class="fas fa-trash "></i></button></a>
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