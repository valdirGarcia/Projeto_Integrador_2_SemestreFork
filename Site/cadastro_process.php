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

   


 }elseif($type === "delete"){
  
    
    //recebe os dados do form 
    $id_consulta = filter_input(INPUT_POST,"id");

    

    $consulta = $ConsultaDAO->findById($id_consulta);

    if($consulta){

    

            $ConsultaDAO->destroy($consulta->id_consulta);

    }else{

    //  $message->setMessage("Informações invalidas!!", "error","index.php");

    }

 }elseif($type ==="update"){

 print_r($_POST);
  $date = filter_input(INPUT_POST, "date");
  $id_consulta = filter_input(INPUT_POST, "id_consulta");
  $consultaData = $ConsultaDAO->findById($id_consulta);
  //verifica se veio alguma informaçaõ
  if($consulta){

      //edição do filme
      $consultaData->date= $date;



        $ConsultaDAO->update($consultaData);
  }else{

      // $message->setMessage("Informações invalidas!!", "error","back");
  }

 }else{

  // $message->setMessage("Informações invalidas!!", "error","index.php");

 }