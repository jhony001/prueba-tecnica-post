<?php

$host     = "localhost";
$port     = 3306;
$user     = "root";
$password = "";
$database = "prueba_tecnica";

class LikeController{
    private $database;
    public function __construct(){
        $this->database = new mysqli($host, $user, $password, $database, $port);
        if($this->database->connect_errno != null){
            print("Error conectando a la base de datos " . $this->database->connect_errno);
            die();
        }
    }

    public function addLikeByPostAndUserId($postId, $userId){
        $query = "INSERT INTO likes (post_id, user_id) VALUES ($postId, $userId)";
        try{
            $result = $this->database->query($query);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function deleteLikeByPostAndUserId($postId, $userId){
        $query = "DELETE FROM likes WHERE post_id = $postId AND user_id = $userId";
        try{
            $result = $this->database->query($query);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function getLikesCountByPostId($postId){
        $query = "SELECT COUNT(*) AS LIKES_COUNT FROM likes WHERE post_id = $postId";
        try{
            $result = $this->database->query($query);
            $likesCount = $result->fetch_array(MYSQLI_ASSOC);
            return $likesCount;
        } catch(Exception $e){
            print("Error al realizar la consulta a la base de datos");
            die();
        }
    }
}
?>