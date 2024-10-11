<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3305/3305969.png">
        <title>SitePro</title> <!-- Titre fenêtre et nom du signet -->
        <?php 
            if (!isset($_COOKIE["style"])){
                $_COOKIE["style"] = "style1";
            }
            echo ('<link rel="stylesheet" href="'.$_COOKIE["style"].'.css">'); 
        ?>
    </head>
    <body>