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

//tabla detalle consultas

function postDetalleConsultas() {
    $request = \Slim\Slim::getInstance()->request();
    $doc = json_decode($request->getBody());
    $sql = "INSERT INTO detalle_consulta (id_consulta, motivo, sintomas, diagnostico, medicamento) VALUES (:id_consulta, :motivo, :sintomas, :diagnostico, :medicamento)";
    try {
      $db = getConnection();
      $stmt = $db->prepare($sql);
      $stmt->bindParam("id_consulta", $doc->id_consulta);
      $stmt->bindParam("motivo", $doc->motivo);
      $stmt->bindParam("sintomas", $doc->sintomas);
      $stmt->bindParam("diagnostico", $doc->diagnostico);
      $stmt->bindParam("medicamento", $doc->medicamento);
      $stmt->execute();
      $db = null;
      $answer = array('estatus' => 'ok' , 'msj'=> 'detaller de consulta creada exitosamente');
    } catch(PDOException $e) {
      $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
    }
    echo json_encode($answer);
}

 ?>
