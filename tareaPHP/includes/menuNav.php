<?php
require "loginModal.php";

/*
require "operacionesBD.php";

$conexion = mysqli_connect("localhost", "root", "root", "tareaphp");


$proveedores = listarProveedores($conexion);


$recursos = listarTodosRecursos($conexion);


$resultado = array_merge($proveedores, $recursos);
*/

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
        
            
                <div class="navbar-form navbar-left">
                    <div class="form-group">
                      <input list="busqueda" type="text" class="form-control" name="buscar" placeholder="Buscar recursos o proveedores">
                      <datalist id="busqueda">
                          
                      </datalist>
                    </div>
                    
                </div>
<?php
                if(!isset($_SESSION["nombre"])){    //si es visitante
                    
?>
                
                
            
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/tareaPHP/web/registro.php">Registro</a></li>
                <!--    <li><a href="/tareaPHP/web/login.php">Login</a></li>    -->
                    <li><a data-toggle="modal" data-target="#modal-login" style="cursor: pointer;">Login</a></li>
                </ul>
<?php
                }
                if(isset($_SESSION["nombre"]) && $_SESSION["esProveedor"]==true){    //si es proveedor
?>
                
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recursos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/tareaPHP/web/misRecursosPublicados.php">Mis recursos publicados</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../web/crearRecurso.php">Crear nuevo recurso</a></li>
                    </ul>
                </li>
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
                <ul class="nav navbar-nav">
                    <li><a href="/tareaPHP/web/misRecursosObtenidos.php">Ver mis recursos obtenidos</a></li>
                    <li><a href="/tareaPHP/web/verSuscripcion.php">Ver mi suscripción</a></li>
                </ul>
                
                
                
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
                
               
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/tareaPHP/web/listarClientes.php">Listar clientes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/tareaPHP/web/listarProveedores.php">Listar proveedores</a></li>
                        </ul>
                        
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestionar<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/tareaPHP/web/actualizarPreciosSuscripciones.php">Precios suscripciones</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/tareaPHP/web/gestionarCategorias.php">Gestionar categorias</a></li>
                        </ul>
                        
                    </li>
                </ul>
                
              
                
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




<!-- script para el modal -->
                <script>
                        $(function(){
                                $('#modal-login').on('click', function(){
                                        $( '#' + $(this).data('modal-id') ).modal();
                                });
                                
                                
                                $('input[name=buscar]').on("input", function(){
                                    var palabra = $('#name').val();
                                    $.ajax({
                                        type:"GET",
                                        url: "/tareaPHP/ajax/inputBuscar.php",
                                        data:{"palabra": palabra},
                                        cache: false,
                                        success:function(resp){
                                            if(resp!=null){
                                                
                                                var lista = JSON.parse(resp);
                                                var i;
                                                
                                                $('#busqueda').empty();
                                                for(i=0; i<lista['proveedoresYrecursos'].length; i++){
                                                    $('#busqueda').append('<option value="'+ lista['proveedoresYrecursos'][i] +'" label="'+ lista['tipos'][i] +'"></option>');
                                                    
                                                }
                                                
                                                
                                            }
                                            else{
                                                $('#busqueda').append("<option>No hay resultados para mostrar</option>");
                                            }
                                        },
                                        error: function(jqXHR, estado, error){
                                            console.log(estado);
                                            console.log(error);
                                        },
                                        complete: function(jqXHR, estado){
                                                          console.log(estado);
                                                        },
                                        timeout: 10000
                                    })

                                });
                                
                                
                        });
                </script>

<style>

.navbar-inverse .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
        font-family: rockwell;
        color: #a4fae7;
        background-color: #666666;
        transition: all 0.3s ease;
}



</style>