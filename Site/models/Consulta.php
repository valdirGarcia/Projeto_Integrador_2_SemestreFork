<?php

class Consulta{
    public $id_consulta;
    public $date;
    public $id_prof;
    public $id_med;
}

interface consultaDAOInterface{

      public function buildConsulta($data);
      public function findALL();
      public function getLatestConsulta();
      public function getConsultaByMedico($id_med);
      public function getConsultaByProfessorID($id_prof);
      public function findById($id_consulta);
      public function create(Consulta $consulta);
      public function update(Consulta $consulta);
      public function destroy($id_consulta);


}

