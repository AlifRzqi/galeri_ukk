<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* Prevents scrollbars if the background is too large */
        }

        .background-container {
            position: fixed; /* Fixes the background to the viewport */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('latarbelakang.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(8px); /* Applies the blur effect */
            z-index: -1; /* Sends the background behind the content */
        }

        .content {
            position: relative; /* Ensures content is layered above the background */
            padding: 20px;
            color: #333; /* Adjust text color for readability on soft background */
        }

        .card {
            border: none; /* Remove default border */
            border-radius: 8px; /* Rounded corners for cards */
        }

        .bg-sky-blue {
            background-color: #AFCBFF !important; /* Soft blue */
        }

        .bg-turquoise-green {
            background-color: #B5EAD7 !important; /* Soft green */
        }

        .bg-pink {
            background-color: #FFCCF9 !important; /* Soft pink */
        }

        .bg-light-gray {
            background-color: #F2F2F2 !important; /* Soft gray */
            color: #333; /* Ensure text is readable on light background */
        }
        
        footer {
            background-color: #343a40; /* Dark gray color */
        }

        .footer-text {
            color: #adb5bd; /* Lighter gray for text to contrast with dark background */
        }
        /* Additional styling for your page */
    </style>
</head>
<body>
    <div class="background-container"></div>
    <div class="content">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-sky-blue text-dark mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori"));
                        ?>
                        Total Kategori
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-turquoise-green text-dark mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku"));
                        ?>
                        Total Buku
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-pink text-dark mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan"));
                        ?>
                        Total Ulasan
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-gray text-dark mb-4">
                    <div class="card-body">
                        <?php
                            echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
                        ?>
                        Total User
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">View Details</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td width="200">Nama</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Level User</td>
                        <td width="1">:</td>
                        <td><?php echo $_SESSION['user']['level']; ?></td>
                    </tr>
                    <tr>
                        <td width="200">Tanggal Login</td>
                        <td width="1">:</td>
                        <td><?php echo date('d-m-Y'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
