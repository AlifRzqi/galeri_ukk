<h1 class="mt-4">Kategori</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data"> <!-- tambahkan enctype -->
                    <?php
                        if(isset($_POST['submit'])) {
                            $kategori = $_POST['kategori'];
                            $target_dir = "ukk_galeri/assets/img/"; // folder untuk menyimpan gambar
                            $target_file = $target_dir . basename($_FILES["foto"]["name"]); // file yang akan disimpan
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                            // Cek apakah file adalah gambar
                            $check = getimagesize($_FILES["foto"]["tmp_name"]);
                            if($check !== false) {
                                echo "File adalah gambar - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            } else {
                                echo "File bukan gambar.";
                                $uploadOk = 0;
                            }

                            // Cek apakah file sudah ada
                            if (file_exists($target_file)) {
                                echo "Maaf, file sudah ada.";
                                $uploadOk = 0;
                            }

                            // Batasi ukuran file
                            if ($_FILES["foto"]["size"] > 500000) { // batas 500KB
                                echo "Maaf, ukuran file terlalu besar.";
                                $uploadOk = 0;
                            }

                            // Hanya izinkan format gambar tertentu
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                                echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
                                $uploadOk = 0;
                            }

                            // Cek apakah $uploadOk diatur ke 0 oleh kesalahan
                            if ($uploadOk == 0) {
                                echo "Maaf, file tidak dapat diupload.";
                            } else {
                                // Jika semua tes lolos, coba upload file
                                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                                    $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori, foto) values ('$kategori', '$target_file')"); // sesuaikan dengan nama kolom pada tabel kategori

                                    if($query) {
                                        echo '<script>alert("Tambah data Berhasil.");</script>';
                                    } else {
                                        echo '<script>alert("Tambah data Gagal.");</script>';
                                    }
                                } else {
                                    echo "Maaf, ada kesalahan saat mengupload file.";
                                }
                            }
                        }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Kategori</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="kategori" required></div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-md-2">Foto</div>
                        <div class="col-md-8"><input type="file" class="form-control" name="foto" required></div>
                     </div>
                     <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                        </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
