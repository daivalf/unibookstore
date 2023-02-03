<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
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
                    <h1>Edit Data Buku</h1>
                    <form action="buku-update.php" method="post" name="frm">
                        <table border="1">
                            <tr>
                                <td>ID Buku</td>
                                <td><input type="text" name="id_buku" size="50" maxlength="5"
                                    value="<?php echo $dataBuku["id_buku"]; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><input type="text" name="kategori" size="50" maxlength="50"
                                    value="<?php echo $dataBuku["kategori"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Nama Buku</td>
                                <td><input type="text" name="nama_buku" size="50" maxlength="100"
                                    value="<?php echo $dataBuku["nama_buku"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="text" name="harga" size="50" maxlength="11"
                                    value="<?php echo $dataBuku["harga"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><input type="text" name="stok" size="50" maxlength="11"
                                    value="<?php echo $dataBuku["stok"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td>
                                <select name="id_penerbit">
                                    <?php
                                        $dataPenerbit = getListPenerbit();
                                        foreach ($dataPenerbit as $data) {
                                            echo "<option value=\"" . $data["id_penerbit"] . "\"";
                                            if ($data["id_penerbit"] == $dataBuku["id_penerbit"])
                                                echo " selected";
                                            echo ">" . $data["nama_penerbit"] . "</option>";
                                        }
                                    ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Update" name="tblUpdate">
                                    <input type="reset" value="Reset">
                                </td>
                            </tr>
                        </table>
                    </form>
        <?php
                }
            }
        ?>
    </main>
    <footer>
        <h1>UNIBOOKSTORE</h1>
    </footer>
</body>
</html>