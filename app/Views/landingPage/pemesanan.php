<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/landingpage/Formstyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>

    <div class="main">
        <form action="/user/pesan" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="container">
                <a class="btn btn-back" href="<?php echo base_url(); ?>">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Back
                </a>

                <div class="heading">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.3986 7.64605C13.495 7.37724 13.88 7.37724 13.9764 7.64605L14.2401 8.38111C14.271 8.46715 14.3395 8.53484 14.4266 8.56533L15.1709 8.82579C15.443 8.92103 15.443 9.30119 15.1709 9.39644L14.4266 9.65689C14.3395 9.68738 14.271 9.75507 14.2401 9.84112L13.9764 10.5762C13.88 10.845 13.495 10.845 13.3986 10.5762L13.1349 9.84112C13.104 9.75507 13.0355 9.68738 12.9484 9.65689L12.2041 9.39644C11.932 9.30119 11.932 8.92103 12.2041 8.82579L12.9484 8.56533C13.0355 8.53484 13.104 8.46715 13.1349 8.38111L13.3986 7.64605Z" fill="#1B1B1B" />
                        <path d="M16.3074 10.9122C16.3717 10.733 16.6283 10.733 16.6926 10.9122L16.8684 11.4022C16.889 11.4596 16.9347 11.5047 16.9928 11.525L17.4889 11.6987C17.6704 11.7622 17.6704 12.0156 17.4889 12.0791L16.9928 12.2527C16.9347 12.2731 16.889 12.3182 16.8684 12.3756L16.6926 12.8656C16.6283 13.0448 16.3717 13.0448 16.3074 12.8656L16.1316 12.3756C16.111 12.3182 16.0653 12.2731 16.0072 12.2527L15.5111 12.0791C15.3296 12.0156 15.3296 11.7622 15.5111 11.6987L16.0072 11.525C16.0653 11.5047 16.111 11.4596 16.1316 11.4022L16.3074 10.9122Z" fill="#1B1B1B" />
                        <path d="M17.7693 3.29184C17.9089 2.90272 18.4661 2.90272 18.6057 3.29184L19.0842 4.62551C19.1288 4.75006 19.2281 4.84805 19.3542 4.89219L20.7045 5.36475C21.0985 5.50263 21.0985 6.05293 20.7045 6.19081L19.3542 6.66337C19.2281 6.7075 19.1288 6.80549 19.0842 6.93005L18.6057 8.26372C18.4661 8.65284 17.9089 8.65284 17.7693 8.26372L17.2908 6.93005C17.2462 6.80549 17.1469 6.7075 17.0208 6.66337L15.6705 6.19081C15.2765 6.05293 15.2765 5.50263 15.6705 5.36475L17.0208 4.89219C17.1469 4.84805 17.2462 4.75006 17.2908 4.62551L17.7693 3.29184Z" fill="#1B1B1B" />
                        <path d="M3 13.4597C3 17.6241 6.4742 21 10.7598 21C14.0591 21 16.8774 18.9993 18 16.1783C17.1109 16.5841 16.1181 16.8109 15.0709 16.8109C11.2614 16.8109 8.17323 13.8101 8.17323 10.1084C8.17323 8.56025 8.71338 7.13471 9.62054 6C5.87502 6.5355 3 9.67132 3 13.4597Z" stroke="#1B1B1B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h1>Pemesanan</h1>

                </div>

                <label for="nama_customer">Nama</label>
                <input type="text" id="nama_customer" name="nama_customer" placeholder="Nama" />
                <br>
                <label for="no_telp">No Telepon</label>
                <input type="text" id="no_telp" name="no_telp" placeholder="Nomor Telepon Aktif" />
                <br>
                <label for="tanggal_layanan">Jadwal Pembersihan </label>
                <input type="date" id="tanggal_layanan" name="tanggal_layanan" placeholder="tanggal_layanan" />
                <br>
                <label for="alamat_layanan">Alamat </label>
                <input type="text" id="alamat_layanan" name="alamat_layanan" placeholder="Alamat" />
                <br>
                <label class="text-muted" for="alamat_layanan">Lakukan Pembayaran Ke BRI Dengan Total Seperti Dibawah </label>
                <input type="text" id="total_harga" name="total_harga" placeholder="total_harga" value="<?= $detail['harga']; ?>" readonly />
                <label class="text-muted" for="alamat_layanan">No VA 3529 0100 8283 504 </label>
                <br>
                <label for="bukti_pembayaran">Bukti Pembayaran </label>
                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" placeholder="Bukti Pembayaran" required />
                <input type="hidden" id="service_id" name="service_id" placeholder="service_id" value="<?= $detail['service_id']; ?>" readonly />


                <button class="btn" id="submit">Confirm And Pay</button>

            </div>
        </form>
    </div>

</body>

</html>