<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php       
            $ressource = fopen('http://challenge01.root-me.org/web-serveur/ch54/index.php', 'rb');
            echo fread($ressource, filesize('http://challenge01.root-me.org/web-serveur/ch54/index.php'));
        ?>
        <p>Un paragraphe</p>
    </body>
</html>