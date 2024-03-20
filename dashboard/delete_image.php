<?php
// Simpan file ini sebagai delete_image.php di direktori Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    $filepath = 'uploads/news/' . $filename;

    // Hapus file gambar jika ada
    if (file_exists($filepath)) {
        if (unlink($filepath)) {
            echo "File " . $filename . " berhasil dihapus.";
        } else {
            echo "Gagal menghapus file " . $filename . ".";
        }
    } else {
        echo "File " . $filename . " tidak ditemukan.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>