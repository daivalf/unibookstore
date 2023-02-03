<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Penerbit</title>
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
        <h1>Tambah Data Penerbit</h1>
        <form action="penerbit-simpan.php" method="post" name="frm">
            <table border="1">
                <tr>
                    <td>ID Penerbit</td>
                    <td><input type="text" name="id_penerbit" size="50" maxlength="4" required></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama_penerbit" size="50" maxlength="50" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" size="50" maxlength="100" required></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td><input type="text" name="kota" size="50" maxlength="50" required></td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td><input type="text" name="telepon" size="50" maxlength="20" required></td>
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