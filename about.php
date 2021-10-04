<?php
$judul = "Al Quran";
include "koneksi.php";
include "header.php";
?>

<section class="generic-banner relative">
    <div class="container">
        <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="generic-banner-content">
                    <h2 class="text-white">HUBUNGI KAMI</h2>
                    <p class="text-white"> Terimakasih telah berkujung, website ini masih dalam pengembangan, jika anda menemukan kekeliruan, mohon hubungi kami segera.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- About Generic Start -->
<div class="main-wrapper">
    <!-- Start Generic Area -->
    <section class="about-generic-area section-gap">
        <div class="container border-top-generic">


            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-5 ">
                    <h3>Rencana Penambahan Fitur:</h3>
                    <ul class="unordered-list">
                        <li>Penambahan Fitur Diskusi Perayat</li>
                        <li>Penambahan Fitur Kata-Perkata</li>
                        <li>Penambahan tafsir dari berbagai macam mufasir</li>
                        <li>Menu Baca Hadist</li>
                        <li>DLL Do'a kan saja sempat.</li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
            </div>

            <!-- start contact Area -->
            <section class="contact-area section-gap" id="contact">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-30 col-lg-8">
                            <div class="title text-center">




                                <h1 class="mb-10">Jangan ragu menghubungi kami</h1>
                                <p>Kebaikan selalu ada</p>

                            </div>
                        </div>
                    </div>
                    <form class="form-area mt-60" id="myForm" action="mail.php" method="post" class="contact-form text-right">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input name="name" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" class="common-input mb-20 form-control" required="" type="text">

                                <input name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="common-input mb-20 form-control" required="" type="email">

                                <input name="subject" placeholder="Judul" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Judul'" class="common-input mb-20 form-control" required="" type="text">
                            </div>
                            <div class="col-lg-6 form-group">
                                <textarea class="common-textarea mt-10 form-control" name="message" placeholder="Masukan isi pesan anda disini" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan isi pesan anda disini'" required=""></textarea>
                                <button class="primary-btn mt-20">Send Message<span class="lnr lnr-arrow-right"></span></button>
                                <div class="mt-10 alert-msg">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
            <!-- end contact Area -->





        </div>
    </section>
    <!-- End Generic Start -->

    <?php include "footer.php"; ?>