<?php 
$id=(isset($_POST['id']))?$_POST['id']:"";
$fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
$encargado=(isset($_POST['encargado']))?$_POST['encargado']:"";
$entrega_fecha=(isset($_POST['entrega_fecha']))?$_POST['entrega_fecha']:"";
$observaciones=(isset($_POST['observaciones']))?$_POST['observaciones']:"";
$id_proveedor=(isset($_POST['id_proveedor']))?$_POST['id_proveedor']:"";


$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

$con=mysqli_connect("localhost","root","","cherry_adminlte");
                // Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

switch ($accion) {
  case 'btnAgregar':

    if($fecha=="="){
      $error['fecha']="Escribe el fecha";
    }
    if($encargado==""){
      $error['encargado']="Escribe el encargado";
    }
    if($entrega_fecha==""){
      $error['entrega_fecha']="Escribe el entrega_fecha";
    }
    if($observaciones==""){
      $error['observaciones']="Escribe el observaciones";
    }
    if($id_proveedor==""){
      $error['id_proveedor']="Escribe el id_proveedor";
    }

    if(count($error)>1){
      $mostrarModal=true;
      break;
    }

    $sentencia=$con->prepare("INSERT INTO compras(fecha,encargado,entrega_fecha,observaciones,id_proveedor) 
    VALUES ('$fecha','$encargado','$entrega_fecha','$observaciones','$id_proveedor')");

    $sentencia->execute();
    break;

  case 'btnModificar':

    $sentencia=$con->prepare("UPDATE compras SET fecha='$fecha',encargado='$encargado',entrega_fecha='$entrega_fecha',observaciones='$observaciones',id_proveedor='$id_proveedor' WHERE id='$id'");

    $sentencia->execute();

    break;

  case 'btnEliminar':
    $sentencia=$con->prepare("DELETE FROM compras WHERE id='$id'");

    $sentencia->execute();

    break;

  case 'btnCancelar':
    break;

  case 'Seleccionar':
    $accionAgregar="disabled";
    $accionModificar=$accionEliminar=$accionCancelar="";
    $mostrarModal=true;
  break;
}

    /*$sentencia = $pdo->prepare("SELECT * FROM `compras` WHERE 1");
    $sentencia->execute();
    $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
*/
    #print_r($listaEmpleados);
 ?>