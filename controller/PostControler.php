<?php

$host     = "localhost";
$port     = 3306;
$user     = "root";
$password = "";
$database = "prueba_tecnica";

class PostController{
    private $database;
    public function __construct(){
        $this->database = new mysqli($host, $user, $password, $database, $port);
        if($this->database->connect_errno != null){
            print("Error conectando a la base de datos " . $this->database->connect_errno);
            die();
        }
    }

    public function createPost($post, $userID){
        $query = 'INSERT INTO posts VALUES("'.$post->text.'", "'.$post->image.'",'.$userID.')';
        try{
            $result = $this->database->query($query);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function deletePostById($postId){
        $query = "DELETE FROM posts WHERE id = $postId";
        try{
            $result = $this->database->query($query);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function getPostById($postId){
        $query = "SELECT * FROm posts WHERE id = $postId";
        try{
            $result = $this->database->query($query);
            $post = $result->fetch_array(MYSQLI_ASSOC);
            return $post;
        } catch(Exception $e){
            print("Error al realizar la consulta a la base de datos");
            die();
        }
    }
}
?>