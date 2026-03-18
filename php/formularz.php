<?php
$conn = mysqli_connect("localhost", "root", "", "dni_tygodnia");

if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

if (isset($_POST["dzien"])) {

    $wybrany_dzien = $_POST["dzien"];

    $dozwolone_kolumny = [];

    $result_kolumny = mysqli_query($conn, "SHOW COLUMNS FROM dni");

    while ($kolumna = mysqli_fetch_assoc($result_kolumny)) {
        $dozwolone_kolumny[] = $kolumna["Field"];
    }

    if (in_array($wybrany_dzien, $dozwolone_kolumny)) {
        $sql_update = "UPDATE dni SET `$wybrany_dzien` = `$wybrany_dzien` + 1";
        mysqli_query($conn, $sql_update);
        header("Location: formularz.php");
        exit();
    }

}

$result_kolumny = mysqli_query($conn, "SHOW COLUMNS FROM dni");
$result_dane = mysqli_query($conn, "SELECT * FROM dni LIMIT 1");
$row = mysqli_fetch_assoc($result_dane);

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Formularz</title>
</head>

<body>
    <h2>Jaki jest twoj ulubiony dzień tygodnia?</h2>
    <form method="post" action="">
        <?php while ($kolumna = mysqli_fetch_assoc($result_kolumny)) { ?>
        <?php $nazwa = $kolumna["Field"]; ?>
        <label>
            <input type="radio" name="dzien" value="<?php echo $nazwa; ?>" required>
            <?php echo ucfirst($nazwa); ?>
        </label>
        <br>
        <?php } ?>

        <br>
        <button type="submit">Prześlij</button>
    </form>


    <img src="wykres.php" alt="Wykres">
</body>


</html>

<?php
mysqli_close($conn);
?>