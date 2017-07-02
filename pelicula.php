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
            <b>Funciones Disponibles</b><br>   
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Genero</td>
                    <td>Clasificacion</td>
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
                $sql = "SELECT Nombre, Genero, Clasificacion, Directores, Actores FROM peliculas";
                $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
                if ($result->num_rows > 0) {
                // output data of each row
                while($rows=  mysqli_fetch_array($result)){ 
                    
                    echo "<tr><td>".$rows[0]."</td>"; 
                    echo "<td>".$rows[1]."</td>";
                    echo "<td>".$rows[2]."</td>";
                    echo "<td>".$rows[3]."</td>";
                    echo "<td>".$rows[4]."</tr><br>";
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
                    <td>Nombre</td>
                    <td>Genero</td>
                    <td>Clasificacion</td>
                    <td>Director(es)</td>
                    <td>Reparto</td>
                    <td>Comentarios</td>
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
                $sql = "SELECT Nombre, Genero, Clasificacion, Directores, Actores, Comentario FROM peliculas, comentarios WHERE pelicula_id = id_pelicula";
                $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
                if ($result->num_rows > 0) {
                // output data of each row
                while($rows=  mysqli_fetch_array($result)){ 
                    
                    echo "<tr><td>".$rows[0]."</td>"; 
                    echo "<td>".$rows[1]."</td>";
                    echo "<td>".$rows[2]."</td>";
                    echo "<td>".$rows[3]."</td>";
                    echo "<td>".$rows[4]."</td>";
                    echo "<td>".$rows[5]."</tr><br>";
                    } 
                }
                else {
                  echo "0 results";
                }
                $conn->close();
            ?>
        </table>              
        </div>
      </body>
</html>
