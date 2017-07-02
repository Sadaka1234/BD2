<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sansano Films</title>
    <link href="diseño.css" rel="stylesheet"/>
      <body>
      
        <div class ="menu">
          <ul id="menu">
            <li><a href="index.php">Logout</a></li>
            <li><a href="empleado.php">Pagina Principal</a></li>
            <li><a href="peliculaR.php">Registrar Pelicula</a></li>
            <li><a href="peliculaM.php">Modificar Pelicula</a></li>
            <li><a href="funcion.php">Agregar Funcion</a></li>
            <li><a href="turno.php">Gestion de Turnos</a></li>
            <li>Usted es Admin, si no le es cierre esto</li>
          </ul>
        </div>

        <div class="contenido">
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tarea2";

            $conn = new mysqli($servername,$username,$password,$dbname);
            if ($conn -> connect_error){
                die ("Fallo la conexión". $conn->connect_error);
            }
            $proyectador_id = $_POST['proyector'];
            $sala_id = $_POST['sala'];
            $hora_inicio = $_POST['turno'];
            
            if($proyectador_id == NULL or $sala_id == NULL or $hora_inicio == NULL){
                if($proyectador_id == NULL or $sala_id == NULL or $hora_inicio == NULL){
                   echo "RELLENA TODOS LOS CAMPOIS<br>"; 
                }
                
          ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
					<form action="registroTurno.php" method="POST">
		            ID Proyectador:<br>
		            <input type="text" name="proyector"><br>
		            ID Sala:<br>
		            <input type="text" name="sala"><br>
		            Turno (valor entre 0 y 23):<br>
		            <input type="text" name="turno"><br>
		            <input type="submit" value="Ingresar">
                </form>
        <?php
            }    
            else{    
                $sql = "INSERT INTO turnos VALUES ('$proyectador_id','$sala_id','$hora_inicio')";
                $result = $conn->query($sql) or die("ERROR PI: Mami que será lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Pelicula Ingresada Correctamente";
                echo "<ul id='menu'><li><a href='empleado.php'>Volver</a></li></ul>";
            }
          ?>
        </div>
      </body>
</html>
