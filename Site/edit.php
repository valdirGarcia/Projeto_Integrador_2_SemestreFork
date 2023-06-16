<?php


 require_once("models/Message.php");
 require_once("dao/MedicoDAO.php");
 require_once("dao/ConsultaDAO.php");
 require_once("global.php");
 require_once("conexao.php");
 //verifica se o usuario esta autenticado
 $Medico = new Medico();
 $MedicoDAO = new MedicoDAO($conn,$BASE_URL);
 
$MedicoData = $MedicoDAO->verifyToken(true);

$ConsultaDAO = new ConsultaDAO($conn, $BASE_URL);






?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de consulta </title>

   
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

 <h1 class="heading">Alteração de Consulta</h1>

 <div class="row">

    <div class="image">
      <img src="" alt="">
    </div>

 <form action="<?=$BASE_URL?>cadastro_process.php" id="edit-consulta-form" method="POST"> 
    <span>Data</span>
    <input type="hidden" name="type" value="update">
    <input type="hidden" name="id_consulta" value="<?=$ConsultaDAO->$id_consulta?>">
    <Input type="date" required placeholder="Insira a data da consulta" value="<?=$ConsultaDAO->$date?> " maxlength="50"
      id="date" name="date" class="box">

      <input type="submit"  class="btn" value="alterar consulta" > 

    
  
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