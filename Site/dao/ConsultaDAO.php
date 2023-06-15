<?php

  require_once("models/Consulta.php");
  require_once("models/Message.php");




  class ConsultaDAO implements consultaDAOInterface{

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url){
        $this->conn =$conn;
        $this->url =$url;
        $this->message = new Message($url);
    }


    public function buildConsulta($data) {
        $consulta = new Consulta();

        $consulta->id_consulta  = $data["id_consulta"]; //arraty das variaveis do consulta$consulta
        $consulta->date = $data["date"];
        $consulta->id_med = $data["id_med"];
        $consulta->id_prof = $data["id_prof"];
       

        return $consulta;

    }
    public function findALL() {

    }
    public function getLatestConsulta() {

    }
    public function getConsultaByMedico($id_med) {

    }
    public function getConsultaByProfessorID($id_prof) {

    }
    public function findById($id_consulta) {

    }
    public function create(Consulta $consulta) {
$stmt =$this->conn->prepare("INSERT INTO consulta(
     date,id_prof,id_med
    )VALUES(
        :date, :id_prof, :id_med

    )");

    $stmt->bindParam(":date", $consulta->date);
    $stmt->bindParam(":id_prof", $consulta->id_prof);
    $stmt->bindParam(":id_med", $consulta->id_med);


    $stmt->execute();

    $this->message->setMessage("Consulta feita", "success", "paciente.php");



    }
    public function update(Consulta $consulta) {

    }
    public function destroy($id_consulta) {

    }





  }