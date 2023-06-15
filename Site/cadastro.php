<?php


 require_once("models/Message.php");
 require_once("dao/ProfessorDAO.php");
 require_once("global.php");
 require_once("dao/MedicoDAO.php");
 require_once("conexao.php");
 //verifica se o usuario esta autenticado
 $Professor = new Professor();
 $ProfessorDAO = new ProfessorDAO($conn,$BASE_URL);
 
$ProfessorData = $ProfessorDAO->verifyToken(true);




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de consulta </title>

   
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

 <h1 class="heading">Cadastro de Consulta</h1>

 <div class="row">

    <div class="image">
      <img src="" alt="">
    </div>

 <form action="<?=$BASE_URL?>cadastro_process.php" id="add-consulta-form" method="post"> 
    <span>Data</span>
    <input type="hidden" name="type" value="create">
    <Input type="date" required placeholder="Insira a data da consulta" maxlength="50"
      id="date" name="date" class="box">

      <div>
      <select id="name" name="name">
      <option>--selecione o Nome do medico--</option>
         <?php
         $query = $conn->query("SELECT * from medico ORDER BY nome ASC");
         $registros = $query->fetchALL(PDO::FETCH_ASSOC);

           foreach($registros as $option) {
            ?>
              
              <option value="<?php echo $option['id_medico']?>"><?php echo $option['nome']?></option>

              <?php
           }
           ?>
      </select>
      </div>

      <input type="submit"  class="btn" value="adcionar consulta" > 

    
  
 </form>

 </div>
 </div>

</section>
<!-- contact section ends -->

      <section class="flex">
      <a href="paciente.php"><button class="btn">Voltar</button>
       
      </section>

  



    
</body>
</html>
