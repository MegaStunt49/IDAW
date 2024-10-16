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
            $request1 = $pdo->prepare("INSERT INTO users (id, login, email) VALUES (NULL, '".$_POST['login']."', '".$_POST['email']."')");
            $request1->execute();
        }
        else
        {
            $request1 = $pdo->prepare("UPDATE users SET login = '".$_POST['login']."', email = '".$_POST['email']."' WHERE users.id = ".$_POST['id'].";");
            $request1->execute();
        }
    }
    if(isset($_POST['id_del'])){
        $request2 = $pdo->prepare("DELETE FROM users WHERE users.id = ".$_POST['id_del']);
        $request2->execute();
    }
    $request = $pdo->prepare("select * from users ORDER BY `users`.`id` ASC");
    // TODO: add your code here
    // retrieve data from database using fetch(PDO::FETCH_OBJ) and
    // display them in HTML array

    $request->execute();
    $data = $request->fetch(PDO::FETCH_OBJ);
    echo '<style>table, th, td {border:1px solid black;}</style><h1>Users</h1><table><tr><th>ID</th><th>Login</th><th>Email</th><th>modification</th></tr>';
    while(!empty($data)) {
        echo '<tr><td>'.$data->id.'</td><td>'.$data->login.'</td><td>'.$data->email.'</td><td><form id="modif_form'.$data->id.'" action="users.php" method="POST"><input type="hidden" name="id_modif" value="'.$data->id.'"><input type="submit" value="modifier" /></form><form id="del_form'.$data->id.'" action="users.php" method="POST"><input type="hidden" name="id_del" value="'.$data->id.'"><input type="submit" value="supprimer" /></form></td></tr>';
        $data = $request->fetch(PDO::FETCH_OBJ);
    }
    echo '</table><br>';

    if(isset($_POST['id_modif'])){
        $request3 = $pdo->prepare("SELECT * FROM users WHERE users.id = ".$_POST['id_modif']);
        $request3->execute();
        $data3 = $request3->fetch(PDO::FETCH_OBJ);
        echo '<h2>Modifications</h2><form id="login_form" action="users.php" method="POST">
                <table>
                    <input type="hidden" name="id" value="'.$_POST['id_modif'].'">
                    <tr>
                        <th>Login :</th>
                        <td><input type="text" name="login" value="'.$data3->login.'"></td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td><input type="text" name="email" value="'.$data3->email.'"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" value="Ajouter" /></td>
                    </tr>
                </table>
            </form><form id="cancel" action="users.php"><input type="submit" value="Annuler" /></form>';
        $pdo = null;
        exit;
    }

    /*** close the database connection ***/
    $pdo = null;
?>
<form id="login_form" action="users.php" method="POST">
    <table>
        <input type="hidden" name="id" value="NULL">
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