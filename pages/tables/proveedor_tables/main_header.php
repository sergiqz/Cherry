<!-- Content Header (Page header) -->
<?php
  require 'buttons.php'
?>
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="" method="post">
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-row">
                  <input type="hidden" required name="id" value="<?php echo $id; ?>" placeholder="" id="txt1" require="">
            <div class="form-group col-md-6">
            <label for="">nombre:</label>                  
            <input type="text" class="form-control <?php echo ( isset($error['nombre']))?"is-invalid":"";?>" required name="nombre" value="<?php echo $nombre; ?>" placeholder="" id="txt2" require="">
            <div class="invalid-feedback">
              <?php echo ( isset($error['nombre']))?$error['nombre']:"";?>
            </div>
            <br>
            </div>
            <div class="form-group col-md-6">
            <label for="">direccion:</label>
            <input type="text" class="form-control <?php echo ( isset($error['direccion']))?"is-invalid":"";?>" required name="direccion" value="<?php echo $direccion; ?>" placeholder="" id="txt3" require="">
            <div class="invalid-feedback">
              <?php echo ( isset($error['direccion']))?$error['direccion']:"";?>
            </div>
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">representante:</label>
            <input type="text" class="form-control" required name="representante" value="<?php echo $representante; ?>" placeholder="" id="txt4" require="">
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">telefono:</label>
            <input type="number" class="form-control" required name="telefono" value="<?php echo $telefono; ?>" placeholder="" id="txt5" require="">
            <br>
            </div>



                </div>
              </div>
              <div class="modal-footer">
                <button value="btnAgregar" <?php echo $accionAgregar; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
            <button value="btnModificar" <?php echo $accionModificar; ?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
            <button value="btnEliminar" onclick="return Confirmar('¿Realmente deseas eliminar este ubicacion?');" <?php echo $accionEliminar; ?> class="btn btn-danger" type="submit"  name="accion">Eliminar</button>
            <button value="btnCancelar" <?php echo $accionCancelar; ?> class="btn btn-primary" type="" name="accion">Cancelar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->
        <br>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Agregar registro
        </button>
        <br>
        <br>  

      </form>


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Direccion</th>
                  <th>Representante</th>
                  <th>Telefono</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $con=mysqli_connect("localhost","root","","cherry_adminlte");
                // Check connection
                if (mysqli_connect_errno())
                { echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $result = mysqli_query($con,"SELECT * FROM proveedores");
                

                

                while($row = mysqli_fetch_array($result))
                {?>
                <tr>
                <td><?php echo $row['nombre']; ?> </td>
                <td><?php echo $row['direccion']; ?></td>
                <td><?php echo $row['representante']; ?></td>
                <td><?php echo $row['telefono']; ?></td>


             
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="direccion" value="<?php echo $row['direccion']; ?>">
                    <input type="hidden" name="representante" value="<?php echo $row['representante']; ?>">
                    <input type="hidden" name="telefono" value="<?php echo $row['telefono']; ?>">

                    <input class="btn btn-primary" type="submit" value="Seleccionar" name="accion">
                    <button class="btn btn-danger" onclick="return Confirmar('¿Realmente deseas eliminar este ubicacion?');" value="btnEliminar" type="submit" name="accion">Eliminar</button>
                  </form>
                  
                </td>
              </tr>;
         <?php       }

                mysqli_close($con);
                ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Fecha encargo</th>
                  <th>Fecha entrega</th>
                  <th>Pago</th>
                  <th>Descripcion</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <?php if ($mostrarModal) {?>
              <script type="text/javascript">
                  $('#exampleModal').modal('show');
                </script>
              <?php } ?>
              <script type="text/javascript">
                function Confirmar(Mensaje){
                  return(confirm(Mensaje))?true:false;
                }

              </script>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->