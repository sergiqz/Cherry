<?php 
$id=(isset($_POST['id']))?$_POST['id']:"";
$descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$marca=(isset($_POST['marca']))?$_POST['marca']:"";
$un_medida=(isset($_POST['un_medida']))?$_POST['un_medida']:"";
$un_dis=(isset($_POST['un_dis']))?$_POST['un_dis']:"";
$costo_un=(isset($_POST['costo_un']))?$_POST['costo_un']:"";
$id_categoria=(isset($_POST['id_categoria']))?$_POST['id_categoria']:"";


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

    if($descripcion=="="){
      $error['descripcion']="Escribe el descripcion";
    }
    if($marca==""){
      $error['marca']="Escribe el marca";
    }
    if($un_medida==""){
      $error['un_medida']="Escribe el un_medida";
    }
    if($un_dis==""){
      $error['un_dis']="Escribe el un_dis";
    }
    if($costo_un==""){
      $error['costo_un']="Escribe el costo_un";
    }
    if($id_categoria==""){
      $error['id_categoria']="Escribe el id_categoria";
    }


    if(count($error)>1){
      $mostrarModal=true;
      break;
    }

    $sentencia=$con->prepare("INSERT INTO productos(descripcion,marca,un_medida,un_dis,costo_un,id_categoria) 
    VALUES ('$descripcion','$marca','$un_medida','$un_dis','$costo_un','$id_categoria')");

    $sentencia->execute();
    break;

  case 'btnModificar':

    $sentencia=$con->prepare("UPDATE productos SET descripcion='$descripcion',marca='$marca',un_medida='$un_medida',un_dis='$un_dis',costo_un='$costo_un',id_categoria='$id_categoria'WHERE id='$id'");

    $sentencia->execute();

    break;

  case 'btnEliminar':
    $sentencia=$con->prepare("DELETE FROM productos WHERE id='$id'");

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