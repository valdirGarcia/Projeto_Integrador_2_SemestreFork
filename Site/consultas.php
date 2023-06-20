<?php

 require_once("global.php");
 require_once("conexao.php");
 require_once("models/Message.php");
 require_once("dao/MedicoDAO.php");
require_once("dao/ConsultaDAO.php");
 
 $Medico = new Medico();
 $MedicoDAO = new MedicoDAO($conn,$BASE_URL);
 $ConsultaDAO = new ConsultaDAO($conn,$BASE_URL);         

$MedicoData = $MedicoDAO->verifyToken(true);


//$MedicoCadastro -> $ConsultaDAO->getCadastroByMedicoId($MedicoData->id_medico);


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de Consultas</title>

   
     <!-- swiper css  link  -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>


    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- custom css file link -->
    <link rel="stylesheet" href="css/Style_Index.css">



</head>
<body>




<div>
<section class="contact" id="contact">

 <h1 class="heading">Pesquisa de Ultimas Consultas</h1>

 <div class="row">

    <div class="image">
      <img src="" alt="">
    </div>

 <form action="<?=$BASE_URL?>historico.php" id="edit-consulta-form" method="POST"> 
    <span>Quantidades de consultas</span>
    <input type="hidden" name="type" value="historico">
    <!-- <input  id="id" type="hidden" name="id" value=""> -->
    <Input type="number"  maxlength="50" id="numero" name="numero" class="box">
      <div>
      <select id="name" name="name">
      <option>--selecione o Nome do Paciente--</option>
         <?php
         $query = $conn->query("SELECT * from professor ORDER BY nome ASC");
         $registros = $query->fetchALL(PDO::FETCH_ASSOC);

           foreach($registros as $option) {
            ?>
              
              <option value="<?php echo $option['nome']?>"><?php echo $option['nome']?></option>

              <?php
           }
           ?>
      </select>
      </div>
      <input type="submit"  class="btn" value="Pesquisar Historico" > 

  
 </form>


 </div>
 </div>

</section>
<!-- contact section ends -->

      <section class="flex">
      <a href="doctor.php"><button class="btn">Voltar</button>
       
      </section>

  



    
</body>
</html>
