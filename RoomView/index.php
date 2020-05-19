<?php 
session_start();
include_once 'App/config.php';
include_once 'App/modelo/modeloDB.php';
include_once 'App/controlador/controladorEmpleados.php';

modeloDB::init();

$path=[
    "Inicio"     => "ctlInicio",
    "Cerrar"     => "ctlCerrar",
    "VerReserva" => "ctlVerReserva",
    "ElegirSala" => "ctlElegirSala",
    "Agregar"    => "ctlAgregar",
    "Modificar"  => "ctlModificar",
    "Borrar"     => "ctlBorrar"
];

if (!isset($_SESSION['user'])){
    $procRuta = "ctlInicio";
}else {
    if(isset($_GET['orden'])){
        // La orden tiene una funcion asociada
        if ( isset ($path[$_GET['orden']]) ){
            $procRuta = $path[$_GET['orden']];
        }else {
            header('Status: 404 Not Found');
            echo '<html><body><h1>Error 404: No existe la ruta <i>' . $_GET['ctl'] . '</p></body></html>';
            exit;
           
            // Error no existe funci�n para la rutaa
        }
        
   }else{
        
        $procRuta = "ctlVerReserva"; 
    }
}

if (isset($_GET['msg'])){
    $msg = $_GET['msg'];
}
$procRuta();

?>