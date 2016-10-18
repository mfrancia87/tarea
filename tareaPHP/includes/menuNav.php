<?php
require "loginModal.php";
?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="font-family: rockwell;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#opciones">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="/tareaPHP/index.php">Inicio</a>
        </div>
        <div class="collapse navbar-collapse" id="opciones">
        <ul class="nav navbar-nav">
            
            <?php
                if(!isset($_SESSION["nombre"])){    //si es visitante
                    
            ?>  
                <li><a href="/tareaPHP/web/listarRecursos.php">Ver recursos</a></li>
                </ul>
            
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar recursos">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/tareaPHP/web/registro.php">Registro</a></li>
                    <li><a href="/tareaPHP/web/login.php">Login</a></li>
                    <li><a data-toggle="modal" data-target="#modal-login">Login</a></li>
                </ul>
            <?php
                }
                if(isset($_SESSION["nombre"]) && $_SESSION["esProveedor"]==true){    //si es proveedor
            ?>
                <li><a href="/tareaPHP/web/listarRecursos.php">Ver recursos</a></li>
                <li><a href="/tareaPHP/web/misRecursosPublicados.php">Ver mis recursos publicados</a></li>
                </ul>
                
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar recursos">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
                
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/tareaPHP/web/perfil.php">Ver mi perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/tareaPHP/web/logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
                </ul>
                
                
                
            <?php
            }
                if(isset($_SESSION["nombre"]) && $_SESSION["esProveedor"]==false && ($_SESSION["idUsuario"]!=1)){    //si es cliente
            ?>
                <li><a href="/tareaPHP/web/listarRecursos.php">Ver recursos</a></li>
                <li><a href="/tareaPHP/web/misRecursosObtenidos.php">Ver mis recursos obtenidos</a></li>
                <li><a href="/tareaPHP/web/verSuscripcion.php">Ver mi suscripción</a></li>
                </ul>
                
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar recursos">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
                
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/tareaPHP/web/perfil.php">Ver mi perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/tareaPHP/web/logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
                </ul>
            
            <?php
                }
                if(isset($_SESSION["nombre"]) && $_SESSION["idUsuario"]==1){    //si es  administrador
            ?>
                <li><a href="/tareaPHP/web/listarRecursos.php">Ver recursos</a></li>
                <li><a href="/tareaPHP/web/actualizarPreciosSuscripciones.php">Precios suscripciones</a></li>
                <li><a href="/tareaPHP/web/gestionarCategorias.php">Gestionar categorias</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/tareaPHP/web/listarClientes.php">Listar clientes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/tareaPHP/web/listarProveedores.php">Listar proveedores</a></li>
                        </ul>
                        
                    </li>
                </ul>
                
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar recursos">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
                
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/tareaPHP/web/perfil.php">Ver mi perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/tareaPHP/web/logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
                </ul>
            <?php
                }
            ?>
        
        </div>
    </div>
</nav>

<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h3 class="modal-title" id="modal-login-label">Login</h3>
                <p>Ingrese su nombre de usuario y contraseña:</p>
            </div>
            <div class="modal-body">
                <form method="post" action="../phpScripts/login.php">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="nick">Nick:</label>
                        <input type="text" class="form-control" name="nick" required autofocus>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="pass">Contraseña:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success" style="float: right;">Login</button>`
                </form> 
                
            </div>
        </div>
    </div>
</div> <!-- modal -->


<!-- script para el modal -->
                <script>
                        $(function(){
                                $('#modal-login').on('click', function(e){
                                        e.preventDefault();
                                        $( '#' + $(this).data('modal-id') ).modal();
                                });
                        });
                </script>

<style>

.navbar-inverse .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
        font-family: rockwell;
        color: #a4fae7;
}
</style>