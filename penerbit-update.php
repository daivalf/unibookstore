<!DOCTYPE html>
<html>
<head>
    <title>Update Data Penerbit</title>
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
                    $id_penerbit = $db->escape_string($_POST["id_penerbit"]);
                    $nama_penerbit = $db->escape_string($_POST["nama_penerbit"]);
                    $alamat = $db->escape_string($_POST["alamat"]);
                    $kota = $db->escape_string($_POST["kota"]);
                    $telepon = $db->escape_string($_POST["telepon"]);

                    $sql = "UPDATE penerbit
                            SET nama_penerbit='$nama_penerbit', alamat='$alamat',
                                kota='$kota', telepon='$telepon'
                            WHERE id_penerbit='$id_penerbit'";

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