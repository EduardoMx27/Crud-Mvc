<?php

class Conectar{
    //nOMBRE DE LA CONEXION
    protected $dbh;
    //FUNCION PARA LA CONEXION
    protected function conexion(){
        //COMPROBACION DE LA CONEXION
        try {
            $conectar = $this->dbh = new PDO("mysql:local:localhost,dbname=crud","root","");
            return $conectar;
        } catch (Exception $e) { //RETORNO DE ERROR EN LA CONEXION
            print "!Error no hay conexion a la BD" . $e->getMessage() . "</br>";
            die();
        }
    }
    //=======CADENA DE CARACTERES ESPECIALES============//
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>