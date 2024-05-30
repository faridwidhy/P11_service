<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <?php
        include "koneksi.php";

        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $judul_buku = input($_POST['judul_buku']);
            $jumlah = input($_POST['jumlah']);
            $harga = input($_POST['harga']);

            $sql = "INSERT INTO stok_buku (judul_buku, jumlah, harga) VALUES ('$judul_buku', '$jumlah', '$harga')";

            $hasil = mysqli_query($koneksi, $sql);

            if ($hasil) {
                header("Location: index.php");
            } else {
                echo "<div class='alert alert-danger'>Data Gagal Disimpan</div>";
            }
        }
        ?>

        <h2>Input Data Buku</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="form-group mb-3">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" placeholder="Masukan Judul Buku" required>
            </div>

            <div class="form-group mb-3">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Masukan Jumlah Buku" required>
            </div>

            <div class="form-group mb-3">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Masukan Harga Buku" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>