<?php

  function postDoctores() {
  $request = \Slim\Slim::getInstance()->request();
  $doc = json_decode($request->getBody());
  $sql = "INSERT INTO doctores (id_especialidad, nombre, paterno, materno, telefono, correo) VALUES (:id_especialidad, :nombre, :paterno, :materno, :telefono, :correo)";
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam("id_especialidad", $doc->id_especialidad);
    $stmt->bindParam("nombre", $doc->nombre);
    $stmt->bindParam("paterno", $doc->paterno);
    $stmt->bindParam("materno", $doc->materno);
    $stmt->bindParam("telefono", $doc->telefono);
    $stmt->bindParam("correo", $doc->correo);
    $stmt->execute();
    $db = null;
    $answer = array('estatus' => 'ok' , 'msj'=> 'Doctor creado exitosamente');
  } catch(PDOException $e) {
    $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
  }
  echo json_encode($answer);
  }

  //Tabla especialidad doctores

  function postEspecialidad() {
  $request = \Slim\Slim::getInstance()->request();
  $doc = json_decode($request->getBody());
  $sql = "INSERT INTO especialidad_doctor (especialidad) VALUES (:especialidad)";
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam("especialidad", $doc->especialidad);
    $stmt->execute();
    $db = null;
    $answer = array('estatus' => 'ok' , 'msj'=> 'especialidad agregada exitosamente');
  } catch(PDOException $e) {
    $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
  }
  echo json_encode($answer);
  }

 ?>
