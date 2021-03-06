<?php
session_start();

//si no está logueado o si el usuario no es admin
if(!isset($_SESSION["idUsuario"]) || $_SESSION["idUsuario"]!=1){
    header("Location: ../index.php");
}


require '../includes/header.php';

require '../includes/menuNav.php';
require '../includes/operacionesBD.php';

$conexion = conectarBD();

$listaClientes = listarClientes($conexion);


?>

<div class="table-responsive">
    <?php
        if($listaClientes != NULL){
    ?>
    <table id="tablaClientes" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nick</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>E-mail</th>
            <th>Ver detalles</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($listaClientes as $cliente) {
          ?>
            <tr class="clickable-row">
            <td><?php echo "$cliente[1]" ?></td>
            <td><?php echo "$cliente[4]" ?></td>
            <td><?php echo "$cliente[5]" ?></td>
            <td><?php echo "$cliente[2]" ?></td>
            <td><a href="verClienteConRecursos.php?id=<?php echo $cliente[0] ?>" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-zoom-in"></span></a></td>
          </tr>
          <?php
          }
          ?>
          
        </tbody>
    </table>
    <?php
        }
        else{
            echo "<h3>Aún no se ha registrado ningún cliente</h3>";
        }
    ?>
</div>

<?php
require '../includes/footer.php';