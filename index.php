<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
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
    <!-- Search Bar -->
    <h1>Data Buku</h1>
            <form action="" method="post" style="margin-bottom: 10px;">
                <table border="1">
                    <tr>
                        <td width=75 align="center">Pencarian</td>
                        <td><input type="text" name="keyword" size="30" maxlength="100" placeholder="Cari nama buku.."></td>
                        <td><input type="submit" name="cari" value="Cari"></td>
                        <td><a href="javascript:history.back()"><button>Reset</button></a></td>
                    </tr>
                </table>
            </form>
    <?php
        $db = dbConnect();
        if ($db->connect_errno == 0) {
            if (isset($_POST["cari"])) {
                $sql = cariDataBuku($_POST["keyword"]);
            }
            else {
                $sql = dataBuku();
            }
            
            $res = $db->query($sql);
            $data = $res->fetch_all(MYSQLI_ASSOC);
    ?>
            <table border="1">
                <tr>
                    <th>ID Buku</th>
                    <th>Kategori</th>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penerbit</th>
                </tr>
    <?php
            foreach ($data as $barisdata) {
    ?>
                <tr>
                    <td><?php echo $barisdata["id_buku"]; ?></td>
                    <td><?php echo $barisdata["kategori"]; ?></td>
                    <td><?php echo $barisdata["nama_buku"]; ?></td>
                    <td style="text-align: right;"><?php echo $barisdata["harga"]; ?></td>
                    <td style="text-align: right;"><?php echo $barisdata["stok"]; ?></td>
                    <td><?php echo $barisdata["nama_penerbit"]; ?></td>
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