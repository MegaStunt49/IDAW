<?php
    require_once("init_pdo.php");

    function get_users($db){
        $sql = "SELECT * FROM USERs ORDER BY `users`.`id` ASC";
        $exe = $db->query($sql);
        $res = $exe->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    function setHeaders() {
        // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
        header("Access-Control-Allow-Origin: *");
        header('Content-type: application/json; charset=utf-8');
    }

    // ==============
    // Responses
    // ==============
    $input = json_decode(file_get_contents('php://input'), true);
    switch($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            $result = get_users($pdo);
            setHeaders();
            exit(json_encode($result));
        case 'POST':
            $login = $input['login'];
            $email = $input['email'];
            $requestID = $pdo->query("SELECT * FROM USERs ORDER BY `users`.`id` DESC");
            $data = $requestID->fetch(PDO::FETCH_OBJ);
            $requestPost = $pdo->prepare("INSERT INTO users (id, login, email) VALUES ('".($data->id + 1)."', '".$login."', '".$email."')");
            $requestPost->execute();
            http_response_code(201);
            exit(json_encode(($data->id + 1)));
        case 'PUT':
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $login = $input['login'];
                $email = $input['email'];
                $requestPut = $pdo->prepare("UPDATE users SET login='".$login."', email='".$email."' WHERE id=".$id);
                $requestPut->execute();
                http_response_code(201);
            }
        case 'DELETE':
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $requestDelete = $pdo->prepare("DELETE FROM users WHERE id=".$id);
                $requestDelete->execute();
                http_response_code(201);
            }
        exit(-1);
    }
?>