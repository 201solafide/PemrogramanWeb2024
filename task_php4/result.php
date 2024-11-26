<?php if (!empty($data['fileContent'])): ?>
    <?php foreach ($data['fileContent'] as $index => $line): ?>
    <tr>
        <td><?= $index + 1; ?></td>
        <td><?= htmlspecialchars($line); ?></td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="2">File kosong atau tidak valid.</td>
    </tr>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table{ 
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; 
        }
        th, td{
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left; 
        }
    </style>
</head>
<body>
    <h2>Hasil Pendaftaran</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($data['name']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']); ?></td>
        </tr>
        <tr>
            <th>NIM</th>
            <td><?= htmlspecialchars($data['nim']); ?></td>
        </tr>
        <tr>
            <th>IPK</th>
            <td><?= htmlspecialchars($data['ipk']); ?></td>
        </tr>
        <tr>
            <th>Browser</th>
            <td><?= htmlspecialchars($data['browser']); ?></td>
        </tr>
    </table>

    <h3>Isi File yang Diupload</h3>
    <table>
        <tr>
            <th>Baris</th>
            <th>Isi</th>
        </tr>
        <?php foreach ($data['fileContent'] as $index => $line): ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= htmlspecialchars($line); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
