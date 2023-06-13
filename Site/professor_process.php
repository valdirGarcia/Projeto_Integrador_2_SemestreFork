<?php
 require_once("global.php");
 require_once("conexao.php");
 require_once("models/Professor.php");
 require_once("models/Message.php");
 require_once("dao/ProfessorDAO.php");

 $message = new Message ($BASE_URL);
 $ProfessorDAO = new ProfessorDAO($conn,$BASE_URL);



 

 //resgata o tipo do formulario
 $type = filter_input(INPUT_POST, "type");

//verificação do tipo de formulario
if ($type === "cadastro") {

    $nome = filter_input(INPUT_POST, "nome");
    $telefone = filter_input(INPUT_POST, "telefone");
    $email = filter_input(INPUT_POST, "email");
    $sexo = filter_input(INPUT_POST, "sexo");
    $senha = filter_input(INPUT_POST, "senha");

//verificação de dados minimos
if($nome && $telefone && $email && $senha){

    //verificar se o email ja ta cadastrado no sisteme
    if($ProfessorDAO->findByEmail($email) === false ){

       $Professor = new Professor();

        //criação de token e senha
        $ProfessorToken = $Professor->generateToken();
      //  $finalPassword = $Professor->generatePassword($senha);


       
       $Professor->nome = $nome;
       $Professor->telefone = $telefone;
       $Professor->email = $email;
       $Professor->sexo = $sexo;
       $Professor->senha = $senha;
       $Professor->token = $ProfessorToken;

       $auth = true;

       $ProfessorDAO->create($Professor, $auth);

    }else{
     //enviar mensagem de erro de usuario ja existe   
     $message->setMessage("Usuario já cadastrado Tente outro email", "error","back");
    }

} else {
    //Enviar uma msg de erro, de dados faltantes
   $message->setMessage("Por favor prencha todos os campos", "error","back");
   
}

}else if($type === "login"){
    

    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");

    //tenta autenticar usuario
    if($ProfessorDAO->authenticateUser($email,$senha)){

        $message->setMessage("Seja bem vindo!","success", "paciente.php");

    //redireciona o usuario caso naão conseguir autenticar
    }else{
       
        $message->setMessage("Usuario ou senha incorretos!!", "error","back");
         
    }

} else{
      
    $message->setMessage("Informações invalidas!!", "error","index.php");

}


