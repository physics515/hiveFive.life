<?php
        ini_set('display_errors', 1);
        include '../libs/parsedown.php';
        $Parsedown = new Parsedown();
?>
<!doctype HTML>
<html>
        <head>
                <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
                <center>
                        <div id="manifest-content">
                                <?php
                                        $content = file_get_contents("manifest.md");
                                        echo $Parsedown->text($content);
                                ?>
                        </div>
                </center>
        </body>
</html>
