<?php

$nama = isset($_GET['nama'])
    ? trim($_GET['nama'])
    : 'Peserta';

function e($value)
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Berhasil</title>
</head>

<body>

<h1>Pendaftaran Berhasil</h1>

<p>
    Terima kasih,keyzia
    <?php echo e($nama); ?>.
</p>

<a href="form.php">
    Kembali ke form
</a>

</body>

</html>
