<?php

    function putPaciente() {
        $request = \Slim\Slim::getInstance()->request();
        $req = json_decode($request->getBody());
        $sql = "UPDATE pacientes SET nombre_pac=:nombre_pac, paterno_pac=:paterno_pac, materno_pac=:materno_pac, fecha_nacimiento=:fecha_nacimiento, curp=:curp, sexo=:sexo, estado=:estado, municipio=:municipio, direccion=:direccion, cp=:cp, correo_pac=:correo_pac, telefono_pac=:telefono_pac, sangre=:sangre, alcoholismo=:alcoholismo, tabaquismo=:tabaquismo, antecedentes_h=:antecedentes_h, antecedentes_p=:antecedentes_p, antecedentes_np=:antecedentes_np  WHERE id_paciente='$req->id_paciente'";
        try {
            $db = getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("nombre_pac", $req->nombre_pac);
            $stmt->bindParam("paterno_pac", $req->paterno_pac);
            $stmt->bindParam("materno_pac", $req->materno_pac);
            $stmt->bindParam("fecha_nacimiento", $req->fecha_nacimiento);
            $stmt->bindParam("curp", $req->curp);
            $stmt->bindParam("sexo", $req->sexo);
            $stmt->bindParam("estado", $req->estado);
            $stmt->bindParam("municipio", $req->municipio);
            $stmt->bindParam("direccion", $req->direccion);
            $stmt->bindParam("cp", $req->cp);
            $stmt->bindParam("correo_pac", $req->correo_pac);
            $stmt->bindParam("telefono_pac", $req->telefono_pac);
            $stmt->bindParam("sangre", $req->sangre);
            $stmt->bindParam("alcoholismo", $req->alcoholismo);
            $stmt->bindParam("tabaquismo", $req->tabaquismo);
            $stmt->bindParam("antecedentes_h", $req->antecedentes_h);
            $stmt->bindParam("antecedentes_p", $req->antecedentes_p);
            $stmt->bindParam("antecedentes_np", $req->antecedentes_np);
            $stmt->execute();
            $db = null;
            $answer = array('estatus' => 'ok', 'msj' => 'paciente modificado exitosamente.');
        } catch(PDOException $e) {
            $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
        }
        echo json_encode($answer);
    }

 ?>
