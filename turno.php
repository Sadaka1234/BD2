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
            <table>
                <tr>
                    <td>Sala</td>
                    <td>Cine</td>
                </tr>
            <?php
                session_start();
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tarea2";

                $conn = new mysqli($servername,$username,$password,$dbname);
                if ($conn -> connect_error){
                  die ("Fallo la conección". $conn->connect_error);
                }
                $sql = "SELECT id_sala, cines.Nombre AS Cine FROM salas, cines WHERE id_cine = cine_id";
                $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
                if ($result->num_rows > 0) {
                // output data of each row
                while($rows=  mysqli_fetch_array($result)){            
                    echo "<tr><td>".$rows[0]."</td>"; 
                    echo "<td>".$rows[1]."</tr><br>";
                    } 
                }
                else {
                  echo "0 results";
                } 
                $conn->close();
			?>
			</table>  
			<table>
                <tr>
                    <td>ID Proyectador</td>
                    <td>Sala</td>
                    <td>Hora Inicio</td>
                </tr>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tarea2";

                $conn = new mysqli($servername,$username,$password,$dbname);
                if ($conn -> connect_error){
                  die ("Fallo la conección". $conn->connect_error);
                }		  
				$sql = "SELECT * FROM turnos";
                $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
                if ($result->num_rows > 0) {
                // output data of each row
                while($rows=  mysqli_fetch_array($result)){ 
                    
                    echo "<tr><td>".$rows[0]."</td>"; 
                    echo "<td>".$rows[1]."</td>";
                    echo "<td>".$rows[2]."</tr><br>";
                    } 
                }
                else {
                  echo "0 results";
                }
                $conn->close();
            ?>
        </table>
        
			<form action="registroTurno.php" method="POST">
            ID Proyectador:<br>
            <input type="text" name="proyector"><br>
            ID Sala:<br>
            <input type="text" name="sala"><br>
            Turno (valor entre 0 y 23):<br>
            <input type="text" name="turno"><br>
            <input type="submit" value="Ingresar">
          </form>
                        
        </div>
      </body>
</html>
