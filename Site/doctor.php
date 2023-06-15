
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>area do medico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
         <!-- swiper css  link  -->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>


         <!-- font awesome cdn link -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         
         <!-- custom css file link -->
         <link rel="stylesheet" href="css/Style_doctor.css">
     
</head>
<body class="  flex justify-center items-center h-screen w-screen">
    <div class="container ">
          <div class=" bg-gray flex flex-row  items-center">
            <div class="bg.green px-10 py-5">
                <a href="Index.html" class="text-lg app-color-green font-bold">Profcare</a>
            </div>
            <div class="flex flex-row pl-5 items-center">
                <div class="flex justify-center items-center h-9 w-9 app-color-green border-solid border-4 border-green-600 rounded-xl">
                    <i class="fas fa-user-md r"></i>
                </div>
                <div class="flex flex-col pl-5">
                    <span class="font-semibold text-sm app-color-green "><?= $MedicoData->nome?></span>
                    <span class="font-semibold text-xs app-color-green">PSICOLOGO</span>
                </div>  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 app-color-green ml-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>     
                <div class="w-px bg-green-100 h-10 ml-5"></div>
            </div>
            <div class="flex flex-row pl-5 items-center mr-auto">
                <div class="h-9 w-9 app-color-green flex justify-center items-center rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-blue-1"> <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                </div>
                <div class="flex flex-col pl-5">
                    <span class="font-semibold text-sm app-color-green">Hoje</span>
                    <span class="font-semibold text-sm app-color-green">05 JUL 2023</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 app-color-green ml-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>     
                <div class="w-px bg-green-100 h-10 ml-5"></div>

            </div>
            
            
                <a href="<?= $BASE_URL ?>logout.php" class="  font-semibold text-md  w-10 py-2 rounded-3xl mr-9 app-color-green ">SAIR</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-green mr-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>       
        </div>
       
            <div class="  flex flex-row  py-5">
                <span class="text-lg font-bold app-color-white">Home</span>
            </div>
            <div class="flex flex-row">
                <div class="flex flex-col w-40 bg-gray pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl bg-gray active">
                    <span class="text-3xl app-color-white font-bold">12</span>
                    <span class="text-md app-color-white font-semibold">Sessões de Hoje</span>
                </div>
                <div class="flex flex-col w-40 bg-gray pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-1">
                    <span class="text-3xl app-color-white font-bold">02</span>
                    <span class="text-md app-color-white font-semibold">Concluídas</span>
                </div>
                <div class="flex flex-col w-40 bg-gray pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3">
                    <span class="text-3xl app-color-white font-bold">0</span>
                    <span class="text-md app-color-white font-semibold">Realocadas</span>
                </div>
                <div class="flex flex-col w-40 bg-gray pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-4 ">
                    <span class="text-3xl app-color-white font-bold">0</span>
                    <span class="text-md app-color-white font-semibold">Desmarcadas</span>
                </div>
            </div>
            <div class="flex flex-row bg-gray p-10">
            <?php 
                  $query =$conn->query("SELECT a.id_consulta, b.nome ,b.telefone ,a.date FROM consulta a inner join professor b on a.id_prof=b.id_professor;");
                  $registros = $query->fetchALL(PDO :: FETCH_ASSOC);
                  if(count($registros) >0) ?>
                 <table class="w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="text-left text-xs text-white">PACIENTE</th>
                            <th class="text-left text-xs text-white">CONTATO</th>
                            <th class="text-left text-xs text-white">CONSULTA</th>
                            <th class="text-left text-xs text-white"></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($registros as $registro){ ?>
                        <tr class="app-border-1">
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-green ml-3"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                            </td>
                            <td>
                                <div class="flex justify-center items-center rounded-md w-8 h-8  text-lg font-semibold text-white"><?=$registro["id_consulta"]?> </div>
                            </td>
                            <td>
                                <div class="flex flex-row py-3">
                                <div class="flex flex-row pl-5 items-center">
                                <div class="flex justify-center items-center h-9 w-9 app-color-green  rounded-xl ">
                                  <i class="fas fa-graduation-cap "></i>
                                     </div>
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-sm app-color-green"><?=$registro["nome"]?></span>
                                        <span class="font-semibold text-xs app-color-green"></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font-semibold text-sm app-color-green"><?=$registro["telefone"]?></span>
                            </td>
                            <td>
                                <span class="font-semibold text-sm app-color-green"><?=$registro["date"]?></span>
                            </td>
                            <td>
                                <span class="font-semibold text-sm app-color-green"></span>
                            </td>
                            <td>
                               
                            </td>
                            <td>
                            <a href="edit.php"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-green"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" /></svg>
                                  
                                </td>
                                <td>
                                    <form action="cadastro_process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?=$registro["id_consulta"]?>">
                                <button class="flex items-center justify-center app-button-shadow w-32 py-2 round 3xl">
            
                                  <span class="ml-1 font-semibold text-md ">Excluir</span>  
                                </button>
                                  </form>
                                  
                                </td>
                        </tr>
                        <?php  }; ?>
                    </tbody>
                   
                </table>
            </div>
        </div>
    </div>
</body>
</html>


<?php if(!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
    <p class="msg<?= $flassMessage["type"]?>"><?= $flassMessage['msg']?></p>
</div>
<?php endif; ?>
