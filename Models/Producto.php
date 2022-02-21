<?php
    class Producto extends Conectar{
        public function get_producto(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tmp_producto WHERE esta = 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_producto_x_id($prod_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tmp_producto WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function delete_producto_x_id($prod_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tmp_producto
                    SET esta = 0,
                    fetch_elim = now()
                    WHERE prod_id = ? ";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function insertar_producto($prod_nom){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = " INSERT INTO tmp_producto 
                    (prod_id, prod_nom, fech_crea, fech_modi, fech_elim, est) 
                    VALUES 
                    (NULL, ?, now(), NULL, NULL, '1');";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
        public function update_producto($prod_id,$prod_nom){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tmp_producto SET prod_nom = ? ,fetch_modi = now() WHERE prod_id = ? ";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->bindValue(1,$prod_nom);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }
?>