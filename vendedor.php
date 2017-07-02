<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sansano Films</title>
    <link href="diseño.css" rel="stylesheet"/>
      <body>
        <div class ="menu">
          <ul id="menu">
            <li><a href="index.php">Volver</a></li>
            <li><a href="login.php">LogIn</a></li>
            <li><a href="persona.php">Registrate aqui</a></li>
            <li><a href="clienteR.php">Nuevo Cliente</a></li>
            <li><a href="vendedor.php">Nuevo Vendedor</a></li>
            <li><a href="proyectador.php">Nuevo Proyectador</a></li>
            <li>Usted es Admin, si no le es cierre esto</li>
          </ul>
        </div>

        <div class="contenido">
			<table>
                <tr>
                    <td>ID Empleado</td>
                    <td>ID Vendedor</td>
                    <td>RUT</td>
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
                $sql = "SELECT * FROM vendedores";
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
			<form action="registroVend.php" method="POST">
            RUT (sin digito Verificador) Pelicula:<br>
            <input type="text" name="Rut"><br>
            ID Vendedor:<br>
            <input type="text" name="ID"><br>
            <input type="submit" value="Ingresar">
          </form>
                        
        </div>
      </body>
</html>