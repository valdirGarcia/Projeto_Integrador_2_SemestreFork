<?php
require_once("models/Professor.php");
require_once("models/Message.php");

class ProfessorDAO implements ProfessorDAOInterface{
    
     private $conn;
     private $url;
     private $message;

      //metodo contrutor concatenando as variaveis
     public function __construct(PDO $conn, $url){
        $this->conn = $conn; //chamando a conexão
        $this->url =$url; //chamando a url do sistema Base URL
        $this->message = new Message($url);

     }
    public function buildProfessor($data) {
        $Professor = new Professor();

        $Professor->id_professor = $data["id_professor"]; //arraty das variaveis do Professor
        $Professor->nome = $data["nome"];
        $Professor->telefone = $data["telefone"];
        $Professor->email = $data["email"];
        $Professor->sexo = $data["sexo"];
        $Professor->senha = $data["senha"];
        $Professor->token = $data["token"];

        return $Professor;


    }

    public function create(Professor $Professor, $authProfessor = false) {

       $stmt=$this->conn->prepare("INSERT INTO professor(
        nome, telefone, email, sexo, senha, token) 
        VALUES ( :nome, :telefone, :email, :sexo, :senha, :token) ");

        $stmt->bindParam(":nome", $Professor->nome);
        $stmt->bindParam(":telefone", $Professor->telefone);
        $stmt->bindParam(":email", $Professor->email);
        $stmt->bindParam(":sexo", $Professor->sexo);
        $stmt->bindParam(":senha", $Professor->senha);
        $stmt->bindParam(":token", $Professor->token);

        $stmt->execute();
         //autenticar usuario. caso auth seja true 
         if($authProfessor){
          $this->setTokentoSession($Professor->token);
         }
    } 

    public function update(Professor $Professor, $redirect= true) {

      
      $stmt = $this->conn->prepare("UPDATE professor SET
       nome = :nome,
       telefone = :telefone,
       email = :email,
       sexo = :sexo,
       token = :token
      where id_professor = :id_professor

      ");

      $stmt->bindParam(":nome", $Professor->nome);
       $stmt->bindParam(":telefone", $Professor->telefone);
       $stmt->bindParam(":email", $Professor->email);
        $stmt->bindParam(":sexo", $Professor->sexo);
        $stmt->bindParam(":token", $Professor->token);
      $stmt->bindParam(":id_professor", $Professor->id_professor);


      $stmt->execute();

      if($redirect) {

        $this->message->setMessage("Dados atualizados com sucesso", "success", "paciente.php");


      }
    } 

    public function verifyToken($protected =true) {
      if(!empty($_SESSION["token"])){

      //pega o token da session
      $token = $_SESSION["token"];
      
      $Professor = $this->findByToken($token);

         if($Professor) {
 
           return $Professor;

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
        $this->message->setMessage("Seja bem vindo!","success", "paciente.php");
      }

    }

    
    public function authenticateUser($email,$senha) {
       
      $Professor =$this->findByEmail($email);
      
      if($Professor) {
         
        
       //discripitar a senha


         
         //checar se as senhas batem
        if($senha ==  $Professor->senha){
         
             //gerar um token e inserir na session
        $token = $Professor->generateToken();
            
        $this->setTokentoSession($token,false);
        
        //atualizar token no usuario
        $Professor->token = $token;

        $this->update($Professor, true);

        return true;
         


        } else{
          

          return false;
        }

      }else{
        
       
           return false;

      }
    } 

    public function findByEmail($email) {   //encontrando um usuario no banco com o mesmo email

      if($email !="") {
        $stmt = $this->conn->prepare("SELECT * FROM professor where email = :email");

        $stmt->bindParam(":email",$email);

        $stmt->execute();

        if($stmt->rowCount() > 0) {    //contagem de linhas com o mesmo email no banco
         
            $data = $stmt->fetch();

            $Professor = $this->buildProfessor($data);

          return $Professor;

        } else{
            return false;
        }

      }else {
        return false;
      }
    }

    public function findByToken($token) {

      if($token != "") {

        $stmt = $this->conn->prepare("SELECT * FROM professor where token = :token");

        $stmt->bindParam("token",$token);

        $stmt->execute();

        if($stmt->rowCount() > 0) {    //contagem de linhas com o mesmo email no banco
         
            $data = $stmt->fetch();

            $Professor = $this->buildProfessor($data);

          return $Professor;

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
     
    public function findById($id_professor) {

    }
    public function changePassword(Professor $Professor) {

    }
  }