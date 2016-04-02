<?php

    function putDoctor() {
        $request = \Slim\Slim::getInstance()->request();
        $req = json_decode($request->getBody());
        $sql = "UPDATE doctores SET id_especialidad=:id_especialidad, nombre_doc=:nombre_doc, paterno_doc=:paterno_doc, materno_doc=:materno_doc, telefono_doc=:telefono_doc, correo_doc=:correo_doc WHERE id_doctor='$req->id_doctor'";
        try {
            $db = getConnection();
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id_especialidad", $req->id_especialidad);
            $stmt->bindParam("nombre_doc", $req->nombre_doc);
            $stmt->bindParam("paterno_doc", $req->paterno_doc);
            $stmt->bindParam("materno_doc", $req->materno_doc);
            $stmt->bindParam("telefono_doc", $req->telefono_doc);
            $stmt->bindParam("correo_doc", $req->correo_doc);
            $stmt->execute();
            $db = null;
            $answer = array('estatus' => 'ok', 'msj' => 'doctor modificado exitosamente.');
        } catch(PDOException $e) {
            $answer = array('estatus'=>'error', 'msj' =>  $e->getMessage());
        }
        echo json_encode($answer);
    }

 ?>
