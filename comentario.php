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
                    <td>Cliente</td>
                    <td>Pelicula</td>
                    <td>Comentario</td>
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
                $sql = "SELECT clientes.usuario AS Cliente, Peliculas.Nombre AS Pelicula, Comentario FROM Clientes, Peliculas, Comentarios WHERE cliente_id = id_cliente AND id_pelicula = pelicula_id";
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
			<form action="comentacion.php" method="POST">
            ID Pelicula:<br>
            <input type="text" name="pelicula"><br>
            ID Cliente:<br>
            <input type="text" name="cliente"><br>
            Comentario:<br>
            <input type="text" name="texto"><br>
            <input type="submit" value="Ingresar">
          </form>
                        
        </div>
      </body>
</html>