<?php
     header('Content-type: application/json');

     require_once("../config/conexion.php");
     require_once("../models/Pedidos.php");
     $pedidos = new pedidos();

     $body = json_decode(file_get_contents("php://input"), true);

     switch ($_GET["op"]) {

        case "GetPedidos":
           $datos=$pedidos->get_pedidos();
           echo json_encode($datos);
        break;      
    
        case "GetUno":
           $datos=$pedidos->get_pedido($body["ID"]);
           echo json_encode($datos);
        break;

        case "InsertPedidos":
           $datos=$pedidos->insert_Pedidos($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
           echo json_encode("Pedido agregado");
        break;

        case "DeletePedidos":
           $datos=$pedidos->delete_Pedidos($body["ID"]);
           echo json_encode("Pedido eliminado");
        break;

        case "UpdatePedidos":
           $datos=$pedidos->update_Pedidos($body["ID"],$body["ID_SOCIO"],$body["FECHA_PEDIDO"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_ENTREGA"],$body["ESTADO"]);
           echo json_encode("Pedido actualizado");
        break;
    }
?>