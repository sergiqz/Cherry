<?php 
$id=(isset($_POST['id']))?$_POST['id']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
$representante=(isset($_POST['representante']))?$_POST['representante']:"";
$telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";


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

    if($nombre=="="){
      $error['nombre']="Escribe el nombre";
    }
    if($direccion==""){
      $error['direccion']="Escribe el direccion";
    }
    if($representante==""){
      $error['representante']="Escribe el representante";
    }
    if($telefono==""){
      $error['telefono']="Escribe el telefono";
    }


    if(count($error)>1){
      $mostrarModal=true;
      break;
    }

    $sentencia=$con->prepare("INSERT INTO proveedores(nombre,direccion,representante,telefono) 
    VALUES ('$nombre','$direccion','$representante','$telefono')");

    $sentencia->execute();
    break;

  case 'btnModificar':

    $sentencia=$con->prepare("UPDATE proveedores SET nombre='$nombre',direccion='$direccion',representante='$representante',telefono='$telefono' WHERE id='$id'");

    $sentencia->execute();

    break;

  case 'btnEliminar':
    $sentencia=$con->prepare("DELETE FROM proveedores WHERE id='$id'");

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


 ?>