<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Penerbit</title>
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
            if (isset($_GET["id_penerbit"])) {
                $db = dbConnect();
                $id_penerbit = $db->escape_string($_GET["id_penerbit"]);
                if ($dataPenerbit = getDataPenerbit($id_penerbit)) {
        ?>
                    <h1>Edit Data Penerbit</h1>
                    <form action="penerbit-update.php" method="post" name="frm">
                        <table border="1">
                            <tr>
                                <td>ID Penerbit</td>
                                <td><input type="text" name="id_penerbit" size="50" maxlength="4"
                                    value="<?php echo $dataPenerbit["id_penerbit"]; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" name="nama_penerbit" size="50" maxlength="50"
                                    value="<?php echo $dataPenerbit["nama_penerbit"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><input type="text" name="alamat" size="50" maxlength="100"
                                    value="<?php echo $dataPenerbit["alamat"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Kota</td>
                                <td><input type="text" name="kota" size="50" maxlength="50"
                                    value="<?php echo $dataPenerbit["kota"]; ?>" required></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td><input type="text" name="telepon" size="50" maxlength="20"
                                    value="<?php echo $dataPenerbit["telepon"]; ?>" required></td>
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