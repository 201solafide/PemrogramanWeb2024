<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: left;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label{
            display: block;
            margin-top: 10px;
        }
        input, select{
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }
        button{
            padding: 10px;
            margin-top: 5px;
            width: 100px;
        }
        .error{
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<form name="registrationForm" action="process.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <h2>Form Pendaftaran Asisten Praktikum</h2>
        <label for="name">Nama</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="nim">NIM</label>
        <input type="number" name="nim" id="nim" required>

        <label for="ipk">IPK</label>
        <input type="number" name="ipk" id="ipk" required>

        <label for="file">Upload KHS</label>
        <input type="file" name="file" id="file" accept=".txt" required>

        <button type="submit">Daftar</button>
    </form>

    <script>
        function validateForm() {
            const name = document.forms["registrationForm"]["name"].value;
            const email = document.forms["registrationForm"]["email"].value;
            const nim = document.forms["registrationForm"]["nim"].value;
            const ipk = document.forms["registrationForm"]["ipk"].value;
            const file = document.forms["registrationForm"]["file"].files[0];
            const fileTypes = ['text/plain'];

            if (name.length < 3) {
                alert("Nama harus lebih dari 3 karakter.");
                return false;
            }

            if (!email.includes("@") || email.length < 5) {
                alert("Masukkan email yang valid.");
                return false;
            }

            if (isNaN(ipk) || ipk < 1.0 || ipk > 4.0) {
                alert("IPK harus angka antara 1.0 dan 4.0");
                return false;
            }

            if (!file || !fileTypes.includes(file.type) || file.size > 1024 * 1024) {
                alert("File harus berupa teks dan ukurannya di bawah 1MB.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>