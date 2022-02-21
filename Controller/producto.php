<?php
    require_once("../Config/conexion.php");
    require_once("../Models/Producto.php");
    $productos = new Producto();

    switch ($_GET["op"]) {
        case 'listar':
            $datos = $producto->get_producto();
            $data = array();
            foreach ($dato as $row) {
                $subarray = $array();
                $subarray = $row["prod_nom"];
                $subarray[] = '<button type="button" onclick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $subarray[] = '<button type="button" onclick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-trash"></i></div></button>';
            }
            break;
            $result = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_decode($results);
            break;
    }
?>