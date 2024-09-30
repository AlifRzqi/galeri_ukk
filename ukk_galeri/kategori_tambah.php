<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $kategori = $_POST['kategori'];
                        $foto = $_FILES['foto']['name'];
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
                    
                        // Proses upload foto
                        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                            // Simpan data ke database
                            $query = "INSERT INTO kategori (kategori, foto) VALUES ('$kategori', '$foto')";
                            mysqli_query($koneksi, $query);
                            echo "Data berhasil disimpan";
                        } else {
                            echo "Terjadi kesalahan saat mengunggah foto.";
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Kategori</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="kategori"></div>
                     </div>
                     <div class="form-group">
                        <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" required>
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