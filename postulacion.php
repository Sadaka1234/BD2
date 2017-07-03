<?php



$TALL = trim($_POST['IDTALL']);
$TALL = strip_tags($TALL);
$TALL = htmlspecialchars($TALL);

if(empty($TALL)){
 $error = true;
 echo "Por favor ingresa algo";
}

if (!$error){
  $res=mysqli_query($conn,"SELECT id_taller, semestre, inscritos FROM taller_libre WHERE taller_libre = $TALL");
  $count = mysqli_num_rows($res);
  if($count != 0) {

    $result = $conn->query($res) or die("ERROR PI: Mami que ser� lo que quiere el negro.  SQL ERROR: " . $conn->error);
    $rows=  mysqli_fetch_array($result);
    $sql = "INSERT INTO estudiantes_cursan VALUES(".$rol.",".$rows[1].",".$rows[0].", ".($rows[3] + 1).",0,0,0)";
   header("Location: loged.php");
  } else {
   echo "ese taller no existe";
  }
  }
 ?>







<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal Talleres USM</title>
    <link href="diseño.css" rel="stylesheet"/>
      <body>
        <div class ="menu">
          <ul id="menu">
            <li><a href="index.php">Logout</a></li>
            <li><a href="login.php">Volver</a></li>
          </ul>
        </div>

        <div class="contenido">
            <table>
                <tr>
                    <td>ID Taller</td>
                    <td>Nombre</td>
                    <td>Semestre</td>
                    <td>Inscritos</td>
                </tr>
            <?php
                session_start();
                ob_start();
                $servername = "localhost";
                $username = "root";
                $password = "localhost";
                $dbname = "dbtest";

                $conn = new mysqli($servername,$username,$password,$dbname);
                if ($conn -> connect_error){
                  die ("Fallo la conexión". $conn->connect_error);
                }

                $sql = "SELECT id_taller, name, semestre, inscritos FROM taller_libre";
                $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
                if ($result->num_rows > 0) {
                // output data of each row
                while($rows=  mysqli_fetch_array($result)){
                    echo "<tr><td>".$rows[0]."</td>";
                    echo "<td>".$rows[1]."</td>";
                    echo "<td>".$rows[2]."</td>";
                    echo "<td>".$rows[3]."</td>";
                    }
                }
                else {
                  echo "0 results";
                }
                $conn->close();
            ?>
      </table>
			<form action="login.php" method="POST">
            ID Taller a registrar:<br>
            <input type="int" name="IDTALL"><br>
            <input type="submit" value="Ingresar">
          </form>
        </div>
      </body>
</html>
<?php ob_end_flush(); ?>
