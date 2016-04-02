<?php

    function postPacientes() {
        $request = \Slim\Slim::getInstance()->request();
        $doc = json_decode($request->getBody());
        $sql = "INSERT INTO pacientes (nombre_pac, paterno_pac, materno_pac, fecha_nacimiento, curp, sexo, estado, municipio, direccion, cp, correo_pac, telefono_pac, sangre, alcoholismo, tabaquismo, antecedentes_h, antecedentes_p, antecedentes_np ) VALUES (:nombre_pac, :paterno_pac, :materno_pac, :fecha_nacimiento, :curp, :sexo, :estado, :municipio, :direccion, :cp, :correo_pac, :telefono_pac, :sangre, :alcoholismo, :tabaquismo, :antecedentes_h, :antecedentes_p, :antecedentes_np )";
        try {
          $db = getConnection();
          $stmt = $db->prepare($sql);
          $stmt->bindParam("nombre_pac", $doc->nombre_pac);
          $stmt->bindParam("paterno_pac", $doc->paterno_pac);
          $stmt->bindParam("materno_pac", $doc->materno_pac);
          $stmt->bindParam("fecha_nacimiento", $doc->fecha_nacimiento);
          $stmt->bindParam("curp", $doc->curp);
          $stmt->bindParam("sexo", $doc->sexo);
          $stmt->bindParam("estado", $doc->estado);
          $stmt->bindParam("municipio", $doc->municipio);
          $stmt->bindParam("direccion", $doc->direccion);
          $stmt->bindParam("cp", $doc->cp);
          $stmt->bindParam("correo_pac", $doc->correo_pac);
          $stmt->bindParam("telefono_pac", $doc->telefono_pac);
          $stmt->bindParam("sangre", $doc->sangre);
          $stmt->bindParam("alcoholismo", $doc->alcoholismo);
          $stmt->bindParam("tabaquismo", $doc->tabaquismo);
          $stmt->bindParam("antecedentes_h", $doc->antecedentes_h);
          $stmt->bindParam("antecedentes_p", $doc->antecedentes_p);
          $stmt->bindParam("antecedentes_np", $doc->antecedentes_np);
          $stmt->execute();
          $db = null;
          $answer = array('estatus' => 'ok' , 'msj'=> 'Paciente creado exitosamente');
        } catch(PDOException $e) {
            $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
          }
        echo json_encode($answer);
    }

 ?>
