<?php 
$id=(isset($_POST['id']))?$_POST['id']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
$estado=(isset($_POST['estado']))?$_POST['estado']:"";

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
    if($descripcion==""){
      $error['descripcion']="Escribe el descripcion";
    }
    if($estado==""){
      $error['estado']="Escribe el estado";
    }

    if(count($error)>0){
      $mostrarModal=true;
      break;
    }

    $sentencia=$con->prepare("INSERT INTO categorias(nombre,descripcion,estado) 
    VALUES ('$nombre','$descripcion','$estado')");

    $sentencia->execute();
    break;

  case 'btnModificar':

    $sentencia=$con->prepare("UPDATE categorias SET nombre='$nombre',descripcion='$descripcion',estado='$estado' WHERE id='$id'");

    $sentencia->execute();

    break;

  case 'btnEliminar':
    $sentencia=$con->prepare("DELETE FROM categorias WHERE id='$id'");

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

    /*$sentencia = $pdo->prepare("SELECT * FROM `categorias` WHERE 1");
    $sentencia->execute();
    $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
*/
    #print_r($listaEmpleados);
 ?>