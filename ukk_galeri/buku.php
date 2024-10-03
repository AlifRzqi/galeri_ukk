<h1 class="mt-4">Album</h1>

<!-- Menampilkan Album -->
<div class="card">
    <div class="card-body">
        <h5>Daftar Album</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM buku");
                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                            <td>{$row['id_buku']}</td>
                            <td>{$row['judul']}</td>
                            <td>{$row['penulis']}</td>
                            <td>{$row['penerbit']}</td>
                            <td>{$row['tahun_terbit']}</td>
                            <td>{$row['deskripsi']}</td>
                            <td>
                                <a href='?page=edit_buku&id={$row['id_buku']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='?page=delete_buku&id={$row['id_buku']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Form Menambah Album -->
<div class="card mt-4">
    <div class="card-body">
        <h5>Tambah Album Baru</h5>
        <form method="post">
            <?php
            if (isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $deskripsi = $_POST['deskripsi'];

                $query = mysqli_query($koneksi, "INSERT INTO buku (id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES ('$id_kategori', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi')");

                if ($query) {
                    echo '<script>alert("Album berhasil ditambahkan.");</script>';
                } else {
                    echo '<script>alert("Gagal menambahkan album.");</script>';
                }
            }
            ?>
            <div class="row mb-3">
                <div class="col-md-2">Kategori</div>
                <div class="col-md-8">
                    <select name="id_kategori" class="form-control">
                        <?php
                        $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($kategori = mysqli_fetch_array($kat)) {
                            echo "<option value='{$kategori['id_kategori']}'>{$kategori['kategori']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Judul</div>
                <div class="col-md-8"><input type="text" class="form-control" name="judul" required></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Penulis</div>
                <div class="col-md-8"><input type="text" class="form-control" name="penulis" required></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Penerbit</div>
                <div class="col-md-8"><input type="text" class="form-control" name="penerbit" required></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Tahun Terbit</div>
                <div class="col-md-8"><input type="number" class="form-control" name="tahun_terbit" required></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Deskripsi</div>
                <div class="col-md-8">
                    <textarea name="deskripsi" rows="5" class="form-control" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=buku" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
