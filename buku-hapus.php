<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Buku</title>
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
            if (isset($_POST["tblHapus"])) {
                $db = dbConnect();
                if ($db->connect_errno == 0) {
                    $id_buku = $db->escape_string($_POST["id_buku"]);

                    $sql = "DELETE FROM buku
                            WHERE id_buku='$id_buku'";

                    $res = $db->query($sql);
                    if ($res) {
                        if ($db->affected_rows > 0) {
                            ?>
                            <h1>Data berhasil dihapus</h1>
                            <?php
                        }
                        else {
                            ?>
                            <h1>Penghapusan gagal karena data tidak ada</h1>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <h1>Data gagal dihapus</h1>
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