<?php 
$id=(isset($_POST['id']))?$_POST['id']:"";
$fecha_encargo=(isset($_POST['fecha_encargo']))?$_POST['fecha_encargo']:"";
$fecha_entrega=(isset($_POST['fecha_entrega']))?$_POST['fecha_entrega']:"";
$pago_adelantado=(isset($_POST['pago_adelantado']))?$_POST['pago_adelantado']:"";
$descripcion_encargo=(isset($_POST['descripcion_encargo']))?$_POST['descripcion_encargo']:"";
$ubicacion=(isset($_POST['ubicacion']))?$_POST['ubicacion']:"";
$nombre_cliente=(isset($_POST['nombre_cliente']))?$_POST['nombre_cliente']:"";

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

    if($fecha_encargo=="="){
      $error['fecha_encargo']="Escribe el fecha_encargo";
    }
    if($fecha_entrega==""){
      $error['fecha_entrega']="Escribe el fecha_entrega";
    }
    if($pago_adelantado==""){
      $error['pago_adelantado']="Escribe el pago_adelantado";
    }
    if($descripcion_encargo==""){
      $error['descripcion_encargo']="Escribe el descripcion_encargo";
    }
    if($ubicacion==""){
      $error['ubicacion']="Escribe el ubicacion";
    }
    if($nombre_cliente==""){
      $error['nombre_cliente']="Escribe el nombre_cliente";
    }
    if(count($error)>1){
      $mostrarModal=true;
      break;
    }

    $sentencia=$con->prepare("INSERT INTO contratos(fecha_encargo,fecha_entrega,pago_adelantado,descripcion_encargo,ubicacion,nombre_cliente) 
    VALUES ('$fecha_encargo','$fecha_entrega','$pago_adelantado','$descripcion_encargo','$ubicacion','$nombre_cliente')");

    $sentencia->execute();
    break;

  case 'btnModificar':

    $sentencia=$con->prepare("UPDATE contratos SET fecha_encargo='$fecha_encargo',fecha_entrega='$fecha_entrega',pago_adelantado='$pago_adelantado',descripcion_encargo='$descripcion_encargo',ubicacion='$ubicacion',nombre_cliente='$nombre_cliente' WHERE id='$id'");

    $sentencia->execute();

    break;

  case 'btnEliminar':
    $sentencia=$con->prepare("DELETE FROM contratos WHERE id='$id'");

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

    /*$sentencia = $pdo->prepare("SELECT * FROM `contratos` WHERE 1");
    $sentencia->execute();
    $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
*/
    #print_r($listaEmpleados);
 ?>