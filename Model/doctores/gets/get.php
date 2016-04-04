<?php 

    function getEspecialidadByDoctores() { 
        $sql_query = "SELECT doctores.id_doctor, doctores.nombre_doc, doctores.paterno_doc, doctores.materno_doc, doctores.telefono_doc, doctores.correo_doc, especialidad_doctor.especialidad, especialidad_doctor.id_especialidad FROM especialidad_doctor, doctores WHERE doctores.id_especialidad = especialidad_doctor.id_especialidad";
            try {
                $dbCon = getConnection();
                $stmt   = $dbCon->query($sql_query);
                $data  = $stmt->fetchAll(PDO::FETCH_OBJ);
                $dbCon = null;
                echo json_encode($data);
            } 
            catch(PDOException $e) {
                $answer = array( 'error' =>  $e->getMessage());
            echo json_encode($answer);
	    }
    }

    function getEspecialidades() { 
	   $sql_query = "SELECT * FROM especialidad_doctor";
	   try {
		$dbCon = getConnection();
		$stmt   = $dbCon->query($sql_query);
		$data  = $stmt->fetchAll(PDO::FETCH_OBJ);
		$dbCon = null;
		echo json_encode($data);
	   } 
	   catch(PDOException $e) {
		$answer = array( 'error' =>  $e->getMessage());
		echo json_encode($answer);
	   }
    } 
?>
