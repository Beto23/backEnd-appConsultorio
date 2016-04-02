<?php

  function addDoctores() {
  $request = \Slim\Slim::getInstance()->request();
  $doc = json_decode($request->getBody());
  $sql = "INSERT INTO doctores (nombre, paterno, materno, telefono, correo) VALUES (:nombre, :paterno, :materno, :telefono, :correo)";
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam("nombre", $doc->nombre);
    $stmt->bindParam("paterno", $doc->paterno);
    $stmt->bindParam("materno", $doc->materno);
    $stmt->bindParam("telefono", $doc->telefono);
    $stmt->bindParam("correo", $doc->correo);
    $stmt->execute();
    $db = null;
    $answer = array('estatus' => 'ok' , 'msj'=> 'Doctor creado. Bienvenido');
  } catch(PDOException $e) {
    $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
  }
  echo json_encode($answer);
  }

 ?>
