<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $nim = $_POST['nim'];
        $ipk = $_POST['ipk'];

        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            die("Terjadi kesalahan saat mengunggah file. Pastikan Anda telah memilih file yang benar.");
        }

        $file = $_FILES['file'];

        // Validasi file
        if ($file['type'] !== 'text/plain' || $file['size'] > 1024 * 1024) {
            die("File harus berupa txt dan ukurannya di bawah 1MB.");
        }

        // Validasi nama, email, NIM, dan IPK
        if (strlen($name) < 3 || !filter_var($email, FILTER_VALIDATE_EMAIL) || $nim < 1 || $nim > 100000000) {
            die("Validasi gagal, silakan kembali dan perbaiki data Anda.");
        }

        if ($ipk < 1.0 || $ipk > 4.0) {
            die("IPK harus di antara 1.0 sampai 4.0.");
        }

        $fileContent = file($file['tmp_name']);
        $data = [
            'name' => $name,
            'email' => $email,
            'nim' => $nim,
            'ipk' => $ipk,
            'fileContent' => $fileContent,
            'browser' => $_SERVER['HTTP_USER_AGENT']
        ];

        // Simpan data ke sesi
        session_start();
        $_SESSION['data'] = $data;

        // Redirect ke result.php
        header("Location: result.php");
        exit();
    }

?>