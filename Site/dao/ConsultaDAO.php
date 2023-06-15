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
    public function getConsultaByMedico($id_medico) {

        $consulta  = [];
        $stmt = $this->conn->prepare("SELECT a.id_consulta, b.nome ,b.telefone ,a.date FROM consulta a inner join medico b on a.id_med=b.id_medico 
                                       WHERE id_med= :id_med");
        
        
        $stmt->bindParam(":id_med", $id_medico);

        $stmt->execute();


        if($stmt->rowCount()>0){
            $consultaArray= $stmt->fetchAll();
            foreach($consultaArray as $consulta) {
                $consulta[] = $this->buildConsulta($consulta);
            }
        }

        return $consulta;

    }
    public function getConsultaByProfessorID($id_prof) {

    }
    public function findById($id_consulta) {
          $consulta  = [];
        $stmt = $this->conn->prepare("SELECT * FROM consulta
                                       WHERE id_consulta= :id_consulta");
        
        
        $stmt->bindParam(":id_consulta", $id_consulta);

        $stmt->execute();


        if($stmt->rowCount()>0){

            $consultaData= $stmt->fetch();

            $consulta = $this->buildConsulta($consultaData);

            return $consulta;
           
        }else{
            return false;
        }

     



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

        $STMT = $this->conn->prepare("DELETE FROM consulta WHERE id_consulta= :id_consulta");

        $STMT->bindParam(":id_consulta",$id_consulta);

        $STMT->execute();
        $this->message->setMessage("Consulta Desmarcada  ","success", "doctor.php");


    }





  }