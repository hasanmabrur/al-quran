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
                    <h2 class="text-white">DAFTAR SURAT</h2>
                    <p class="text-white">Luangkan waktu anda untuk membaca <br> jangan menunggu waktu luang.</p>
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
                <div class="col-sm-6">
                    <?php

                    $ambildata = $koneksi->query("SELECT * FROM daftarsurat LIMIT 0, 57;");
                    while ($baris = $ambildata->fetch_assoc()) :
                    ?>
                        <a href="baca.php?surat=<?php echo $baris['id'] ?>&arab=aktif&latin=aktif&terjemah=aktif&simpan=simpan" class="list-group-item mt-2 list-group-item-action align-items-start">
                            <p class="float-left float-center list-group-item-heading"><?php echo $baris['id'] ?></p>
                            <h3 class="ml-3 float-left list-group-item-heading"><?php echo $baris['surat_indonesia'] . " (" . $baris['jumlah_ayat'] . ")" ?></h3>
                            <h4 class="arabic float-right list-group-item-heading"><?php echo $baris['surat_arab'] ?></h4>
                            <p class="latin pl-4 pt-5 float-buttom text-right list-group-item-text"><?php echo $baris['arti'] ?></p>
                        </a>

                    <?php
                    endwhile;
                    ?>
                </div>
                <div class="col-sm-6">

                    <?php

                    $ambildata = $koneksi->query("SELECT * FROM daftarsurat LIMIT 57, 114;");
                    while ($baris = $ambildata->fetch_assoc()) :
                    ?>
                        <a href="baca.php?surat=<?php echo $baris['id'] ?>&arab=aktif&latin=aktif&terjemah=aktif&simpan=simpan" class="list-group-item mt-2 list-group-item-action flex-column align-items-start">
                            <p class="float-left float-center list-group-item-heading"><?php echo $baris['id'] ?></p>
                            <h3 class="ml-3 float-left list-group-item-heading"><?php echo $baris['surat_indonesia'] . " (" . $baris['jumlah_ayat'] . ")" ?></h3>
                            <h4 class="arabic float-right list-group-item-heading"><?php echo $baris['surat_arab'] ?></h4>
                            <p class="latin pl-4 pt-5 float-buttom text-right list-group-item-text"><?php echo $baris['arti'] ?></p>
                        </a>

                    <?php
                    endwhile;
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Generic Start -->

    <?php include ("footer.php"); ?>