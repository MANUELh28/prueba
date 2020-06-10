<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos="ej";
$conexion = mysqli_connect($servidor,$usuario,"") or die ("No se a podido conectar al servidor de la base de datos");
$db = mysqli_select_db($conexion,$basededatos) or die ("Upss! no se a podido conectar a la base de datos");
$consulta = "SELECT * from servicio ";
$resultado = mysqli_query($conexion,$consulta);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <?php
    $consulta = 'SELECT * from g';
    $resultado = mysqli_query($conexion,$consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
    while ($columna = mysqli_fetch_array( $resultado ))
      {
            
         echo "<input type=checkbox name=clas[] value=" .$columna['idc'] .">"  .$columna['nombre'] ."<br>";
        //echo $columna['codigo'];
      }
    ?>
    <input type="text" name="id" id="">
    <input type="date" name="fecha" id=""><br>
    <input type="time" name="hora" id=""><br>
    <input type="submit" value="enviar" name="enviar">
    <br>
    
</form>
    <?php
    if (isset($_POST["enviar"])) {
        $id = $_POST["id"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $selecciono = $_REQUEST["clas"];
        $n= count ($selecciono);
        
        for($i=0; $i<$n; $i++){
            $consulta1 = "INSERT INTO formul (idform,fecha,hora,idc) VALUES ('$id', '$fecha', '$hora', '$selecciono[$i]' )";
            $resultado2 = mysqli_query($conexion,$consulta1);
        }
        
    }
  
      
    ?>
    <?php

      
    
      $consulta2 = 'SELECT * from formul';
      $resultado2 = mysqli_query($conexion,$consulta2) or die ( "Algo ha ido mal en la consulta a la base de datos");
echo "<table border='2'>";
echo "<tr>";
echo "<th>idform</th>";
echo "<th>fecha</th>";
echo "<th>hora</th>";
echo "<th>idc</th>";
echo "</tr>";
      while ($columna2 = mysqli_fetch_array( $resultado2 ))
        {
            echo "<tr>";
            echo "<td>" . $columna2['idform'] . "</td><td> " . $columna2['fecha'] . "</td>";
            echo "<td>" . $columna2['hora'] . "</td><td>" . $columna2['idc'] . "</td>";
            echo "</tr>";
         
     
           }
     
  
    ?>

</body>
</html>