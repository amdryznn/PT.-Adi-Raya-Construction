<?php
// Simpan file ini sebagai upload_gambar.php di direktori Anda

// Lokasi tempat menyimpan gambar yang diunggah
$uploadDirectory = 'uploads/news';

// Pastikan file yang diunggah adalah gambar
$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];

    // Periksa ekstensi file
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        echo 'Invalid file extension.';
        exit;
    }

    // Pindahkan file ke direktori yang ditentukan
    $destination = $uploadDirectory . '/' . $fileName;
    move_uploaded_file($fileTmp, $destination);

    // Keluarkan URL gambar yang diunggah untuk digunakan oleh Summernote
    echo $destination;
} else {
    echo 'Error uploading file.';
}
?>