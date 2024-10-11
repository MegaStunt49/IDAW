<?php 
    if (isset($_GET['css'])){
        $_COOKIE["style"] = $_GET['css'];
        setcookie("style", $_GET["css"], time()+3600);
    }
?>
<form id="style_form" action="index.php" method="GET">
    <select name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>
<?php 
    if (isset($_COOKIE["style"])){
        echo("<p>".$_COOKIE["style"]."</p>");
    }
?>