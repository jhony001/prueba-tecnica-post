<?php



class UserController{

    private $database;
    private $host;
    private $user;
    private $db;
    private $port;
    private $password;

    public function __construct($host, $user, $password, $db, $port){
        $this->host = $host;
        $this->user = $user;
        $this->db = $db;
        $this->port = $port;
        $this->password = $password;
    }

    public function createUser($userc){
        $this->database = new mysqli($this->host, $this->user, $this->password, $this->db, $this->port);
        if($this->database->connect_errno != null){
            print("Error conectando a la base de datos " . $this->database->connect_errno);
            die();
        }
        $passwordEncrypted = $userc->password;
        $query = 'INSERT INTO users VALUES("'.$userc->email.'", "'.$userc->username.'","'.$passwordEncrypted.'")';
        try{
            $result = $this->database->query($query);
            return true;
        }catch(Exception $e){
            print("Error al crear usuario". e.getMessage());
            return false;
        }
    }

    public function getUserByEmailAndPassword($email, $password){
        $this->database = new mysqli($this->host, $this->user, $this->password, $this->db, $this->port);
        if($this->database->connect_errno != null){
            print("Error conectando a la base de datos " . $this->database->connect_errno);
            die();
        }
        $query = "SELECT * FROm users WHERE email = '$email' AND pass = '$password'";
        try{
            $result = $this->database->query($query);
            $userc = $result->fetch_array(MYSQLI_ASSOC);
            return $userc;
        } catch(Exception $e){
            print("Error al realizar la consulta a la base de datos");
            die();
        }
    }
}

?>