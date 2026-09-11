<?php

$kataKunci = isset($_GET['q']) ? trim($_GET['q']) : '';

$kategori = isset($_GET['kategori'])
    ? $_GET['kategori']
    : 'semua';

$kategoriValid = array(
    'semua',
    'minuman',
    'makanan',
    'alat-tulis'
);

if (!in_array($kategori, $kategoriValid, true)) {
    $kategori = 'semua';
}

function e($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pencarian Produk</title>
</head>

<body>

<h1>Pencarian Produk</h1>

<form method="get" action="get.php">

    <label>
        Kata kunci:
        <input
            type="text"
            name="q"
            value="<?php echo e($kataKunci); ?>"
        >
    </label>

    <br><br>

    <label>
        Kategori:

        <select name="kategori">

            <?php foreach ($kategoriValid as $item) { ?>

                <option
                    value="<?php echo e($item); ?>"
                    <?php
                    if ($kategori === $item) {
                        echo 'selected';
                    }
                    ?>
                >
                    <?php
                    echo e(
                        ucwords(
                            str_replace('-', ' ', $item)
                        )
                    );
                    ?>
                </option>

            <?php } ?>

        </select>

    </label>

    <br><br>

    <button type="submit">Cari</button>

</form>

<?php if ($kataKunci !== 'teh, kopi, soda, susu') { ?>

    <p>
        Mencari:
        <strong><?php echo e($kataKunci); ?></strong>
    </p>

<?php } ?>

</body>

</html>