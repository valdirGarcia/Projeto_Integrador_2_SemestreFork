<?php
 require_once("global.php");
 require_once("conexao.php");
 require_once("models/Consulta.php");
 require_once("models/Message.php");
 require_once("dao/ProfessorDAO.php");
 require_once("dao/MedicoDAO.php");
 require_once("dao/ConsultaDAO.php");

 $message = new Message ($BASE_URL);
 $ProfessorDAO = new ProfessorDAO ($conn,$BASE_URL);
 $MedicoDAODAO = new MedicoDAO ($conn,$BASE_URL);
 $ConsultaDAO = new ConsultaDAO ($conn,$BASE_URL);
 


  //

 //resgata o tipo do formulario
 $type = filter_input(INPUT_POST, "type");


  //resgatando os dados do usuario
  $ProfessorData = $ProfessorDAO->verifyToken();

 if($type === "create"){



    //receber os dados dos inputs

    $date = filter_input(INPUT_POST, "date");
    $name = filter_input(INPUT_POST, "name");


    $consulta = new Consulta();


    // Validação minima de dados
    if(!empty($name)){


        $consulta->date= $date;
        $consulta->id_med= $name;
        $consulta->id_prof=$ProfessorData->id_professor;
        

        $ConsultaDAO->create($consulta);

    }else{


        
    $message->setMessage("Prencha todos os campos", "error","back");

}

   


 }else{

    $message->setMessage("Informações invalidas!!", "error","index.php");

 }