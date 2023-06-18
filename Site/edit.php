<?php
 require_once("models/Medico.php");
 require_once("dao/MedicoDAO.php");
 require_once("dao/ConsultaDAO.php");
 require_once("global.php");
 require_once("conexao.php");
 //verifica se o usuario esta autenticado

 $consulta = new Consulta();
 $Medico = new Medico();

 $MedicoDAO = new MedicoDAO($conn,$BASE_URL);
 
$MedicoData = $MedicoDAO->verifyToken(true);

$ConsultaDAO = new ConsultaDAO($conn,$BASE_URL);
//$ConsultaData = $ConsultaDAO->findById($id_consulta);



$id_consulta = filter_input(INPUT_POST,"id");








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
    <input  id="id" type="hidden" name="id" value="<?= $id_consulta?>">
    <Input type="date"  value="<?= $date?>" maxlength="50" id="data" name="data" class="box">

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