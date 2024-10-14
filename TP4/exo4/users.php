<?php
    require_once('config.php');
    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;
    $connectionString .= ";dbname=" . _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
    $pdo = NULL;
    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }
    if(isset($_POST['id']) && isset($_POST['login']) && isset($_POST['email'])){
        if($_POST['id']=="NULL"){
            $request1 = $pdo->prepare("INSERT INTO `users` (`id`, `login`, `email`) VALUES (NULL, '".$_POST['login']."', '".$_POST['email']."')");
            $request->execute();
        }
        else
        {
            $request1 = $pdo->prepare("UPDATE `users` SET `login` = 'Ri1', `email` = 'fifi@loulou.or1' WHERE `users`.`id` = 1;");
        }
    }
    $request = $pdo->prepare("select * from users");
    // TODO: add your code here
    // retrieve data from database using fetch(PDO::FETCH_OBJ) and
    // display them in HTML array

    $request->execute();
    $data = $request->fetch(PDO::FETCH_OBJ);
    echo '<style>table, th, td {border:1px solid black;}</style><h1>Users</h1><table><tr><th>ID</th><th>Login</th><th>Email</th></tr>';
    while(!empty($data)) {
        echo '<tr><td>'.$data->id.'</td><td>'.$data->login.'</td><td>'.$data->email.'</td></tr>';
        $data = $request->fetch(PDO::FETCH_OBJ);
    }
    echo '</table>';

    /*** close the database connection ***/
    $pdo = null;
?>
<form id="login_form" action="users.php" method="POST">
    <table>
        <hidden name="id" value="NULL">
        <tr>
            <th>Login :</th>
            <td><input type="text" name="login"></td>
        </tr>
        <tr>
            <th>Email :</th>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="Ajouter" /></td>
        </tr>
    </table>
</form>