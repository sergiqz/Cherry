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
            <label for="">descripcion:</label>                  
            <input type="text" class="form-control <?php echo ( isset($error['descripcion']))?"is-invalid":"";?>" required name="descripcion" value="<?php echo $descripcion; ?>" placeholder="" id="txt2" require="">
            <div class="invalid-feedback">
              <?php echo ( isset($error['descripcion']))?$error['descripcion']:"";?>
            </div>
            <br>
            </div>
            <div class="form-group col-md-6">
            <label for="">marca:</label>
            <input type="text" class="form-control <?php echo ( isset($error['marca']))?"is-invalid":"";?>" required name="marca" value="<?php echo $marca; ?>" placeholder="" id="txt3" require="">
            <div class="invalid-feedback">
              <?php echo ( isset($error['marca']))?$error['marca']:"";?>
            </div>
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">un_medida:</label>
            <input type="text" class="form-control" required name="un_medida" value="<?php echo $un_medida; ?>" placeholder="" id="txt4" require="">
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">un_dis:</label>
            <input type="text" class="form-control" required name="un_dis" value="<?php echo $un_dis; ?>" placeholder="" id="txt5" require="">
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">costo_un:</label>
            <input type="number" class="form-control" required name="costo_un" value="<?php echo $costo_un; ?>" placeholder="" id="txt5" require="">
            <br>
            </div>
            <div class="form-group col-md-12">
            <label for="">id_categoria:</label>
            <input type="number" class="form-control" required name="id_categoria" value="<?php echo $id_categoria; ?>" placeholder="" id="txt5" require="">
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
                  <th>descripcion</th>
                  <th>marca</th>
                  <th>un_medida</th>
                  <th>un_dis</th>
                  <th>costo_un</th>
                  <th>Categoria</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                $con=mysqli_connect("localhost","root","","cherry_adminlte");
                // Check connection
                if (mysqli_connect_errno())
                { echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $result = mysqli_query($con,"SELECT * FROM productos");
                

                

                while($row = mysqli_fetch_array($result))
                {?>
                <tr>
                <td><?php echo $row['descripcion']; ?> </td>
                <td><?php echo $row['marca']; ?></td>
                <td><?php echo $row['un_medida']; ?></td>
                <td><?php echo $row['un_dis']; ?></td>
                <td><?php echo $row['costo_un']; ?></td>
                <td><?php echo $row['id_categoria']; ?></td>

             
                <td>
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $row['descripcion']; ?>">
                    <input type="hidden" name="marca" value="<?php echo $row['marca']; ?>">
                    <input type="hidden" name="un_medida" value="<?php echo $row['un_medida']; ?>">
                    <input type="hidden" name="un_dis" value="<?php echo $row['un_dis']; ?>">
                    <input type="hidden" name="costo_un" value="<?php echo $row['costo_un']; ?>">
                    <input type="hidden" name="id_categoria" value="<?php echo $row['id_categoria']; ?>">

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
                <th>descripcion</th>
                  <th>marca</th>
                  <th>un_medida</th>
                  <th>un_dis</th>
                  <th>costo_un</th>
                  <th>Categoria</th>
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