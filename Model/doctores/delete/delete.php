<?php

  function deleteDoctor(){
  	$request = \Slim\Slim::getInstance()->request();
  	$doc = json_decode($request->getBody());
  	$sql_query = "DELETE
  					FROM
  						doctores
  					WHERE
  						id_doctor = '$doc->id_doctor'";
  	try {
  		$db = getConnection();
  		$stmt = $db->prepare($sql_query);
  		$stmt->bindParam("id_doctor", $doc->id_doctor);
  		$stmt->execute();
  		$db = null;
  		$answer = array('estatus'=>'ok', 'msj'=> 'Doctor eliminado exitosamente');
  	}
  	catch(PDOException $e) {
  		if($e->errorInfo[1] == 1451){
  			$answer = array( 'estatus'=>'error','msj' =>  'No puedes eliminarlo, este doctor está asociado a una consulta.' );
  		} else {
  			$answer = array( 'estatus'=>'error','msj' =>  $e->getMessage());
  		}
  	}
  	echo json_encode($answer);
  }

  //tabla especialidad doctor
  function deleteEspecialidad(){
    $request = \Slim\Slim::getInstance()->request();
    $doc = json_decode($request->getBody());
    $sql_query = "DELETE
            FROM
              especialidad_doctor
            WHERE
              id_especialidad = '$doc->id_especialidad'";
    try {
      $db = getConnection();
      $stmt = $db->prepare($sql_query);
      $stmt->bindParam("id_especialidad", $doc->id_especialidad);
      $stmt->execute();
      $db = null;
      $answer = array('estatus'=>'ok', 'msj'=> 'Especialidad eliminada exitosamente');
    }
    catch(PDOException $e) {
      if($e->errorInfo[1] == 1451){
        $answer = array( 'estatus'=>'error','msj' =>  'No puedes eliminarla, está especialidad está asociado a un doctor' );
      } else {
        $answer = array( 'estatus'=>'error','msj' =>  $e->getMessage());
      }
    }
    echo json_encode($answer);
  }
 ?>
