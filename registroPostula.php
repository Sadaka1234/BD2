


























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
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "localhost";
            $dbname = "dbtest";

            $conn = new mysqli($servername,$username,$password,$dbname);
            ob_start();
            session_start();
            if ($conn -> connect_error){
                die ("Fallo la conexion". $conn->connect_error);
            }

            $TALL = $_SESSION['IDTALLER'];
            $rol = $_SESSION['rol'];


            $sql = "SELECT id_taller, semestre FROM taller_libre where id_taller = ".$TALL;
            $result = $conn->query($sql) or die("Falló la consulta" .$conn->error);
            $rows=  mysqli_fetch_array($result);


            if($TALL == NULL or !preg_match("/^[0-9]+$/", $TALL or $result->num_rows == 0) ){
              $_SESSION['IDTALLER'] = (INT)$_POST['IDTALL'];

                if($TALL == NULL){
                   echo "Debes ingresar un numero<br>";
                }
				    if (!preg_match("/^[0-9]+$/", $TALL)){
                    echo "Los ids solo tienen numeros<br>";
                }
                if($result->num_rows == 0){
                  echo "Codigo de taller ingresado no existe";
                }

          ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		            ID Taller a registrar:<br>
		            <input type="text" name="IDTALL"><br>
		            <input type="submit" value="Ingresar">
                </form>
        <?php
            }

            else{

                $sql = "INSERT INTO estudiantes_cursan VALUES(".$rol.",".$rows[1].",".$rows[0].", 0,0,0,0)";
                $result = $conn->query($sql) or die("ERROR PI: Mami que ser� lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Postulacion a taller realizada con exito";

            }
          ?>
        </div>
      </body>
</html>
