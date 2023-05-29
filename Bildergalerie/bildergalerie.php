<!DOCTYPE html>
<html lang="de-CH">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
// pafad zum Ordner mit den Bildern
$dir = "Bildergalerie/001/thumb";
// alle Dateien im Ordner auslesen
$files = scandir($dir);
// alle Dateien auflisten
foreach ($files as $file) {
    // nur Dateien mit der Endung .jpg anzeigen
    if (substr($file, -4) == ".jpg") {
        echo "<img src='$dir/$file' width='200px' height='200px'>";
    }
}
?>
</body>
</html>