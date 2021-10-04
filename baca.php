<?php
include "koneksi.php";
if (isset($_GET['surat'])) {
    $surat = $_GET['surat'];
} else {
    header("location:index.php");
}

$ambildata = $koneksi->query("SELECT * FROM quran_id WHERE surat=$surat");
$ambildata2 = $koneksi->query("SELECT * FROM daftarsurat WHERE id=$surat");
$data2 = $ambildata2->fetch_assoc();
$judul = $data2['surat_indonesia'];
include "header.php";
if (($surat < 1) || ($surat > 114)) {
    header("location:index.php");
}
?>

<?php
error_reporting(false);
session_start();
?>


<?php
// ambil data session

if (isset($_SESSION['s_surat'])) {
    $s_surat = $_SESSION['s_surat'];
}
if (isset($_SESSION['s_arab'])) {
    $s_arab = $_SESSION['s_arab'];
}
if (isset($_SESSION['s_latin'])) {
    $s_latin = $_SESSION['s_latin'];
}
if (isset($_SESSION['s_terjemah'])) {
    $s_latin = $_SESSION['s_terjemah'];
}
// end ambil data session 

// tambahkan array (hasil dari data session tadi) dengan data inputan baru

$s_surat[] = $_GET['surat'];
$s_arab[] = $_GET['arab'];
$s_latin[] = $_GET['latin'];
$s_terjemah[] = $_GET['terjemah'];

// end tambah array

// simpan data array yang baru ke session

$_SESSION['s_surat'] = $s_surat;
$_SESSION['s_arab'] = $s_arab;
$_SESSION['s_latin'] = $s_latin;
$_SESSION['s_terjemah'] = $s_terjemah;

// end

?>

<section class="generic-banner relative">
    <div class="container">
        <div class="row height align-items-center justify-content-center">
            <div class="col-lg-10">
                <div class="generic-banner-content">
                    <h2 class="text-white"><?php echo $data2['surat_indonesia']; ?></h2>
                    <p class="text-white">Luangkan waktu anda untuk membaca <br> jangan menunggu waktu luang.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->


<section class="section-gap">
    <div class="container">
        <form method="get">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="float-left mb-10">PENGATURAN</h4>
                </div>
                <input type="hidden" name="surat" value="<?php echo $surat ?>">
                <div class="col-sm-3 pt-10">
                    <p class="float-left font-weight-bold">QURAN ARAB:</p>
                    <?php if (isset($_GET['arab']) == "aktif") { ?>
                        <label class="primary-switch float-right"><input type="checkbox" name="arab" id="arab" value="aktif" checked><label for="arab"></label></label>
                    <?php } else { ?>
                        <label class="primary-switch float-right"><input type="checkbox" name="arab" id="arab" value="aktif"><label for="arab"></label></label>
                    <?php } ?>
                </div>
                <div class="col-sm-3 pt-10">
                    <p class="float-left font-weight-bold">QURAN LATIN:</p>
                    <?php if (isset($_GET['latin']) == "aktif") { ?>
                        <div class="primary-switch float-right"><input type="checkbox" name="latin" id="latin" value="aktif" checked><label for="latin"></label></div>
                    <?php } else { ?>
                        <div class="primary-switch float-right"><input type="checkbox" name="latin" id="latin" value="aktif"><label for="latin"></label></div>
                    <?php } ?>
                </div>
                <div class="col-sm-3 pt-10">
                    <p class="float-left font-weight-bold">TERJEMAHAN:</p>
                    <?php if (isset($_GET['terjemah']) == "aktif") { ?>
                        <div class="primary-switch float-right"><input type="checkbox" name="terjemah" id="terjemah" value="aktif" checked><label for="terjemah"></label></div>
                    <?php } else { ?>
                        <div class="primary-switch float-right"><input type="checkbox" name="terjemah" id="terjemah" value="aktif"><label for="terjemah"></label></div>
                    <?php } ?>
                </div>
                <div class="col-sm-3">
                    <td><input class="btn btn-primary btn-block" type="submit" name="simpan" value="simpan"></td>
                </div>
            </div>
        </form>
        <?php
        // Buat Pengecualian Untuk Bissmallah
        // Jika nomor surat lebih dari 1 (bukan al-fatihah) dan bukan nomor 9 at-taubah maka tampilkan bissmallah
        if (($surat > 1) && ($surat != 9)) {
            echo '<hr />';
            echo '<p class ="arabic_center">' . mb_strtolower('بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ') . '</p>';
            echo '<hr />';
        } ?>
        <div class="list-group">
            <?php
            $ayat = 1;
            while ($baris = $ambildata->fetch_assoc()) { ?>
                <a href="javascript:void(0)" class="list-group-item mt-2 p-3 list-group-item-action flex-column align-items-start">
                <?php
                $str = mb_strtolower($baris['text_arab']);

                if (isset($_GET['arab']) == "aktif") {
                    echo '<p class="arabic text-black">' . $str . ' ﴿' . format_arabic_number($ayat) . '﴾</p>';
                }

                if (isset($_GET['latin']) == "aktif") {
                    echo '<p class="baca"><i>' . '(' . $ayat . ') ' . $baris['text_baca'] . '</i></p>';
                }

                if (isset($_GET['terjemah']) == "aktif") {
                    echo '<p class="latin">' . '(' . $ayat . ') ' . $baris['text_indo'] . '</p>';
                }
                $ayat++;
            }
                ?>
                </a>
        </div>
    </div>
</section>


<style>
    #myInput {
        border: 1;
        background-image: url('searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
        width: 100%;
    }

    #myInput:focus {
        outline: 3px solid #ddd;
    }


    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        width: 100%;
        max-height: 200px;
        border: 1px solid #ddd;
        z-index: 1;
        overflow-y: scroll;
        overflow-x: hidden;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;

    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
</style>
</head>

<body>
    <section class="section-gap">
        <div class="container">
            <div class="dropdown">
                <button onclick="myFunction()" class="btn btn-primary btn-block btn-large">BACA SURAT YANG LAIN</button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="ketik nama surat.." id="myInput" onkeyup="filterFunction()">

                    <?php

                    $ambildata = $koneksi->query("SELECT * FROM daftarsurat");
                    while ($baris = $ambildata->fetch_assoc()) :
                    ?>
                        <a href="baca.php?surat=<?php echo $baris['id'] ?><?php if (isset($_GET['arab'])) {
                                                                                echo "&arab=aktif";
                                                                            }
                                                                            if (isset($_GET['latin'])) {
                                                                                echo "&latin=aktif";
                                                                            }
                                                                            if (isset($_GET['terjemah'])) {
                                                                                echo "&terjemah=aktif";
                                                                            } ?>&simpan=simpan"><?php echo $baris['surat_indonesia'] ?></a>

                    <?php
                    endwhile;
                    ?>


                </div>
            </div>
        </div>
    </section>

    <script>
        /* ketika tombol di klik tampilkan dropdown */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>

    <ul class="pagination pagination-lg justify-content-center section-gap">
        <?php
        // jika bukan surat ke 1 maka jangan tampilkan surat sebelumnya
        if ($_GET['surat'] != 1) { ?>
            <li class="page-item"><a class="page-link" href="baca.php?surat=<?php echo $surat - 1 ?><?php
                                                                                                    if (isset($_GET['arab'])) {
                                                                                                        echo "&arab=aktif";
                                                                                                    }
                                                                                                    if (isset($_GET['latin'])) {
                                                                                                        echo "&latin=aktif";
                                                                                                    }
                                                                                                    if (isset($_GET['terjemah'])) {
                                                                                                        echo "&terjemah=aktif";
                                                                                                    }

                                                                                                    ?>&simpan=simpan">SURAT SEBELUMNYA</a></li>
        <?php } ?>
        <?php
        // jika bukan surat ke 144 maka jangan tampilkan surat selanjutnya
        if ($_GET['surat'] != 114) { ?>
            <li class="page-item"><a class="page-link" href="baca.php?surat=<?php echo $surat + 1 ?><?php if (isset($_GET['arab'])) {
                                                                                                        echo "&arab=aktif";
                                                                                                    }
                                                                                                    if (isset($_GET['latin'])) {
                                                                                                        echo "&latin=aktif";
                                                                                                    }
                                                                                                    if (isset($_GET['terjemah'])) {
                                                                                                        echo "&terjemah=aktif";
                                                                                                    } ?>&simpan=simpan">SURAT SELANJUTNYA</a></li>
        <?php } ?>

    </ul>

    <?php

    function format_arabic_number($number)
    {
        $arabic_number = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $jum_karakter = strlen($number);
        $temp = "";
        for ($i = 0; $i < $jum_karakter; $i++) {
            $char = substr($number, $i, 1);
            $temp .= $arabic_number[$char];
        }
        return '<span class="arabic_number">' . $temp . '</span>';
    }
    ?>
    <?php include "footer.php"; ?>