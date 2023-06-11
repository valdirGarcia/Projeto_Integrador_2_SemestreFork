<?php
 require_once("global.php");
 require_once("conexao.php");
 require_once("models/Medico.php");
 require_once("models/Message.php");
 require_once("dao/MedicoDAO.php");

 $message = new Message ($BASE_URL);
 $MedicoDAO = new MedicoDAO($conn,$BASE_URL);

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
    if($MedicoDAO->findByEmail($email) === false ){

       $Medico = new Medico();

        //criação de token e senha
        $MedicoToken = $Medico->generateToken();
        $finalPassword = $Medico->generatePassword($senha);


       
       $Medico->nome = $nome;
       $Medico->telefone = $telefone;
       $Medico->email = $email;
       $Medico->sexo = $sexo;
       $Medico->senha = $finalPassword;
       $Medico->token = $MedicoToken;

       $auth = true;

       $MedicoDAO->create($Medico, $auth);

    }else{
     //enviar mensagem de erro de usuario ja existe   
     $message->setMessage("Usuario já cadastrado Tente outro email", "error","back");
    }

} else {
    //Enviar uma msg de erro, de dados faltantes
   $message->setMessage("Por favor prencha todos os campos", "error","back");
   
}

}else if($type === "login"){

}


