<?php


 require_once("models/Message.php");
 require_once("dao/ProfessorDAO.php");
 require_once("global.php");
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
    <Input type="date" required placeholder="Insira a data da consulta" maxlength="50"
      id="data" name="data" class="box">

      <input type="hidden" value="create" class="btn" name="type"> 
<!-- 
    <span>your email</span>
    <Input type="email" required placeholder="enter your valie email" maxlength="50"
    name="email" class="box">

    <span>your number</span>
    <Input type="number" required placeholder="enter your valie number" 
      max="99999999999" min="0" name="number" class="box" onkeypress="if(this.value.
      length == 10) return false;">

     <span>select gender</span> 
     <div class="radio">
        <input type="radio" name="gender" value="male" id="male">
        <label for="male">male</label>
        <input type="radio" name="gender" value="female" id="female">
        <label for="female">female</label>
     </div> -->
    
  
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
