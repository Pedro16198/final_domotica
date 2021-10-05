<?php
include '../funciones.php';
include '../conexion.php';
//Listado Roles
$query = "SELECT * FROM usu_roles";
$result = $conn->prepare($query);
$result->execute();
$resultSet = $result->get_result();       
$listado_roles = $resultSet->fetch_all(PDO::FETCH_ASSOC);
// var_dump($listado_roles);
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Usuarios</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" <?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?> ">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href=" <?php echo base_url('css/main.css') ?>">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/datatables/datatables.min.css') ?> "/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href=" <?php echo base_url('assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') ?> ">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  
  </head>
    
  <body> 
     <header>
     <h3 class='text-center'></h3>
     </header>    
      
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>    
            </div>    
        </div>    
    </div>    
    <br>  

    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>                                
                            <th>Correo</th>  
                            <th>Telefono</th>
                            <th>DNI</th>
                            <th>Password</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="" class="col-form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono">
                        </div>               
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="" class="col-form-label">DNI</label>
                        <input type="text" class="form-control" id="dni">
                        </div>
                    </div>
                    <div class="col-lg-4">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Rol</label>
                        <select id="id_rol" class="form-control">
                            <option selected disabled>Seleccionar</option>
                            <?php if(!empty($listado_roles)){
                                foreach ($listado_roles as $key) { ?>
                                    <option title="<?php echo $key[2]?>" value="<?php if($key[3] != 0){echo $key[0];}?>"><?php echo $key[1]?></option>
                            <?php }
                            } ?>
                        </select>
                        </div>            
                    </div>    
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">Password</label>
                        <input type="text" class="form-control" id="password">
                        </div>
                    </div>    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Mail</label>
                            <input type="text" class="form-control" id="mail">
                        </div>
                    </div>  
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
      <!-- JS -->
    <script src="<?php echo base_url('js/jquery-3.5.1.js') ?>"></script>
    <!-- <script src="../assets/jquery/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="<?php echo base_url('assets/popper/popper.min.js') ?>"></script> -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- datatables JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>    
     
    <script type="text/javascript" src="<?php echo base_url('js/main.js') ?>"></script>  
    
    
  </body>
</html>
