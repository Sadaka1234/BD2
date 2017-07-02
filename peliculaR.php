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
                    <td>ID Pelicula</td>
                    <td>Nombre</td>
                    <td>Genero</td>
                    <td>Clasificacion</td>
                    <td>Precio</td>
                    <td>Director(es)</td>
                    <td>Reparto</td>
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
                $sql = "SELECT * FROM peliculas";
                $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
                if ($result->num_rows > 0) {
                // output data of each row
                while($rows=  mysqli_fetch_array($result)){ 
                    
                    echo "<tr><td>".$rows[0]."</td>"; 
                    echo "<td>".$rows[1]."</td>";
                    echo "<td>".$rows[2]."</td>";
                    echo "<td>".$rows[3]."</td>";
                    echo "<td>".$rows[4]."</td>";
                    echo "<td>".$rows[5]."</td>";
                    echo "<td>".$rows[6]."</tr><br>";
                    } 
                }
                else {
                  echo "0 results";
                }
                $conn->close();
            ?>
        </table>
			<form action="registroPeli.php" method="POST">
            Nombre Pelicula:<br>
            <input type="text" name="nombre"><br>
            Genero:<br>
            <input type="text" name="genero"><br>
            Clasificacion:<br>
            <input type="text" name="clasificacion"><br>
            Costo de Arriendo:<br>
            <input type="text" name="precio"><br>
            Director(es):<br>
            <input type="text" name="directores"><br>
            Reparto:<br>
            <input type="text" name="actores"><br>
            <input type="submit" value="Ingresar">
          </form>
                        
        </div>
      </body>
</html>
