<?php

 require_once("global.php");
 require_once("conexao.php");
 require_once("models/Message.php");
 require_once("dao/MedicoDAO.php");
 
 $MedicoDAO = new MedicoDAO($conn,$BASE_URL);
 
$MedicoData = $MedicoDAO->verifyToken(true);




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
<body class="bg-gray-200 flex justify-center items-center h-screen w-screen">
    <div class="container bg-red-100">
          <div class="flex flex-row bg-white items-center">
            <div class="app-bg-blue-1 px-10 py-5">
                <a href="Index.html" class="text-lg text-white font-bold">educa.</a>
            </div>
            <div class="flex flex-row pl-5 items-center">
                <div class="flex justify-center items-center h-9 w-9 bg-white-400 border-solid border-4 border-blue-600 rounded-xl">
                    <i class="fas fa-user-md r"></i>
                </div>
                <div class="flex flex-col pl-5">
                    <span class="font-semibold text-sm app-color-black"><?= $MedicoData->nome?></span>
                    <span class="font-semibold text-xs app-color-gray-1">PSICOLOGO</span>
                </div>  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 app-color-blue-3 ml-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>     
                <div class="w-px bg-gray-100 h-10 ml-5"></div>
            </div>
            <div class="flex flex-row pl-5 items-center mr-auto">
                <div class="h-9 w-9 app-bg-blue-2 flex justify-center items-center rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-blue-1"> <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" /></svg>
                </div>
                <div class="flex flex-col pl-5">
                    <span class="font-semibold text-sm app-color-black">Hoje</span>
                    <span class="font-semibold text-sm app-color-blue-1">05 JUL 2023</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 app-color-blue-3 ml-5"> <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>     
                <div class="w-px bg-gray-100 h-10 ml-5"></div>

            </div>
               <button class="app-color-blue-1 font-semibold text-md app-button-shadow w-40 py-2 rounded-3xl mr-5">Consultas</button>  
                <a href="<?= $BASE_URL ?>logout.php" class="app-color-blue-1 font-semibold text-md app-button-shadow w-40 py-2 rounded-3xl mr-5">SAIR</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-blue-3 mr-5">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                 <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>         
        </div>
        <div class="flex flex-col app-bg-white-1 px-12 pb-10">
            <div class="flex flex-row  py-5">
                <span class="text-lg font-bold app-color-black">Home</span>
            </div>
            <div class="flex flex-row">
                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl bg-white active">
                    <span class="text-3xl app-color-blue-1 font-bold">12</span>
                    <span class="text-md app-color-blue-1 font-semibold">Sessões de Hoje</span>
                </div>
                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-1">
                    <span class="text-3xl text-white font-bold">02</span>
                    <span class="text-md text-white font-semibold">Concluídas</span>
                </div>
                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3">
                    <span class="text-3xl text-white font-bold">0</span>
                    <span class="text-md text-white font-semibold">Realocadas</span>
                </div>
                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-4">
                    <span class="text-3xl text-white font-bold">0</span>
                    <span class="text-md text-white font-semibold">Desmarcadas</span>
                </div>
            </div>
            <div class="flex flex-row bg-white p-10">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="text-left text-xs app-color-black">PACIENTE</th>
                            <th class="text-left text-xs app-color-black">CONTATO</th>
                            <th class="text-left text-xs app-color-black">CONSULTA</th>
                            <th class="text-left text-xs app-color-black">CEP</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="app-border-1">
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-blue-3 ml-3"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                            </td>
                            <td>
                                <div class="flex justify-center items-center rounded-md w-8 h-8 app-bg-yellow-2 app-color-yellow-1 text-lg font-semibold">1</div>
                            </td>
                            <td>
                                <div class="flex flex-row py-3">
                                    <div class="mr-5 w-10 h-10 bg-gray-100 rounded-full"></div>
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-sm app-color-black">Pedro,Otavio</span>
                                        <span class="font-semibold text-xs app-color-gray-1">homem, 20 anos</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="font-semibold text-sm app-color-gray-1">(19)998762711</span>
                            </td>
                            <td>
                                <span class="font-semibold text-sm app-color-gray-1">08:15AM</span>
                            </td>
                            <td>
                                <span class="font-semibold text-sm app-color-gray-1">13605-334</span>
                            </td>
                            <td>
                                <button class="flex items-center justify-center app-button-shadow w-32 py-2 round 3xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-green"><path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" /></svg>
                                    <span class="ml-3 font-semibold text-md app-color-gray-1">Checado!</span>  
                                </button>
                            </td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 app-color-blue-3"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" /></svg>
                                  
                            </td>
                        </tr>
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