<?php

  class Professor{
    public $id_professor;
    public $nome;
    public $telefone;
    public $email;
    public $sexo;
    public $senha;
    public $token;

    public function generateToken() {
      return bin2hex(random_bytes(50)); //cria uma string e a modifica  deixando a mais complexa
    }

    //public function generatePassword($senha) {
     // return password_hash($senha, PASSWORD_DEFAULT);
        
    //}
  }

  //metodos que o DAO precisa ter 
  interface ProfessorDAOInterface{

    public function buildProfessor($data); //construção do objeto
    public function create(Professor $Professor, $authProfessor = false); // criação do usuario e podendo fazer o login
    public function update(Professor $Professor, $redirect =true); //update do usuario no sistema
    public function verifyToken($protected =false); //deixando as rotas mais seguras atraves de autenticação
    public function setTokentoSession($token, $redirect=true);// direcionaar o usuario a uma pagina especifica
    public function authenticateUser($email,$senha); // autenticação do medico
    public function findByEmail($email); //função onde posso encontrar um medico pelo email
    public function findByToken($token);//podendo encontrar um medico no sistema pela variavel
    public function destroyToken();
    public function findById($id_professor);
    public function changePassword(Professor $Professor);//verificação para troca de senha
  

  }