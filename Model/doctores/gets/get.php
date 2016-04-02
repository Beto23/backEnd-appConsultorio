<?php 

    function getEspecialidadByDoctores() { 
        $sql_query = "SELECT doctores.id_doctor, doctores.nombre, especialidad_doctor.especialidad FROM especialidad_doctor, doctores WHERE doctores.id_especialidad = especialidad_doctor.id_especialidad";
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
