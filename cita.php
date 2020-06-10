<?php
session_start();
//$link = new PDO('mysql:host=localhost;dbname=controlcitas1', 'root', '');
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos="pruebaa";
$conexion = mysqli_connect($servidor,$usuario,""); // or die ("No se a podido conectar al servidor de la base de datos");
$db = mysqli_select_db($conexion,$basededatos);// or die ("Upss! no se a podido conectar a la base de datos");



?>
<!DOCTYPE html>
<html>
<head>
	<title>citas</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<?php
	#require_once('menu.php');
	?><br>
	<center>
	<!-- inicio de botones menu modales -->
  <form action="" method="post">
	<button type="button" class="sa" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo" >Registro de Cientes</button>
	<button type="button" class="sa" data-toggle="modal" data-target="#exampleModal2" data-whatever="@fat" name="agregars">Agregar Nuevos Servicios</button>
	<button type="button" class="sa" data-toggle="modal" data-target="#exampleModal3" data-whatever="@fat">Historial de Citas</button>
  </form>
    <!-- Final de botones menu modales -->
	<br><br>
	</center>
<!-- inicio de modal cliente -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	  <!-- texto de arriba del modal  -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <!-- Cierre de texto de arriba del modal  -->
	  <!-- formulario de cliente del modal  -->
      <div class="modal-body">
        <form>
		<div class="container">
    <table class="table">
    
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">apellido</th>
      <th scope="col">Dui</th>
    </tr>
  </thead>
  <tbody>
  <tr>
 <?php
        $consulta2 = 'SELECT * from cliente';
        $resultado2 = mysqli_query($conexion,$consulta2); // or die ( "Algo ha ido mal en la consulta a la base de datos");
        while ($columna2 = mysqli_fetch_array( $resultado2 ))
        {
            echo "<tr>";
            echo "<td>" . $columna2['idcliente'] . "</td><td> " . $columna2['nombrecliente'] . "</td>";
            echo "<td>" . $columna2['apellidocliente'] . "</td><td>" . $columna2['dui'] . "</td>";
            echo "</tr>";
         
     
           }
      ?>
  </tr>
  </tbody>
    
    </table>
    </div>
        </form>
      </div>
	  <!-- Cierre del formulario del cliente del modal  -->
	  <!-- Botones de abajo del modal  -->
      <div class="modal-footer">
        <button type="button" class="saa" data-dismiss="modal">Cerrar</button>

      </div>
	  <!-- Cierre de Botones de abajo del modal  --><!--  -->
    </div>
  </div>
</div>
<!-- Final del modal de cliente -->


<!-- inicio de modal servicios -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	 <!-- texto de arriba del modal  -->
	 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevos Servicios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <!-- Cierre de texto de arriba del modal  -->
	   <!-- formulario de Servicios del modal  -->
     <?php 
     
     
     
     
     ?>
	   <div class="modal-body">
        <form method="post" action="cita.php">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Servicio</label>
            <input type="text" class="form-control"  name="nombreservicio">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripcion</label>
            <textarea class="form-control"  name="serviciodescript"></textarea>
          </div>
        
      </div>
	   <!-- Cierre formulario de Servicios del modal  -->
	  <!-- Botones de abajo del modal  -->
      <div class="modal-footer">
        <button type="button" class="saa" data-dismiss="modal">Cerrar</button>
        <input type="submit" value="agregar" name="agregarnser" class="s">
        </form>
       <!-- <button type="submit" class="s" name="agregarnser" data-dismiss="modal">Aceptar</button>-->
      </div>
	  <!-- Cierre de Botones de abajo del modal  --><!--  -->
    </div>
  </div>
</div>
<?php
 if (isset($_POST["agregarnser"])) {
  function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
   }
   
  $idserv =generarCodigo(6);
  $idd=2;
   
   $nombreservicio = $_POST["nombreservicio"];
   $serviciodescript = $_POST["serviciodescript"];
   $insertarser =  "INSERT INTO servicios (idservicios,nombreservicio,serviciodescript) VALUES ('$idserv', '$nombreservicio', '$serviciodescript')";
   $insertar = mysqli_query($conexion,$insertarser);
 }
?>
<!-- Final del modal de Servicios -->

<!-- inicio de modal Historial Citas -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	 <!-- texto de arriba del modal  -->
	 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Historial de Citas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <!-- Cierre de texto de arriba del modal  -->	
	  <!-- inicio de historial de citas -->
	  <div class="modal-body">
        <form>
		<div class="container">
    <table class="table">
    
    <thead>
    <tr>
      <th scope="col">ID Cita</th>
      <th scope="col">fecha</th>
      <th scope="col">Hora</th>
     
    </tr>
  </thead>
  <tbody>
  <?php 
               $consultahisto = 'SELECT * from historial ';
               $resultadohisto = mysqli_query($conexion,$consultahisto) ;//or die ( "Algo ha ido mal en la consulta a la base de datos");
               while ($columnahisto = mysqli_fetch_array( $resultadohisto ))
                 {
                    echo "<tr>";
                    echo "<td>" .$columnahisto['idcita'] ."</td>" ;
                    echo "<td>" .$columnahisto['fecha'] ."</td>" ;
                    echo "<td>" .$columnahisto['hora'] ."</td>" ;
                    echo "<tr>";
                 }
            ?>

  </tbody>
    
    </table>
    </div>
        </form>
      </div>
	  <!-- Final de historial de citas-->
	  <!-- Botones de abajo del modal  -->
      <div class="modal-footer">
        <button type="button" class="saa"  data-dismiss="modal">Cerrar</button>
      </div>
	  <!-- Cierre de Botones de abajo del modal  --><!--  -->
    </div>
  </div>
</div>
<!-- Final del modal de Historial de citas -->


<!-- Formulario cita -->
<br><br><br><br>
<center>
<form method="post" action="javascript:validar()">


		<div  class="login-box">
		<img class="logo" src="logo.jpg">
		<h3>Cita</h3>
        <table>
        	<tr>
        		<td>
        			<label>
        				ID cliente
        			</label>
        			<br>
                    <input type="text" name="idcliente" id="" size="35" class="inputFormu">
				</td>
				<td>
				<label for="">
				  Servicio 
				</label><br>
				<button type="button" class="s" data-toggle="modal" data-target="#exampleModal4" data-whatever="@fat">Agregar Servicios</button>
				</td>
        		&nbsp;
        		
        	</tr>
        	<tr>
        		<td>
        			<label>
        				seleccionar Fecha</br>
        			</label>
        			
                    <input type="date" name="txtFecha" size="35" style="width: 280px;" class="inputFormu">
				</td>
				<td>
        			<label>
        				hora</br>
        			</label>
        			
                    <input type="time" name="txtHora" size="35" style="width: 280px;" class="inputFormu">
        		</td>
        	</tr>
        	<tr>
        		<td colspan="2">
        			<label>
        			 Comentario:</br>
        			</label>
        			
                   <textarea name="txtComentario"></textarea>
        		</td>
        		
        	</tr>
        	<tr>
        		<td colspan="2">
        			<br>
        			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        			<input type="submit" value="Crear Cita" class="s" name="crearc" >
             <!-- <button type="submit" name="agregar" value="agregar" class="s"> aceptar </button>-->
        			

        		</td>
        	</tr>
        </table>
        </div>


</center>
<!-- inicio de modal Servicios -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
 
    <div class="modal-content">
	 <!-- texto de arriba del modal  -->
	 <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Servicios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <!-- Cierre de texto de arriba del modal  -->	
	  <div class="modal-body">
       
		<div class="container">
    <table class="table">  
            <?php 
               $consulta = 'SELECT * from servicios ';
               $resultado1 = mysqli_query($conexion,$consulta) ;//or die ( "Algo ha ido mal en la consulta a la base de datos");
               $contador = 0;
               echo "<tr>";
               while ($columna = mysqli_fetch_array( $resultado1 ))
                 { 
                    echo "<td  valing=top style = vertical-align:text-top;>" ;
                    echo "<input type=checkbox name=clas[] value=" .$columna['idservicios'] .">"  .$columna['nombreservicio'] ;
                    echo "</td>";
                    $contador++;
                    if ($contador == 5) {
                      echo "</tr>";
                      echo "<tr>";
                      $contador = 0;
                    }
                 }
            ?>
    </table>
    </div>
        
      </div>
	  <!-- Botones de abajo del modal  -->
      <div class="modal-footer">
	  <button type="button" class="saa" data-dismiss="modal">Cerrar</button>
       <!-- <input type="submit" class="s" value="agregar" name="agregars" class="close">-->
      </div>
   
	  <!-- Cierre de Botones de abajo del modal  --><!--  -->
    </div>
  </div>
</div></form>
<?php

if (isset($_POST["crearc"])) {
 
    $servicio = $_REQUEST["clas"];
    $n= count ($servicio);
    $idcliente = $_POST["idcliente"];
    $fecha = $_POST["txtFecha"];
    $hora = $_POST["txtHora"];
    $direccion = $_POST["txtComentario"];
    $idcita = 8;
    $idhisto = 9;
    
    
    for($i=0; $i<$n; $i++){
      $consultacita = "INSERT INTO cita (idcita,fecha,hora,idservicio,idcliente,direccion) VALUES ('$idcita', '$fecha', '$hora', '$servicio[$i]','$idcliente', '$direccion',)";
      $resultadocita = mysqli_query($conexion,$consultacita) or die ("error en consulta");

      $seleccionarcita = 'SELECT idcita FROM cita WHERE idcita = "$idcita"';
      $resutadocitaid = mysqli_query($conexion,$seleccionarcita);
    
      $consultahisto = "INSERT INTO historial (idhistorial,hora,fecha,idcita) VALUES ('$idhisto', '$fecha', '$hora', $resultadocita ) ";
      $resultadohistor = mysqli_query($conexion,$consultahisto);
  }
 
     



}
?>
<!-- Final del modal de Historial de citas -->

<script>
$('#exampleModal1').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

$('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

$('#exampleModal3').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
$('#exampleModal4').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

</script>
<style type="text/css">
	input
	{
		size: 40;
		position: relative;
		z-index: 100;
	}
	body
	{
	margin: 0;
	padding: 0;
	background: #cfb82b;
	color: #343749;
	font-family: 'gisha';
	}
	fieldset
	{
		background-color: #ffff;
		border-style: solid;
		border-color: #ffff;
	}
   .s{
	border: none;
	outline: none;
	width: 150px;
	height: 40px;
	background: #fe3686;
	color: white;
	font-size: 15px;
	border-radius: 20px;
}

.sa{
	border: none;
	outline: none;
	width: 200px;
	height: 40px;
	background: #fe3686;
	color: white;
	font-size: 15px;
	border-radius: 20px;
}
.saa{
	border: none;
	outline: none;
	width: 150px;
	height: 40px;
	background: #91908F;
	color: white;
	font-size: 15px;
	border-radius: 20px;
}

.login-box
{
	width: 700px;
	height: 437px;
	background: #fcfaf1;
	top: 80%;
	left: 50%;
	position: absolute;
	transform: translate(-50%, -80%);
	box-sizing: border-box;
	padding: 70px 30px;
}

.login-box .logo
{
 height: 100px;
 width: 100px;
 border-radius: 50%;
 position: absolute;
 top: -50px;
 left: 43%;
}
textarea
{
    resize: none;
    width: 635px;
    height: 50px;
}
a
{
	text-decoration: none;
}
.tabl
{
    background: #fe3686;
}
.menu
{

 font-size: 20px;
 float: center;
 color: white;
 text-decoration: none;
 text-align: center;
 font-family: 'gisha';
}
.st
{
	background-color:#fe3686;
	size: 20px;
	font-family: 'gisha';
}

</style>
<script type="text/javascript">



function validar(){
  var validado = true;
  elementos = document.getElementsByClassName("inputFormu");
  for(i=0;i<elementos.length;i++){
    if(elementos[i].value == "" || elementos[i].value == null){
    validado = false
    }
  }
  if(validado){
  window.location = "cita.php";
  }else{
    confirm("Hay campos vacios");   
  }
}
</script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
