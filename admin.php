<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
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
            $sql1 = dataBuku();
            $sql2 = dataPenerbit();
            $res1 = $db->query($sql1);
            $res2 = $db->query($sql2);
            $data1 = $res1->fetch_all(MYSQLI_ASSOC);
            $data2 = $res2->fetch_all(MYSQLI_ASSOC);
    ?>
            <div>
            <h1>Data Buku</h1>
            <div class="tambah-data">
                <a href="buku-tambah.php"><button class="tambah-button">Tambah Data Buku</button></a>
            </div>
            <table border="1">
                <tr>
                    <th>ID Buku</th>
                    <th>Kategori</th>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penerbit</th>
                    <th colspan="2">Aksi</th>
                </tr>
    <?php
            foreach ($data1 as $barisdata1) {
    ?>
                <tr>
                    <td><?php echo $barisdata1["id_buku"]; ?></td>
                    <td><?php echo $barisdata1["kategori"]; ?></td>
                    <td><?php echo $barisdata1["nama_buku"]; ?></td>
                    <td><?php echo $barisdata1["harga"]; ?></td>
                    <td><?php echo $barisdata1["stok"]; ?></td>
                    <td><?php echo $barisdata1["nama_penerbit"]; ?></td>
                    <td>
                        <form action=""></form>
                        <a href="buku-edit.php?id_buku=<?php echo $barisdata1["id_buku"]; ?>">
                            <button>Edit</button>
                        </a>
                    </td>
                    <td>
                        <a href="buku-konfirmasi-hapus.php?id_buku=<?php echo $barisdata1["id_buku"]; ?>">
                            <button>Hapus</button>
                        </a>
                    </td>
                </tr>
    <?php
            }
    ?>
            </table>
            </div>
    <?php
            $res1->free();
    ?>
            <h1>Data Penerbit</h1>
            <div class="tambah-data">
                <a href="penerbit-tambah.php"><button class="tambah-button">Tambah Data Penerbit</button></a>
            </div>
            <table border="1">
                <tr>
                    <th>ID Penerbit</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Telepon</th>
                    <th colspan="2">Aksi</th>
                </tr>
    <?php
            foreach ($data2 as $barisdata2) {
    ?>
                <tr>
                    <td><?php echo $barisdata2["id_penerbit"]; ?></td>
                    <td><?php echo $barisdata2["nama_penerbit"]; ?></td>
                    <td><?php echo $barisdata2["alamat"]; ?></td>
                    <td><?php echo $barisdata2["kota"]; ?></td>
                    <td><?php echo $barisdata2["telepon"]; ?></td>
                    <td>
                        <form action=""></form>
                        <a href="penerbit-edit.php?id_penerbit=<?php echo $barisdata2["id_penerbit"]; ?>">
                            <button>Edit</button>
                        </a>
                    </td>
                    <td>
                        <a href="penerbit-konfirmasi-hapus.php?id_penerbit=<?php echo $barisdata2["id_penerbit"]; ?>">
                            <button>Hapus</button>
                        </a>
                    </td>
                </tr>
    <?php
                }
    ?>
            </table>
    <?php
            $res2->free();
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