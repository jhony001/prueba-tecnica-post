<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include_once "../controller/UserController.php";
    include_once "../model/User.php";

    $host     = "localhost";
    $port     = 3306;
    $user     = "root";
    $password = "";
    $db = "prueba_tecnica";

    if(isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["username"])){
        $email  = $_POST["email"];
        $pass = $_POST["pass"];
        $username = $_POST["username"];

        $database = new mysqli($host, $user, $password, $db, $port);
        $query = 'INSERT INTO users (email, username, pass) VALUES("'.$email.'", "'.$username.'","'.$pass.'")';
        try{
            $result = $database->query($query);
            print("Usuario creado correctamente");
        }catch(Exception $e){
            print("Error al crear usuario". e.getMessage());
            return false;
        }
        $database->close();
    }
?>
<body>
    <form action="" method="post">
        <input name="email" type="text">
        <input name="username" type="text">
        <input name="pass" type="password">
        <button type="submit">Crear Cuenta</button>
    </form>
</body>
</html>