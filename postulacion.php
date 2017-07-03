<?php

$servername = "localhost";
$username = "root";
$password = "localhost";
$dbname = "dbtest";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn -> connect_error){
  die ("Fallo la conexión". $conn->connect_error);
}

ob_start();
session_start();

if ( isset($_SESSION['user'])!="" ) {
 header("Location: index.php");
 exit;
}

$res=mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario =".$_SESSION['rol']);
$userRow=mysqli_fetch_array($res);

$rol = $userRow[0];
$TALL = 9999;
$TALL = ($_POST['IDTALL']);

  $res = mysqli_query($conn,"SELECT id_taller, semestre, inscritos FROM taller_libre WHERE id_taller = $TALL");
  if ($res){
    $count = mysqli_num_rows($res);
  }
  if(!empty($count) and $TALL != 9999) {
    $_SESSION['IDTALLER'] = $TALL;
    header("Location: registroPostula.php");
  } else {
   echo "ese taller no existe";
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
            <li><a href="loged.php">Volver</a></li>
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
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            ID Taller a registrar:<br>
            <input type="text" name="IDTALL"><br>
            <input type="submit" value="Ingresar">
          </form>
        </div>
      </body>
</html>
<?php ob_end_flush(); ?>
