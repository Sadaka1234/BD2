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
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "localhost";
            $dbname = "dbtest";

            $conn = new mysqli($servername,$username,$password,$dbname);

            if ($conn -> connect_error){
                die ("Fallo la conexion". $conn->connect_error);
            }
            ob_start();
            session_start();

            $TALL = $_SESSION['IDTALLER'];
            $rol = $_SESSION['rol'];

            $res=mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario =".$_SESSION['rol']);
            $userRow=mysqli_fetch_array($res);

            $sql = "SELECT id_taller, semestre FROM taller_libre where id_taller = ".$TALL;
            $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
            $rows=  mysqli_fetch_array($result);

            $res =mysqli_query($conn,"SELECT id_taller, semestre, inscritos FROM taller_libre WHERE id_taller = $TALL");
            $rows =  mysqli_fetch_array($res);

            $a = $userRow[0];
            $b = $rows[1];
            $c = $rows[0];
            
            $sql = "INSERT INTO estudiantes_cursan VALUES('$a', '$b', '$c',0,0,0,0)";
            $result = $conn->query($sql) or die("ERROR PI: Mami que sera lo que quiere el negro.  SQL ERROR: " . $conn->error);
            echo "Agregado con exito";
          ?>
        </div>
      </body>
</html>
