<link rel="stylesheet" href="style.css">

<?php
define("DEVELOPMENT", TRUE);

function dbConnect() {
    $db = new mysqli("localhost", "root", "", "data");
    return $db;
}

function dataBuku() {
    $dataBuku = "SELECT buku.id_buku, buku.kategori, buku.nama_buku,
                buku.harga, buku.stok, penerbit.nama_penerbit
                FROM buku, penerbit
                WHERE buku.id_penerbit = penerbit.id_penerbit
                ORDER BY buku.id_buku";
    return $dataBuku;
}

function dataPenerbit() {
    $dataPenerbit = "SELECT *
                FROM penerbit
                ORDER BY penerbit.id_penerbit";
    return $dataPenerbit;
}

function dataPengadaan() {
    $dataPengadaan = "SELECT buku.nama_buku, penerbit.nama_penerbit, buku.stok
                    FROM buku, penerbit
                    WHERE buku.id_penerbit = penerbit.id_penerbit AND buku.stok < 15
                    ORDER BY buku.stok";
    return $dataPengadaan;
}

function cariDataBuku($keyword) {
    $getDataBuku = "SELECT buku.id_buku, 
            buku.kategori, buku.nama_buku, 
            buku.harga, buku.stok, 
            penerbit.nama_penerbit
            FROM buku, penerbit 
            WHERE buku.id_penerbit = penerbit.id_penerbit and buku.nama_buku LIKE '%$keyword%' ";
    return $getDataBuku;
}

function getDataBuku($id_buku) {
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT buku.id_buku, buku.kategori, buku.nama_buku,
                        buku.harga, buku.stok, penerbit.nama_penerbit, penerbit.id_penerbit
                        FROM buku, penerbit
                        WHERE buku.id_penerbit = penerbit.id_penerbit AND buku.id_buku='$id_buku'");
        if ($res) {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else {
            return FALSE;
        }
    }
    else {
        return FALSE;
    }
}

function getDataPenerbit($id_penerbit) {
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query("SELECT *
                        FROM penerbit
                        WHERE penerbit.id_penerbit = '$id_penerbit'");
        if ($res) {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else {
            return FALSE;
        }
    }
    else {
        return FALSE;
    }
}

function getListPenerbit() {
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        $res = $db->query(dataPenerbit());

        if ($res) {
            $data = $res->fetch_all(MYSQLI_ASSOC);
            $res->free();
            return $data;
        }
        else {
            return FALSE;
        }
    } else {
        return FALSE;
    }
}

?>