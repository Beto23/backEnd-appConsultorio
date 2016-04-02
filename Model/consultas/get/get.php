<?php 
    function getAllConsultas() { 
        $sql_query = "SELECT consultas.id_consulta, pacientes.nombre_pac, pacientes.paterno_pac, pacientes.materno_pac, doctores.nombre_doc, doctores.paterno_doc, doctores.materno_doc, consultas.hora, consultas.fecha_consulta FROM doctores, consultas, pacientes WHERE consultas.id_doctor = doctores.id_doctor 
        AND consultas.id_paciente = pacientes.id_paciente";
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
