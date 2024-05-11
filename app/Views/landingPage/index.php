<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page - Jasa Fogging</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/landingpage/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />

</head>

<body>
    <!-- Start Landing Page -->
    <div class="landing-page">
        <header>
            <div class="container">
                <a href="#" class="logo">Fogging<b>Kan</b></a>
                <ul class="links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#card1">Workers</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="<?= base_url(); ?>/login" class="text-light">Login</a></li>
                    <?php if (logged_in()) : ?>
                        <li>Halo, <?= user()->username; ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </header>
        <div class="content">
            <div class="container">
                <div class="info">
                    <h1>Solusi Rumah Sehat</h1>
                    <!-- <h4>MaidKu</h4> -->
                    <p>
                        Selamat datang di Layanan Fogging Kami! Hubungi kami
                        hari ini untuk pembersihan rumah profesional yang memanjakan Anda.
                    </p>
                    <button>Cari Sekarang</button>
                </div>
                <div class="image">
                    <img src="<?= base_url(); ?>/assets/landingpage/image/bg5.png" />
                </div>
            </div>
        </div>
    </div>

    <!-- why -->
    <section id="why">
        <h2>Kenapa Harus Foggingkan ?</h2>
        <div class="containers">
            <div class="cards">
                <div class="icons">
                    <img src="<?= base_url(); ?>/assets/landingpage/image/calendar.png" alt="easy to use icon">
                </div>
                <div class="descs">
                    <h3>Fleksibilitas Jadwal</h3>
                    <p>Memberikan fleksibilitas dalam jadwal pembersihan. Hal ini memungkinkan pelanggan untuk menentukan waktu yang paling nyaman bagi mereka.
                    </p>
                </div>
            </div>

            <div class="cards">
                <div class="icon">
                    <img src="<?= base_url(); ?>/assets/landingpage/image/audit.png" alt="data privacy icon">
                </div>
                <div class="descs">
                    <h3>Membersihkan Dengan Teliti</h3>
                    <p>Memastikan seluruh rumah Anda dibersihkan dengan teliti dan memperhatikan detail. Hal ini akan membuat pelanggan merasa puas dengan hasil kerja mereka.
                    </p>
                </div>
            </div>

            <div class="cards">
                <div class="icons">
                    <img src="<?= base_url(); ?>/assets/landingpage/image/trustworthy.png" alt="data privacy icon">
                </div>
                <div class="descs">
                    <h3>Profesionalisme</h3>
                    <p>Memastikan bahwa para worker yang datang kerumah anda memiliki sikap profesional dalam berkomunikasi dengan pelanggan. Mereka harus ramah, sopan, dan menghormati privasi pelanggan.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- end why -->

    <!-- about -->

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="<?= base_url(); ?>/assets/landingpage/image/clip-brainstorm.gif" alt="">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h2>Top <em>Layanan Fogging</em></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>750+</h4>
                                <h6>Rumah Dibersihkan</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>340+</h4>
                                <h6>happy clients</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h4>128+</h4>
                                <h6>awards</h6>
                            </div>
                        </div>
                    </div>
                    <p>Foggingku adalah pilihan utama untuk pelayanan fogging berkualitas tinggi. Dengan pengalaman bertahun-tahun, tim kami terlatih untuk memberikan pembersihan, perawatan khusus, dan layanan tambahan. Kami menghargai privasi pelanggan dan berkomitmen untuk menjaga rumah Anda dengan cinta dan perhatian yang Anda harapkan.</p>
                    <div class="main-green-button"><a href="#">Discover company</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- end about -->

    <!-- serives -->
    <div class="our-service-sass hide-pr show-pr" id="service">
        <div class="container">
            <div class="theme-title-one text-center">
                <h2 class="main-title">Menawarkan Service Yang Mengagumkan</h2>
            </div> <!-- /.theme-title-one -->
            <div class="inner-wrapper">
                <div class="row">
                    <div class="col-lg-4 single-block aos-init aos-animate" data-aos="fade-up">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-web user"></i>
                            <h5 class="title"><a href="#">Fogging untuk Pengendalian Nyamuk</a></h5>
                            <p>Penawaran layanan fogging yang bertujuan untuk mengurangi populasi nyamuk di area tertentu, seperti rumah, kompleks perumahan, area perkantoran, atau area publik lainnya.</p>
                            <a type="button" class="btn btn-primary">Pesan Sekarang</a>
                            <a class="detail-button"><i class="icon-img"><img src="<?= base_url(); ?>/assets/landingpage/image/broom.gif" width="100%"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-4 single-block aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-value icon-s"></i>
                            <h5 class="title"><a href="#">Fogging untuk Pengendalian Serangga</a></h5>
                            <p> Layanan yang tidak hanya bertujuan untuk mengendalikan nyamuk tetapi juga serangga lainnya seperti lalat, kecoa, dan semut. Pada area tertentu bukan hanya di bagian rumah saja</p>
                            <a type="button" class="btn btn-primary">Pesan Sekarang</a>
                            <a href="#" class="detail-button"><i class="icon-img"><img src="<?= base_url(); ?>/assets/landingpage/image/shooting-star.gif" width="100%"></i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                    <div class="col-lg-4 single-block aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-block">
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <span class="snow-dot"></span>
                            <div class="hover-content"></div>
                            <i class="flaticon-login icon-s"></i>
                            <h5 class="title"><a href="#">Fogging untuk Pengendalian Hama</a></h5>
                            <p> Selain serangga, layanan ini juga dapat menargetkan pengendalian hama seperti nyamuk, lalat, kecoa, tikus, dan lainnya yang menjadi masalah di area tertentu.</p>
                            <a type="button" class="btn btn-primary">Pesan Sekarang</a>
                            <a href="#" class="detail-button"><i class="icon-img">
                                    <img src="<?= base_url(); ?>/assets/landingpage/image/motivation.gif" width="100%">
                                </i></a>
                        </div> <!-- /.service-block -->
                    </div> <!-- /.single-block -->
                </div> <!-- /.row -->
            </div> <!-- /.inner-wrapper -->
        </div> <!-- /.container -->
    </div>
    <!-- end servis -->

    <!-- card section -->
    <div class="shell" id="card1">
        <div class="container">
            <h2 class="mb-5">Worker Terbaik</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                            <img src="<?= base_url(); ?>/assets/landingpage/image/babu1.png" alt="Product" class="img-responsive" />
                        </div>
                        <div class="wsk-cp-text">
                            <div class="category">
                                <span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <div class="title-product">
                                <h3>Adrian PP</h3>
                            </div>
                            <div class="description-prod">
                                <p>
                                    Saya adalah seorang yang berkomitmen, bertanggung jawab
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                            <img src="<?= base_url(); ?>/assets/landingpage/image/babu3.jpeg" alt="Product" class="img-responsive" />
                        </div>
                        <div class="wsk-cp-text">
                            <div class="category">
                                <span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <div class="title-product">
                                <h3>Agung Firmansyah</h3>
                            </div>
                            <div class="description-prod">
                                <p>
                                    Saya adalah seorang yang berdedikasi dan berpengalaman dengan tujuan utama membantu Anda dan keluarga Anda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                            <img src="<?= base_url(); ?>/assets/landingpage/image/babu2.png" alt="Product" class="img-responsive" />
                        </div>
                        <div class="wsk-cp-text">
                            <div class="category">
                                <span><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <div class="title-product">
                                <h3>Aldi Kurniawan</h3>
                            </div>
                            <div class="description-prod">
                                <p>
                                    Saya adalah seorang yang berkomitmen untuk memberikan pelayanan terbaik kepada Anda dan keluarga Anda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                            <img src="<?= base_url(); ?>/assets/landingpage/image/babu4.jpeg" alt="Product" class="img-responsive" />
                        </div>
                        <div class="wsk-cp-text">
                            <div class="category">
                                <span></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            </div>
                            <div class="title-product">
                                <h3>Muhammad Ikram</h3>
                            </div>
                            <div class="description-prod">
                                <p>
                                    Saya sudah jadi pembantu sejak lahir,muka saya sangat meyakinkan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end card section -->

    <!-- Contact Section -->
    <section class="contact text-center py-5" id="contact">
        <div class="container">
            <h2 class="mb-5">Hubungi Kami</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nama Anda" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Anda" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-block">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="new_footer_area bg_color" id="footer">
        <div class="new_footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget company_widget wow fadeInLeft" data-wow-delay="0.2s" style="
                  visibility: visible;
                  animation-delay: 0.2s;
                  animation-name: fadeInLeft;
                ">
                            <h3 class="f-title f_600 t_color f_size_18">Get in Touch</h3>
                            <p>Jangan Tunggu Lama,Pesan Layanan Kami Anda Sekarang Juga!</p>
                            <form action="#" class="f_subscribe_two mailchimp" method="post" novalidate="true" _lpchecked="1">
                                <input type="text" name="EMAIL" class="form-control memail" placeholder="Email" />
                                <button class="btn btn_get btn_get_two" type="submit">
                                    Subscribe
                                </button>
                                <p class="mchimp-errmessage" style="display: none"></p>
                                <p class="mchimp-sucmessage" style="display: none"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="
                  visibility: visible;
                  animation-delay: 0.4s;
                  animation-name: fadeInLeft;
                ">
                            <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">Android App</a></li>
                                <li><a href="#">ios App</a></li>
                                <li><a href="#">Desktop</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="
                  visibility: visible;
                  animation-delay: 0.6s;
                  animation-name: fadeInLeft;
                ">
                            <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                            <ul class="list-unstyled f_list">
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Term &amp; conditions</a></li>
                                <li><a href="#">Reporting</a></li>
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Support Policy</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="
                  visibility: visible;
                  animation-delay: 0.8s;
                  animation-name: fadeInLeft;
                ">
                            <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                            <div class="f_social_icon">
                                <a href="#" class="fab fa-facebook"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="https://wa.me/+621265341375" class="fab fa-whatsapp"></a>
                                <a href="#" class="fab fa-instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bg">
                <div class="footer_bg_one"></div>
                <div class="footer_bg_two"></div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-7">
                        <p class="mb-0 f_400">© FoggingKan Inc.. 2023 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 col-sm-5 text-right">
                        <p>
                            Made with <i class="icon_heart"></i> Love
                            <a href="#" target="_blank">Haikal Panjaitan</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>