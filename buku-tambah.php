<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Buku</title>
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
        <h1>Tambah Data Buku</h1>
        <form action="buku-simpan.php" method="post" name="frm">
            <table border="1">
                <tr>
                    <td>ID Buku</td>
                    <td><input type="text" name="id_buku" size="50" maxlength="5" required></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><input type="text" name="kategori" size="50" maxlength="50" required></td>
                </tr>
                <tr>
                    <td>Nama Buku</td>
                    <td><input type="text" name="nama_buku" size="50" maxlength="100" required></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" size="50" maxlength="11" required></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok" size="50" maxlength="11" required></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td>
                        <select name="id_penerbit">
                            <option>Pilih Penerbit</option>
                            <?php
                                $dataPenerbit = getListPenerbit();
                                foreach ($dataPenerbit as $data) {
                                    echo "<option value=\"" . $data["id_penerbit"] . "\">" . $data["nama_penerbit"] . "</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Simpan" name="tblSimpan">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    </main>
    <footer>
        <h1>UNIBOOKSTORE</h1>
    </footer>
</body>
</html>