<?php
// Oder auslesen von Pfad und in Array speichern
$dir = "img/Hintergrund";
?>
<!DOCTYPE html>
<html lang="de-CH">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--METATAGS-->
    <!-- <link rel="stylesheet" href="css/index.css" /> -->
    <style>
        @import url('https://fonts.cdnfonts.com/css/open-sans-condensed-2?styles=80716');
        @import url('css/grid.css');
        @import url('css/master.css');
        @import url('css/normalize.css');
        @import url('css/farben.css');
        @import url('css/navigationbar.css');
    </style>
    <body>
    <table>
        <tr>
        <td width="250px">
            <h1>Galerie</h1>
            <?php
            $files = scandir($dir);
            // anzeigen der Ordner
            echo '
            <ul>';
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    echo '
                <li>
                    <a href="Galerie.php?odner='.$file.'">'.$file.'</a>
                </li>
            ';
                }
            }
            echo '
            </ul>';
            ?>
        </td>
        <td>
            <?php
            // Bilder anzeigen
            if (isset($_GET['odner'])) {
                $dir = $dir.$_GET['odner']."/";
                // Falls der Ordner nicht existiert
                if (!file_exists($dir)) {
                    echo '<h1>Ordner nicht gefunden</h1>';
                    exit();
                }
                $files = scandir($dir);
                // Titel Der Galerie (Ordnername)
                echo '<h1> '.$_GET['odner'].'</h1>';
                // jedes Bild in ein DIV packen
                echo '<div class="gallery grid">';
                foreach ($files as $file) {
                    if ($file != "." && $file != "..") {
                        echo "<img class='s12 m4 l3 gallery-image' src='$dir/$file' >";
                    }
                }
                echo '</div>';
            }
            ?>
        </td>
        </tr>
    </table>

    <div class="overlay">dfsgafdg</div>
    
    <style>
        td{
            vertical-align: top;
        }
        .gallery{
            padding: 5px;
            float: left;
        }

        .gallery-image {
            padding: 5px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }
        .gallery-image:hover {
            cursor: pointer;
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
        }
        .overlay img {
            max-width: 90%;
            max-height: 90%;
        }

        .overlay.active {
            display: flex;
        }

    </style>
    
    <script>
        const galleryImages = document.querySelectorAll('.gallery-image');
        const overlay = document.createElement('div');
        overlay.classList.add('overlay');

        galleryImages.forEach(function(image) {
            image.addEventListener('click', function() {
                const imageSrc = this.getAttribute('src');
                const largeImage = document.createElement('img');
                largeImage.setAttribute('src', imageSrc);
                overlay.appendChild(largeImage);
                document.body.appendChild(overlay);
                overlay.classList.add('active');
            });
        });

        overlay.addEventListener('click', function() {
            overlay.classList.remove('active');
            overlay.innerHTML = '';
            document.body.removeChild(overlay);            
        });
    </script>
</body>
</html>