<?php

include_once 'App/config.php';


class modeloDB {
    
    private static $dbh = null;
    private static $select_user = "Select * from empleados where EMP_NO = ? and CLAVE = ?";
    private static $select_reservas = "Select * from reserva";
    private static $insert_event = "INSERT INTO reserva (title,descripcion,color,start,sala_no,emp_no,hora,dia) VALUES (?,?,?,?,?,?,?,?)";  
    private static $select_salas = "Select * from salas";
    private static $update_salas = "SELECT * FROM salas WHERE sala_no not in (select sala_no from reserva where dia = ? AND hora=?)";
    public static function init(){
        
        if (self::$dbh == null){
            try {
                // Cambiar  los valores de las constantes en config.php
                $dsn = "mysql:host=". DBSERVER  .";dbname=". DBNAME .";charset=utf8";
                self::$dbh = new PDO($dsn, DBUSER, DBPASSWORD);
                // Si se produce un error se genera una excepci�n;
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                echo "Error de conexi�n ".$e->getMessage();
                exit();
            }
            
        }
    }
    //-------FUNCION PARA VALIDAR USUARIO-------
    public static function OkUser($user,$password){
        $solucion = false;
        $stmt = self::$dbh->prepare(self::$select_user);
        $stmt->bindValue(1,$user);
        $stmt->bindValue(2,$password);
        $stmt->execute();
        if ($stmt->rowCount() > 0 ){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $fila = $stmt->fetch();
            $solucion = true;
        }
        return $solucion;
    }
  
    
    //-------FUNCION PARA VOLCAR DATOS en el calendario -------
    
    public static function recoverData(){
        
        $stmt = self::$dbh->prepare(self::$select_reservas);
        $stmt->execute();
        $solucion = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        
        $reservas_string = json_encode($solucion);
        
        $file = 'App/dat/reserva.json';
        file_put_contents($file, $reservas_string);
      
        return $file;
    }
    
    public static function getRoom(){
        
        $stmt = self::$dbh->prepare(self::$select_salas);
        $stmt->execute();
       
        $tSalaVista = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ( $fila = $stmt->fetch()){
            $datosala = [
                $fila['SALA_NO'],
                $fila['TIPO']
            ];
            $tSalaVista[$fila['SALA_NO']] = $datosala;
        }
        return $tSalaVista;
   
    }
    
    public static function availableRoom($dia,$hora){
        $stmt = self::$dbh->prepare(self::$update_salas);
        $stmt->bindValue(1,$dia);
        $stmt->bindValue(2,$hora);
        $stmt->execute();
        
        $tSalaVista = [];
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ( $fila = $stmt->fetch()){
            $datosala = [
                $fila['SALA_NO'],
                $fila['TIPO']
            ];
            $tSalaVista[$fila['SALA_NO']] = $datosala;
        }
        return $tSalaVista;
        
    }
    
    //------- Agregar reserva a la base de datos ------
    public static function saveEvent($evento,$user,$n_salas):bool{
        $stmt = self::$dbh->prepare(self::$insert_event);
        $stmt->bindValue(1,$evento[0]);
        $stmt->bindValue(2,$evento[1]);
        $stmt->bindValue(3,$evento[2]);
        $stmt->bindValue(4,$evento[3]);
        $stmt->bindValue(5,$n_salas);
        $stmt->bindValue(6,$user);
        $stmt->bindValue(7,$evento[4]);
        $stmt->bindValue(8,$evento[5]);

        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    //-------FUNCION PARA CERRAR LA BASE DE DATOS------
    public static function closeDB(){
        self::$dbh = null;
    }
    
}



?>