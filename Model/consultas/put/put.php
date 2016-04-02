<?php

    function putConsulta() {
        $request = \Slim\Slim::getInstance()->request();
        $req = json_decode($request->getBody());
        $sql = "UPDATE consultas SET id_paciente=:id_paciente, id_doctor=:id_doctor, hora=:hora, fecha_consulta=:fecha_consulta WHERE id_consulta='$req->id_consulta'";
        try {
            $db = getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id_paciente", $req->id_paciente);
            $stmt->bindParam("id_doctor", $req->id_doctor);
            $stmt->bindParam("hora", $req->hora);
            $stmt->bindParam("fecha_consulta", $req->fecha_consulta);
            $stmt->execute();
            $db = null;
            $answer = array('estatus' => 'ok', 'msj' => 'consulta modificada exitosamente.');
        } catch(PDOException $e) {
            $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
        }
        echo json_encode($answer);
    }

    function putDetalleConsulta() {
        $request = \Slim\Slim::getInstance()->request();
        $req = json_decode($request->getBody());
        $sql = "UPDATE detalle_consulta SET id_consulta=:id_consulta, motivo=:motivo, sintomas=:sintomas, diagnostico=:diagnostico, medicamento=:medicamento, total_consulta=:total_consulta WHERE id_detalle_consulta='$req->id_detalle_consulta'";
        try {
            $db = getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id_consulta", $req->id_consulta);
            $stmt->bindParam("motivo", $req->motivo);
            $stmt->bindParam("sintomas", $req->sintomas);
            $stmt->bindParam("diagnostico", $req->diagnostico);
            $stmt->bindParam("medicamento", $req->medicamento);
            $stmt->bindParam("total_consulta", $req->total_consulta);
            $stmt->execute();
            $db = null;
            $answer = array('estatus' => 'ok', 'msj' => 'detalle de consulta modificada exitosamente.');
        } catch(PDOException $e) {
            $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
        }
        echo json_encode($answer);
    }


 ?>
