<?php
include "koneksi.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Galeri Sekolah</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
    body {
        background-color: #98FB98; /* Hijau muda (pale green) */
        color: #FFFFFF; /* Putih untuk teks agar kontras */
    }
    .sb-topnav.navbar {
        background-color: #333333; /* Abu-abu gelap untuk Navbar */
    }
    .sb-sidenav {
        background-color: #000000; /* Hitam untuk Sidebar */
    }
    .sb-sidenav .nav-link {
        color: #FFFFFF; /* Teks warna putih */
        font-weight: bold; /* Teks tebal */
    }
    .sb-sidenav .nav-link:hover {
        background-color: #444444; /* Hover abu-abu sedikit lebih terang */
        color: #FFFFFF; /* Tetap putih saat hover */
    }
    .sb-sidenav-footer {
        background-color: #333333; /* Abu-abu gelap untuk Footer di Sidebar */
        color: #FFFFFF; /* Putih untuk teks */
    }
    footer.py-4.bg-light.mt-auto {
        background-color: #000000; /* Hitam untuk Footer */
        color: #FFFFFF; /* Putih untuk teks di Footer */
    }
    .btn-toggle {
    background-color: #000000; /* Warna biru */
    border: none;
    border-radius: 50px; /* Membuat tombol bulat */
    padding: 10px 10px; /* Padding tombol */
    color: white; /* Warna teks */
    font-size: 16px; /* Ukuran font */
    transition: background-color 0.3s, transform 0.2s; /* Efek transisi */
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-toggle:hover {
    background-color: #F2F2F2; /* Warna saat hover */
    transform: scale(1.1); /* Efek memperbesar */
}

.toggle-icon {
    transition: transform 0.2s;
}

.btn-toggle:focus {
    outline: none; /* Menghilangkan outline saat fokus */
}

</style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark">
             <!-- Sidebar Toggle -->
<button class="btn btn-toggle" id="sidebarToggle"><span class="toggle-icon"><i class="fas fa-bars"></i></span></button>

            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Galeri Sekolah</a>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color: #000000;">Core</div>
                            <a class="nav-link" href="?">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color: #000000;">Navigasi</div>
                            <?php if ($_SESSION['user']['level'] != 'peminjam') { ?>
                                <a class="nav-link" href="?page=kategori">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Kategori
                                </a>
                                <a class="nav-link" href="?page=buku">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                    Album
                                </a>
                            <?php } else { ?>
                                <a class="nav-link" href="?page=peminjaman">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Favorit
                                </a>
                            <?php } ?>
                            <a class="nav-link" href="?page=ulasan">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                Komentar
                            </a>

                            <?php if ($_SESSION['user']['level'] != 'peminjam') { ?>
                                <a class="nav-link" href="?page=laporan">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                    Profile
                                </a>
                            <?php } ?>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['user']['nama']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                            if (file_exists($page . '.php')) {
                                include $page . '.php';
                            } else {
                                include '404.php';
                            }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Galeri Sekolah 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
