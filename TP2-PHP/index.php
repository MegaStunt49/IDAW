<!DOCTYPE html>
<html>
    <head>
        <title>TP2-PHP</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="firstStyle.css">
    </head>
    
    <body>
        <h1>Heure</h1>
        <?php       
            date_default_timezone_set('Europe/Paris');
            echo date('H:i:s'). '<br>';
        ?>
    </body>
</html>