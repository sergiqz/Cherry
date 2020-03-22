<?php 
$id=(isset($_POST['id']))?$_POST['id']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$apellido=(isset($_POST['apellido']))?$_POST['apellido']:"";
$correo=(isset($_POST['correo']))?$_POST['correo']:"";
$telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
$usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
$contraseña=(isset($_POST['contraseña']))?$_POST['contraseña']:"";

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
    if($apellido==""){
      $error['apellido']="Escribe el apellido";
    }
    if($correo==""){
      $error['correo']="Escribe el correo";
    }
    if($telefono==""){
      $error['telefono']="Escribe el telefono";
    }
    if($usuario==""){
      $error['usuario']="Escribe el usuario";
    }
    if($contraseña==""){
      $error['contraseña']="Escribe el contraseña";
    }
    if(count($error)>0){
      $mostrarModal=true;
      break;
    }

    $sentencia=$con->prepare("INSERT INTO clientes(nombre,apellido,correo,telefono,usuario,contraseña) 
    VALUES ('$nombre','$apellido','$correo','$telefono','$usuario','$contraseña')");

    $sentencia->execute();
    break;

  case 'btnModificar':

    $sentencia=$con->prepare("UPDATE clientes SET nombre='$nombre',apellido='$apellido',correo='$correo',telefono='$telefono',usuario='$usuario',contraseña='$contraseña' WHERE id='$id'");

    $sentencia->execute();

    break;

  case 'btnEliminar':
    $sentencia=$con->prepare("DELETE FROM clientes WHERE id='$id'");

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

    /*$sentencia = $pdo->prepare("SELECT * FROM `clientes` WHERE 1");
    $sentencia->execute();
    $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);
*/
    #print_r($listaEmpleados);
 ?>