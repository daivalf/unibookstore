<!DOCTYPE html>
<html>
<head>
    <title>Update Data Buku</title>
    <link rel="stylesheet" href="style.css">
    <?php include_once("functions.php"); ?>
</head>
<body>
    <header>
        <div class="jumbotron">
            <h1>UNIBOOKSTORE</h1>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="admin.php">Admin</a>
            <a href="pengadaan.php">Pengadaan</a>
        </nav>
    </header>
    <main>
        <?php
            if (isset($_POST["tblUpdate"])) {
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    $id_buku = $db->escape_string($_POST["id_buku"]);
                    $kategori = $db->escape_string($_POST["kategori"]);
                    $nama_buku = $db->escape_string($_POST["nama_buku"]);
                    $harga = $db->escape_string($_POST["harga"]);
                    $stok = $db->escape_string($_POST["stok"]);
                    $id_penerbit = $db->escape_string($_POST["id_penerbit"]);

                    $sql = "UPDATE buku
                            SET kategori='$kategori', nama_buku='$nama_buku',
                                harga='$harga', stok='$stok', id_penerbit='$id_penerbit'
                            WHERE id_buku='$id_buku'";

                    $res = $db->query($sql);
                    if ($res) {
                        if ($db->affected_rows > 0) {
                            ?>
                            <h1>Data berhasil diupdate</h1>
                            <?php
                        }
                        else {
                            ?>
                            <h1>Data berhasil diupdate tanpa ada perubahan</h1>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <h1>Data gagal diupdate</h1>
                        <?php
                    }
                }
                else {
                    echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "");
                }
            }
        ?>
    </main>
    <footer>
        <h1>UNIBOOKSTORE</h1>
    </footer>
</body>
</html>