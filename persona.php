<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal Talleres USM</title>
    <link href="diseño.css" rel="stylesheet"/>
      <body>
        <div class ="menu">
          <ul id="menu">
            <li><a href="index.php">Volver</a></li>
            <li><a href="login.php">LogIn</a></li>
            <li><a href="clienteR.php">Nuevo Cliente</a></li>
            <li><a href="vendedor.php">Nuevo Vendedor</a></li>
            <li><a href="proyectador.php">Nuevo Proyectador</a></li>
          </ul>
        </div>

        <div class="contenido">
            <table>
                <tr>
                    <td>Rol</td>
                    <td>Nombre</td>
                </tr>
            <?php
                session_start();
                $servername = "localhost";
                $username = "root";
                $password = "localhost";
                $dbname = "dbtest";

                $conn = new mysqli($servername,$username,$password,$dbname);
                if ($conn -> connect_error){
                  die ("Fallo la conexión". $conn->connect_error);
                }
                $sql = "SELECT id_usuario, nombre FROM usuarios";
                $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
                if ($result->num_rows > 0) {
                // output data of each row
                while($rows=  mysqli_fetch_array($result)){
                    echo "<tr><td>".$rows[0]."</td>";
                    echo "<td>".$rows[1]."</td>";
                    }
                }
                else {
                  echo "0 results";
                }
                $conn->close();
            ?>
        </table>
			<form action="registroPersona.php" method="POST">
            Rol (sin guion):<br>
            <input type="text" name="Rol"><br>
            Nombre:<br>
            <input type="text" name="Nombre"><br>
            Contraseña:<br>
            <input type="text" name="Contraseña"><br>
            <input type="submit" value="Ingresar">
          </form>
        </div>
      </body>
</html>
