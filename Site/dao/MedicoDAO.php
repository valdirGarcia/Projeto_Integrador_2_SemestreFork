<?php
require_once("models/Medico.php");
require_once("models/Message.php");

class MedicoDAO implements MedicoDAOInterface{
    
     private $conn;
     private $url;
     private $message;

      //metodo contrutor concatenando as variaveis
     public function __construct(PDO $conn, $url){
        $this->conn = $conn; //chamando a conexão
        $this->url =$url; //chamando a url do sistema Base URL
        $this->message = new Message($url);

     }
    public function buildMedico($data) {
        $Medico = new Medico();

        $Medico->id_medico = $data["id_medico"]; //arraty das variaveis do medico
        $Medico->nome = $data["nome"];
        $Medico->telefone = $data["telefone"];
        $Medico->email = $data["email"];
        $Medico->sexo = $data["sexo"];
        $Medico->senha = $data["senha"];
        $Medico->token = $data["token"];

        return $Medico;


    }

    public function create(Medico $Medico, $authMedico = false) {

       $stmt=$this->conn->prepare("INSERT INTO medico(
        nome, telefone, email, sexo, senha, token) 
        VALUES ( :nome, :telefone, :email, :sexo, :senha, :token) ");

        $stmt->bindParam(":nome", $Medico->nome);
        $stmt->bindParam(":telefone", $Medico->telefone);
        $stmt->bindParam(":email", $Medico->email);
        $stmt->bindParam(":sexo", $Medico->sexo);
        $stmt->bindParam(":senha", $Medico->senha);
        $stmt->bindParam(":token", $Medico->token);

        $stmt->execute();
         //autenticar usuario. caso auth seja true 
         if($authMedico){
          $this->setTokentoSession($Medico->token);
         }
    } 

    public function update(Medico $Medico,) {

    } 

    public function verifyToken($protected =true) {
      if(!empty($_SESSION["token"])){

      //pega o token da session
      $token = $_SESSION["token"];
      
      $Medico = $this->findByToken($token);

         if($Medico) {
 
           return $Medico;

         }else if ($protected) {
          //redireciona usuario não autenticado
          $this->message->setMessage("Faça a autenticação para acessar a pagina!","error", "index.php");

         }
      
        }else if ($protected) {
          //redireciona usuario não autenticado
          $this->message->setMessage("Faça a autenticação para acessar a pagina!","error", "index.php");

         }
      

    } 

    public function setTokentoSession($token, $redirect=true) {
      
      //Salvar token na session
      $_SESSION["token"]= $token;

      if($redirect){
        // redireciona para o perfil do medico
        $this->message->setMessage("Seja bem vindo!","success", "doctor.php");
      }

    }

    public function authenticateUser($email,$senha) {

    } 

    public function findByEmail($email) {   //encontrando um usuario no banco com o mesmo email

      if($email !="") {
        $stmt = $this->conn->prepare("SELECT * FROM medico where email = :email");

        $stmt->bindParam(":email",$email);

        $stmt->execute();

        if($stmt->rowCount() > 0) {    //contagem de linhas com o mesmo email no banco
         
            $data = $stmt->fetch();

            $Medico = $this->buildMedico($data);

          return $Medico;

        } else{
            return false;
        }

      }else {
        return false;
      }
    }

    public function findByToken($token) {

      if($token != "") {

        $stmt = $this->conn->prepare("SELECT * FROM medico where token = :token");

        $stmt->bindParam("token",$token);

        $stmt->execute();

        if($stmt->rowCount() > 0) {    //contagem de linhas com o mesmo email no banco
         
            $data = $stmt->fetch();

            $Medico = $this->buildMedico($data);

          return $Medico;

        } else{
            return false;
        }

      }else {
        return false;
      }
      
     

    }

    public function destroyToken() {
            
      //remove o token da sessao
      $_SESSION["token"] ="";

      //redirecionar e apresentar a msg de sucesso
      $this->message->setMessage("Voce fez o Logout com sucesso!", "success", "index.php");

    }
     
    public function findById($id_medico) {

    }
    public function changePassword(Medico $Medico) {

    }
  }
  
 
