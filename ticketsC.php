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
            <li><a href="cliente.php">Pagina Principal</a></li>
            <li><a href="ticketsC.php">Comprar Ticket</a></li>
            <li><a href="comentario.php">Danos Tu opinion</a></li>
            <li><a href="pelicula.php">Peliculas Disponibles</a></li>
            <li>Usted es Admin, si no le es cierre esto</li>
          </ul>
        </div>

        <div class="contenido">  
            <table>
                <tr>
                    <td>ID Funcion</td>
                    <td>Pelicula</td>
                    <td>Genero</td>
                    <td>Clasificacion</td>
                    <td>Fecha</td>
                    <td>Hora</td>
                    <td>Cine</td>
                    <td>Sala</td>
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
                $sql = "SELECT id_funcion AS ID, peliculas.nombre AS Pelicula, genero, clasificacion, fecha, hora, cines.Nombre AS Cine, id_sala AS Sala FROM funciones, peliculas, salas, cines WHERE pelicula_id = id_pelicula AND sala_id = id_sala AND cine_id = id_cine";
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
                    echo "<td>".$rows[6]."</td>";
                    echo "<td>".$rows[7]."</tr><br>";
                    } 
                }
                else {
                  echo "0 results";
                }
                $conn->close();
            ?>
        </table>
			<form action="compra.php" method="POST">
            ID Funcion:<br>
            <input type="text" name="funcion_id"><br>
            ID Cliente:<br>
            <input type="text" name="cliente_id"><br>
            Asiento:<br>
            <input type="text" name="Asiento"><br>
            Monto:<br>
            <input type="text" name="Precio"><br>
            <input type="submit" value="Ingresar">
          </form>
                        
        </div>
      </body>
</html>
