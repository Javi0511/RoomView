<?php

// -------Controlador que realiza la reserva de salas--------

include_once 'App/config.php';
include_once 'App/modelo/modeloDB.php';


//-----Inicio Muestra o procesa el formulario (POST)------

function ctlInicio(){
    modeloDB::init();
    $msg = "";
    $user ="";
    $password ="";
    $disabled="";
    if ( $_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['user']) && isset($_POST['password'])){
            $user =$_POST['user'];
            $password=$_POST['password'];
            if ( modeloDB::OkUser($user,$password)){
                
                $_SESSION['user'] = $user;
                $_SESSION['tipo']=modeloDB::GetTipoEmpleado($user, $password);
                header('Location:index.php?orden=VerReserva');
                }
               
            else {
                $msg="Error: usuario y contrase�a no v�lidos.";
                
                include_once 'App/plantilla/principal.php';
                session_destroy();
            }
        }

    }else{
    include_once 'App/plantilla/principal.php';
    }   
}


function ctlVerReserva(){
    modeloDB::recoverData();
    $salas=modeloDB::GetRoom();
    
    if($_SESSION['tipo']=="ADMIN"){
        include_once 'App/plantilla/reservaAdmin.php'; 
     
    }else{
        include_once 'App/plantilla/reservaEmpleado.php'; 
    }
  
       
}

function ctlAgregar(){        
        $n_sala= $_POST['salas'];
        $evento =$_SESSION['evento'];
            if(modeloDB::saveEvent($evento,$_SESSION['user'],$n_sala)){
               
                $msg="";
                
                header('Location:index.php?orden=VerReserva');
               
                
            }

}

function ctlElegirSala(){
    $msg = "";
    $fecha = "";
    $titulo = "";
    $hora = "";
    $descripcion = "";
    $color = "";
    $user="";
    $disabled="";

    
    if (isset($_POST['txtFecha']) && isset($_POST['txtTitulo']) && isset($_POST['txtHora'])) {
        
        $titulo = $_POST['txtTitulo'];
        
        
        $start = $_POST['txtFecha']." ".$_POST['txtHora'];
        $descripcion = $_POST['txtDescripcion'];
        $color = $_POST['txtColor'];
        
        $evento = [
            $titulo,
            $descripcion,
            $color,
            $start,
            $_POST['txtHora'],
            $_POST['txtFecha']
            
            
        ];
        $salas= modeloDB::availableRoom( $_POST['txtFecha'],$_POST['txtHora']);
        
        $_SESSION['evento']=$evento;
        $msg="Selecciona una sala para completar su reserva.";
        include_once 'App/plantilla/reservaEmpleado.php';
        
        
    } else {
        
        header('Location:index.php?orden=VerReserva');
    }
    
}

function ctlModificar(){
   
    $msg = "";
    $id="";
    $fecha = "";
    $titulo = "";
    $hora = "";
    $descripcion = "";
    $color = "";
    $user="";
    $disabled="";
    
    if (isset($_POST['txtID']) && isset($_POST['txtFecha']) && isset($_POST['txtTitulo']) && isset($_POST['txtHora'])) {        
        $id=$_POST['txtID'];
        $titulo = $_POST['txtTitulo'];
        $start = $_POST['txtFecha']." ".$_POST['txtHora'];
        $descripcion = $_POST['txtDescripcion'];
        $color = $_POST['txtColor'];
        $hora=$_POST['txtHora'];
        $dia=$_POST['txtFecha'];
        $sala_no=$_POST['txtSala'];
        $user=$_SESSION['user'];

        $evento = [
            $id,
            $titulo,
            $descripcion,
            $color,
            $start,
            $sala_no,
            $user,
            $hora,
            $dia             
        ];
       
        if(modeloDB::checkRoom($dia, $hora,$sala_no)){
            modeloDB::updateReserva($evento);
       
            
            header('Location:index.php?orden=VerReserva');
        }else{
            $msg="La sala esta ocupada a esa hora";
            //Hacer que aparezca el error solo en el que modificas
        }
        
        
        
        
        
    } else {
       
        header('Location:index.php?orden=VerReserva');
        
    }
}

function ctlBorrar(){
    if (isset($_GET['id'])){
        $id= $_GET['id'];
        
        if( modeloDB::reservaDel($id)){
            header('Location:index.php?orden=VerReserva');
        }
    }
    
}
//--------Cierra la sesi�n--------
function ctlCerrar(){
    session_destroy();
    modeloDB::closeDB();
    header('Location:index.php');
}



?>