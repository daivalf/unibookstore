<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Hapus Data Penerbit</title>
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
                    <h1>Hapus Data Penerbit</h1>
                    <form action="penerbit-hapus.php" method="post" name="frm">
                        <input type="hidden" name="id_penerbit" value="<?php echo $dataPenerbit["id_penerbit"]; ?>">
                        <table border="1">
                            <tr>
                                <td>ID Penerbit</td>
                                <td><?php echo $dataPenerbit["id_penerbit"]; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $dataPenerbit["nama_penerbit"]; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php echo $dataPenerbit["alamat"]; ?></td>
                            </tr>
                            <tr>
                                <td>Kota</td>
                                <td><?php echo $dataPenerbit["kota"]; ?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td><?php echo $dataPenerbit["telepon"]; ?></td>
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
                    echo "Penerbit dengan ID : $id_penerbit tidak ada.";
                }
            }
            else {
                echo "id_penerbit tidak ada.";
            }
        ?>
    </main>
    <footer>
        <h1>UNIBOOKSTORE</h1>
    </footer>
</body>
</html>