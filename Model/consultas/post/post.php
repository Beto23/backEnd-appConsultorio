<?php

function postConsultas() {
$request = \Slim\Slim::getInstance()->request();
$doc = json_decode($request->getBody());
$sql = "INSERT INTO consultas (id_paciente, id_doctor, hora, fecha_consulta) VALUES (:id_paciente, :id_doctor, :hora, :fecha_consulta)";
try {
  $db = getConnection();
  $stmt = $db->prepare($sql);
  $stmt->bindParam("id_paciente", $doc->id_paciente);
  $stmt->bindParam("id_doctor", $doc->id_doctor);
  $stmt->bindParam("hora", $doc->hora);
  $stmt->bindParam("fecha_consulta", $doc->fecha_consulta);
  $stmt->execute();
  $db = null;
  $answer = array('estatus' => 'ok' , 'msj'=> 'consulta creada exitosamente');
} catch(PDOException $e) {
  $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
}
echo json_encode($answer);
}

 ?>
