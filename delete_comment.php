<?php
include "z_db.php";

// Pastikan parameter id komentar dikirim melalui URL
if (isset ($_GET['id'])) {
    $comment_id = $_GET['c_id'];

    // Hapus komentar dari database
    $delete_query = "DELETE FROM comments WHERE c_id = '$comment_id'";

    if (mysqli_query($con, $delete_query)) {
        // Redirect kembali ke halaman detail berita setelah komentar dihapus
        $id = $_GET['id'];
        header("Location: /arcon/newsdetail/$id");
        exit();

    } else {
        // Jika terjadi kesalahan saat menghapus komentar
        echo "Error: " . mysqli_error($con);
    }
} else {
    // Jika tidak ada id komentar yang dikirim, redirect kembali ke halaman beranda
    header("Location: /arcon/home.php");
    exit();
}
?>