<?php
 ob_start();
 session_start();
     $servername = "localhost";
     $username = "root";
     $password = "localhost";
     $dbname = "dbtest";

     $conn = new mysqli($servername,$username,$password,$dbname);
     if ($conn -> connect_error){
       die ("Fallo la conexión". $conn->connect_error);
     }
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['rol']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario =".$_SESSION['rol']);
 $userRow=mysqli_fetch_array($res);
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
          </ul>
        </div>

        <div class="contenido">
          <li><?php echo "Hola ".$userRow['nombre'].". Que quieres?";  ?></li>
			<form action="postulacion.php" method="POST">
            <input type="submit" value="Realizar postulación a asignatura">
          </form>

		  <form action="verpostulacion.php" method="POST">
            <input type="submit" value="Ver mis postulaciones">
          </form>
        </div>
      </body>
</html>


<?php ob_end_flush(); ?>
