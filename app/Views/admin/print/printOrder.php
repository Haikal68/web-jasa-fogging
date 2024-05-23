<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" media="all">
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5d6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5d6975;
            border-bottom: 1px solid #5d6975;
            color: #5d6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5d6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #f5f5f5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5d6975;
            border-bottom: 1px solid #c1ced9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5d6975;
        }

        #notices .notice {
            color: #5d6975;
            font-size: 1.2em;
        }

        footer {
            color: #5d6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #c1ced9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <h1>LAPORAN PENJUALAN</h1>
        <div id="company" class="clearfix">
            <div>Foggingkan</div>
            <div>Medan,<br /> 33601, IDN</div>
            <div>(+62) 812 6534 1375</div>
            <div><a href="mailto:company@example.com">foggingkan@gmail.com</a></div>
        </div>
        <div id="project">
            <div><span>EMAIL</span> <a href="mailto:foggingkan@gmail.com">foggingkan@gmail.com</a></div>
            <div><span>Dari Tanggal</span><?= $tglAwal; ?></div>
            <div><span>Sampai Tanggal</span> <?= $tglAkhir; ?></div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">Order ID</th>
                    <th class="desc">Layanan</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Pemesanan</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($orders as $j) : ?>
                    <tr>
                        <td class="service"><?= $j['order_id']; ?></td>
                        <td class="desc"><?= $j['nama_layanan']; ?></td>
                        <td class="unit"><?= $j['nama_customer']; ?></td>
                        <td class="qty"><?= $j['tanggal_pemesanan']; ?></td>
                        <td class="total">Rp <?= number_format($j['total_harga'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="4">SUBTOTAL</td>
                    <td class="total">Rp <?= number_format($pendapatan->total_harga, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">Rp <?= number_format($pendapatan->total_harga, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>