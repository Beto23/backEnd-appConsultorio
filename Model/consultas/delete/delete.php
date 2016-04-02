<?php

  function deleteConsulta(){
    $request = \Slim\Slim::getInstance()->request();
    $doc = json_decode($request->getBody());
    $sql_query = "DELETE
            FROM
              consultas
            WHERE
              id_consulta = '$doc->id_consulta'";
    try {
      $db = getConnection();
      $stmt = $db->prepare($sql_query);
      $stmt->bindParam("id_consulta", $doc->id_consulta);
      $stmt->execute();
      $db = null;
      $answer = array('estatus'=>'ok', 'msj'=> 'consulta eliminada exitosamente');
    }
    catch(PDOException $e) {
      if($e->errorInfo[1] == 1451){
        $answer = array( 'estatus'=>'error','msj' =>  'No puedes eliminarla, está consulta está asociado a un detalle de consulta.' );
      } else {
        $answer = array( 'estatus'=>'error','msj' =>  $e->getMessage());
      }
    }
    echo json_encode($answer);
  }
  
  //tabla detalle consulta
  function deleteDetalleConsulta(){
    $request = \Slim\Slim::getInstance()->request();
    $doc = json_decode($request->getBody());
    $sql_query = "DELETE
            FROM
              detalle_consulta
            WHERE
              id_detalle_consulta = '$doc->id_detalle_consulta'";
    try {
      $db = getConnection();
      $stmt = $db->prepare($sql_query);
      $stmt->bindParam("id_detalle_consulta", $doc->id_detalle_consulta);
      $stmt->execute();
      $db = null;
      $answer = array('estatus'=>'ok', 'msj'=> 'detalle de la consulta eliminada exitosamente');
    }
    catch(PDOException $e) {
        $answer = array( 'estatus'=>'error','msj' =>  $e->getMessage());
    }
    echo json_encode($answer);
  }

 ?>
