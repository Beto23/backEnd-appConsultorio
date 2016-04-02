<?php
  require 'Slim/Slim.php';
  require './Config/db.php';
  require './Model/doctores/doctores.php';
  require './Model/pacientes/pacientes.php';
  require './Model/consultas/consultas.php';

  \Slim\Slim::registerAutoloader();
  $app = new \Slim\Slim();
  header('Access-Control-Allow-Origin: *');
  // Allow from any origin
      if (isset($_SERVER['HTTP_ORIGIN'])) {
          header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
          header('Access-Control-Allow-Credentials: true');
          header('Access-Control-Max-Age: 0');    // cache for 1 day
      }
      // Access-Control headers are received during OPTIONS requests
      if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
              header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
          if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
              header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
      }

$app->post('/postDoctores','postDoctores');
$app->post('/postEspecialidad','postEspecialidad');
$app->post('/postPacientes','postPacientes');
$app->post('/postConsultas','postConsultas');



$app->put('/putDoctor','putDoctor');
$app->delete('/deleteDoctor', 'deleteDoctor');
$app->delete('/deleteEspecialidad', 'deleteEspecialidad');
$app->delete('/deletePaciente', 'deletePaciente');
$app->delete('/deleteConsulta', 'deleteConsulta');


$app->run();


 ?>