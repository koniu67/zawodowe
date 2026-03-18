<?php
$conn = mysqli_connect("localhost", "root", "", "dni_tygodnia");

if (!$conn) {
    die("Błąd połączenia z bazą");
}

$result_kolumny = mysqli_query($conn, "SHOW COLUMNS FROM dni");
$result_dane = mysqli_query($conn, "SELECT * FROM dni LIMIT 1");
$row = mysqli_fetch_assoc($result_dane);

$dane = [];
$poprawne_dni = ["poniedzialek", "wtorek", "sroda", "czwartek", "piatek", "sobota", "niedziela"];

while ($kolumna = mysqli_fetch_assoc($result_kolumny)) {
    $nazwa = $kolumna["Field"];
    if (in_array($nazwa, $poprawne_dni)) {
        $dane[$nazwa] = (int) $row[$nazwa];
    }
}

$suma_glosow = array_sum($dane);
$max = max($dane);
if ($max == 0) {
    $max = 1;
}

header("Content-Type: image/jpeg");

$szerokosc = 900;
$wysokosc = 420;
$img = imagecreate($szerokosc, $wysokosc);

$bialy = imagecolorallocate($img, 255, 255, 255);
$czarny = imagecolorallocate($img, 0, 0, 0);
$szary = imagecolorallocate($img, 220, 220, 220);


imagefill($img, 0, 0, $szary);

imagestring($img, 5, 20, 15, "Glosy na dni tygodnia", $czarny);

imagestring($img, 4, 20, 40, "Wszystkie glosy: " . $suma_glosow, $czarny);

$startY = 90;
$wysokoscPaska = 25;
$odstep = 45;
$startX = 180;
$maxSzerokoscPaska = 600;

$i = 0;
foreach ($dane as $dzien => $glosy) {
    $y1 = $startY + ($i * $odstep);
    $y2 = $y1 + $wysokoscPaska;

    $dlugosc = ($glosy / $max) * $maxSzerokoscPaska;
    $x2 = $startX + $dlugosc;

    imagefilledrectangle($img, $startX, $y1, $x2, $y2, $czarny);
    imagestring($img, 4, 20, $y1 + 8, $dzien, $czarny);
    imagestring($img, 4, $x2 + 10, $y1 + 8, $glosy, $czarny);

    $i++;
}

imagepng($img);

mysqli_close($conn);
?>