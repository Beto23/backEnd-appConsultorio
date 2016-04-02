<?php

  function putDoctor() {
  	$request = \Slim\Slim::getInstance()->request();
  	$doc = json_decode($request->getBody());
  	$sql = "UPDATE doctores SET nombre=:nombre, paterno=:paterno, materno=:materno, telefono=:telefono, correo=:correo
  					WHERE id_doctor = '$doc->id_doctor'";
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
  		$answer = array('estatus' => 'ok' , 'msj' => 'Se ha modificado tu perfil.');
  	} catch(PDOException $e) {
  		$answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
  	}
  	echo json_encode($answer);
  }

 ?>