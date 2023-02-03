<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Hapus Data Buku</title>
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
            if (isset($_GET["id_buku"])) {
                $db = dbConnect();
                $id_buku = $db->escape_string($_GET["id_buku"]);
                if ($dataBuku = getDataBuku($id_buku)) {
        ?>
                    <h1>Hapus Data Buku</h1>
                    <form action="buku-hapus.php" method="post" name="frm">
                    <input type="hidden" name="id_buku" value="<?php echo $dataBuku["id_buku"]; ?>">
                        <table border="1">
                            <tr>
                                <td>ID Buku</td>
                                <td><?php echo $dataBuku["id_buku"]; ?></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><?php echo $dataBuku["kategori"]; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Buku</td>
                                <td><?php echo $dataBuku["nama_buku"]; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?php echo $dataBuku["harga"]; ?></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><?php echo $dataBuku["stok"]; ?></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td><?php echo $dataBuku["nama_penerbit"]; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Hapus" name="tblHapus">
                                </td>
                            </tr>
                        </table>
                    </form>
        <?php
                }
                else {
                    echo "Buku dengan ID : $id_buku tidak ada.";
                }
            }
            else {
                echo "id_buku tidak ada.";
            }
        ?>
    </main>
    <footer>
        <h1>UNIBOOKSTORE</h1>
    </footer>
</body>
</html>