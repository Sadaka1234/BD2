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
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $pelicula_id =(INT) $_POST['pelicula'];
            $sala_id = (INT) $_POST['sala'];
            
            if($fecha == NULL or $hora == NULL or $pelicula_id == NULL or $sala_id == NULL or !preg_match("/^[0-9]+$/", $pelicula_id)){
                if($fecha == NULL or $hora == NULL or $pelicula_id == NULL or $clasificacion == NULL or $directores == NULL or $sala_id == NULL){
                   echo "RELLENA TODOS LOS CAMPOIS<br>"; 
                }
                
                if (!preg_match("/^[0-9]+$/", $pelicula_id)){
                    echo "Solo numeros para los ID's<br>";
                }
                if (!preg_match("/^[0-9]+$/", $sala_id)){
                    echo "Solo numeros para los ID's<br>";
                }
                
          ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		            Fecha:<br>
		            <input type="text" name="fecha"><br>
		            Hora:<br>
		            <input type="text" name="hora"><br>
		            Pelicula:<br>
		            <input type="text" name="pelicula"><br>
		            Sala:<br>
		            <input type="text" name="sala"><br>
		            <input type="submit" value="Ingresar">
		            <input type="submit" value="Ingresar">
                </form>
        <?php
            }    
            else{    
                $sql = "INSERT INTO funciones (Fecha, Hora, pelicula_id, sala_id) VALUES ('$fecha','$hora','$pelicula_id','$sala_id')";
                $result = $conn->query($sql) or die("ERROR PI: Mami que será lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Funcion Ingresada Correctamente";
                echo "<ul id='menu'><li><a href='empleado.php'>Volver</a></li></ul>";
            }
          ?>
        </div>
      </body>
</html>
