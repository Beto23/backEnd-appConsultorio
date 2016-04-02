<?php

  function postDoctores() {
  $request = \Slim\Slim::getInstance()->request();
  $doc = json_decode($request->getBody());
  $sql = "INSERT INTO doctores (id_especialidad, nombre_doc, paterno_doc, materno_doc, telefono_doc, correo_doc) VALUES (:id_especialidad, :nombre_doc, :paterno_doc, :materno_doc, :telefono_doc, :correo_doc)";
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam("id_especialidad", $doc->id_especialidad);
    $stmt->bindParam("nombre_doc", $doc->nombre_doc);
    $stmt->bindParam("paterno_doc", $doc->paterno_doc);
    $stmt->bindParam("materno_doc", $doc->materno_doc);
    $stmt->bindParam("telefono_doc", $doc->telefono_doc);
    $stmt->bindParam("correo_doc", $doc->correo_doc);
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
