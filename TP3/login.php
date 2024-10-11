<form id="style_form" action="index.php" method="GET">
    <select name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>
<form id="login_form" action="connected.php" method="POST">
    <table>
        <tr>
            <th>Login :</th>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <th>Mot de passe :</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Se connecter..." /></td>
        </tr>
    </table>
</form>
<?php 
    if (isset($_GET['css'])){
        $_COOKIE["style"] = $_GET['css'];
        setcookie("style", $_GET["css"], time()+3600);
    }
?>
<?php 
    if (isset($_COOKIE["style"])){
        echo("<p>".$_COOKIE["style"]."</p>");
    }
?>