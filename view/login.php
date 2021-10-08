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
    if(isset($_POST["email"]) && isset($_POST["pass"])){
        $userController = new UserController();
        $user = $userController->getUserByEmailAndPassword($_POST["email"], $_POST["pass"]);
        if($user != null){
            $_SESSION["userid"] = $user["id"];
        }
    }
?>
<body>
    <form action="" method="post">
        <input name="email" type="text">
        <input name="pass" type="password">
        <button type="submit">Iniciar sesion</button>
    </form>
</body>
</html>