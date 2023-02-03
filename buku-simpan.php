<!DOCTYPE html>
<html>
<head>
    <title>Simpan Data Buku</title>
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
            if (isset($_POST["tblSimpan"])) {
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    $id_buku = $db->escape_string($_POST["id_buku"]);
                    $kategori = $db->escape_string($_POST["kategori"]);
                    $nama_buku = $db->escape_string($_POST["nama_buku"]);
                    $harga = $db->escape_string($_POST["harga"]);
                    $stok = $db->escape_string($_POST["stok"]);
                    $id_penerbit = $db->escape_string($_POST["id_penerbit"]);

                    $sql = "INSERT INTO buku(id_buku, kategori, nama_buku,
                            harga, stok, id_penerbit)
                            VALUES ('$id_buku', '$kategori', '$nama_buku',
                            '$harga', '$stok', '$id_penerbit')";

                    $res = $db->query($sql);
                    if ($res) {
                        if ($db->affected_rows > 0) {
                            ?>
                            <h1>Data berhasil Disimpan</h1>
                            <?php
                        }
                        else {
                            ?>
                            <h1>Data gagal disimpan karena tidak lengkap</h1>
                            <div class="tambah-button">
                                <a href="javascript:history.back()"><button>Kembali</button></a>
                            </div>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <h1>Data gagal disimpan</h1>
                        <h1>ID Buku yang dimasukkan sama atau belum memilih Penerbit</h1>
                        <div class="tambah-button">
                            <a href="javascript:history.back()"><button>Kembali</button></a>
                        </div>
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