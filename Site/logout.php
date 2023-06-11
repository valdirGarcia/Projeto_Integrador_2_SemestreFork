<?php

require_once("global.php");
require_once("conexao.php");
require_once("models/Medico.php");
require_once("models/Message.php");
require_once("dao/MedicoDAO.php");

$MedicoDAO = new MedicoDAO($conn,$BASE_URL);
$message = new Message ($BASE_URL);

if($MedicoDAO) {
    $MedicoDAO->destroyToken();
}
