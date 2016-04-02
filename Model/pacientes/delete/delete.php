<?php

  function deletePaciente(){
    $request = \Slim\Slim::getInstance()->request();
    $doc = json_decode($request->getBody());
    $sql_query = "DELETE
            FROM
              pacientes
            WHERE
              id_paciente = '$doc->id_paciente'";
    try {
      $db = getConnection();
      $stmt = $db->prepare($sql_query);
      $stmt->bindParam("id_paciente", $doc->id_paciente);
      $stmt->execute();
      $db = null;
      $answer = array('estatus'=>'ok', 'msj'=> 'Paciente eliminado exitosamente');
    }
    catch(PDOException $e) {
      if($e->errorInfo[1] == 1451){
        $answer = array( 'estatus'=>'error','msj' =>  'No puedes eliminarlo, esté paciente está asociado a una consulta.' );
      } else {
        $answer = array( 'estatus'=>'error','msj' =>  $e->getMessage());
      }
    }
    echo json_encode($answer);
  }

 ?>
