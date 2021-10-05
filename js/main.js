$(document).ready(function() {
var id_usuario, opcion;
opcion = 4;
var base_url = 'http://localhost/Proyecto_Domotica/';

tablaUsuarios = $('#tablaUsuarios').DataTable({  
    "ajax":{            
        "url": base_url + "controladores/crud.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:4}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": 0},
        {"data": 1},
        {"data": 2},
        {"data": 3},
        {"data": 4},
        {"data": 5},
        {"data": 6},
        {"data": 7},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ]
});     

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                         
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre = $.trim($('#nombre').val());    
    apellido = $.trim($('#apellido').val());
    mail = $.trim($('#mail').val()); 
    telefono = $.trim($('#telefono').val());
    dni = $.trim($('#dni').val());    
    id_rol = $.trim($('#id_rol').val());     
    password = $.trim($('#password').val());
                             
        $.ajax({
          url: base_url + "controladores/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {id_usuario:id_usuario, nombre:nombre, apellido:apellido,mail: mail, dni:dni, telefono:telefono, id_rol:id_rol, password:password  ,opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    id_usuario=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    id_usuario = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    correo = fila.find('td:eq(3)').text();
    telefono = fila.find('td:eq(4)').text();
    dni = fila.find('td:eq(5)').text();
    password = fila.find('td:eq(6)').text();
    id_rol = fila.find('td:eq(7)').text();
    // console.log(id_rol);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#mail").val(correo);
    $("#dni").val(dni);
    $("#telefono").val(telefono);
    $("#id_rol").val(id_rol);
    $("#password").val(password);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalCRUD').modal('show');		   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    id_usuario = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+id_usuario+"?");                
    if (respuesta) {            
        $.ajax({
          url: base_url + "controladores/crud.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, id_usuario:id_usuario},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
           }
        });	
    }
 });
     
});    