<?php

$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';

$email = isset($_POST['email']) ? trim($_POST['email']) : '';

$jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_VALIDATE_INT);

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validasi nama
    if ($nama === '') {
        $errors['nama'] = 'Nama wajib diisi.';
    } elseif (strlen($nama) < 3) {
        $errors['nama'] = 'Nama minimal 3 karakter.';
    }

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid.';
    }

    // Validasi jumlah peserta
    if (
        $jumlah === false ||
        $jumlah === null ||
        $jumlah < 1 ||
        $jumlah > 5
    ) {
        $errors['jumlah'] = 'Jumlah peserta harus 1 sampai 5.';
    }

    // Jika tidak ada error
    if (empty($errors)) {

        header(
            'Location: sukses.php?nama=' . urlencode($nama)
        );

        exit;
    }
}

// Fungsi untuk mengamankan output
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

    <title>Form Pendaftaran</title>

</head>

<body>

<h1>Form Pendaftaran</h1>

<form method="post" action="form.php">

    <!-- Nama -->
    <label>
        Nama:
        <input
            type="text"
            name="nama"
            value="<?php echo e($nama); ?>"
        >
    </label>

    <small>
        <?php
        echo isset($errors['nama'])
            ? e($errors['nama'])
            : '';
        ?>
    </small>

    <br><br>


    <!-- Email -->
    <label>
        Email:
        <input
            type="email"
            name="email"
            value="<?php echo e($email); ?>"
        >
    </label>

    <small>
        <?php
        echo isset($errors['email'])
            ? e($errors['email'])
            : '';
        ?>
    </small>

    <br><br>


    <!-- Jumlah peserta -->
    <label>
        Jumlah peserta:
        <input
            type="number"
            name="jumlah"
            min="1"
            max="5"
            value="<?php
                echo e(
                    isset($_POST['jumlah'])
                    ? $_POST['jumlah']
                    : '1'
                );
            ?>"
        >
    </label>

    <small>
        <?php
        echo isset($errors['jumlah'])
            ? e($errors['jumlah'])
            : '';
        ?>
    </small>

    <br><br>


    <button type="submit">
        Daftar
    </button>

</form>

</body>

</html>