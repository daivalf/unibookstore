<!DOCTYPE html>
<html>
<head>
    <title>Pengadaan</title>
    <link rel="stylesheet" href="style.css">
    <?php include_once("functions.php"); ?>
</head>
<body>
    <!-- Navbar Home Admin Pengadaan -->
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
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            $sql = dataPengadaan();
            $res = $db->query($sql);
            $data = $res->fetch_all(MYSQLI_ASSOC);
    ?>
            <h1>Data Pengadaan Buku</h1>
            <table border="1">
                <tr>
                    <th>Judul Buku</th>
                    <th>Nama Penerbit</th>
                    <th>Sisa Stok</th>
                </tr>
    <?php
            foreach ($data as $barisdata) {
    ?>
                <tr>
                    <td><?php echo $barisdata["nama_buku"]; ?></td>
                    <td><?php echo $barisdata["nama_penerbit"]; ?></td>
                    <td style="text-align: right;"><?php echo $barisdata["stok"]; ?></td>
                </tr>
    <?php
            }
    ?>
            </table>
    <?php
                $res->free();
        }
        else {
            echo "Gagal Koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
        }
    ?>
    </main>
    <footer>
        <h1>UNIBOOKSTORE</h1>
    </footer>
</body>
</html>