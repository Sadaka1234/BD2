<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal Taller USM</title>
    <link href="diseño.css" rel="stylesheet"/>
      <body>
        <div class ="menu">
          <ul id="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="login.php">LogIn</a></li>
            <li><a href="registrarse.php">Registrate aqui</a></li>
            <li><a href="clienteR.php">Nuevo Cliente</a></li>
            <li><a href="vendedor.php">Nuevo Vendedor</a></li>
            <li><a href="proyectador.php">Nuevo Proyectador</a></li>
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
                die ("Fallo la conexión". $conn->connect_error);
            }
            $rol = (INT)$_POST['Rol'];
            $nombre = $_POST['Nombre'];
            $contraseña = $_POST['Contraseña'];

            if($nombre == NULL or $rol == NULL or $contraseña == NULL or !preg_match("/^[a-zA-Z ]*$/",$nombre) or  (!preg_match("/^[0-9]+$/", $rol))){
                if($nombre == NULL or $rol == NULL or $contraseña == NULL){
                 echo "RELLENA TODOS LOS CAMPOS<br>";
                 }

                if(!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
                    echo "Solo Letras y espacios para el nombre<br>";
                }

                if(!preg_match("/^[0-9]+$/", $rol)){
                    echo "Solo Números en el rol<br>";
                }
                echo "Sadaka".$nombre."estuvo".$rol."aqui".$contraseña."oki";
          }
                elseif (strlen($rol) != 9) {
                                 echo "Formato de rol invalido";


               ?>

                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		            Rol (Sin guion):<br>
		            <input type="text" name="rol"><br>
		            Nombre:<br>
		            <input type="text" name="nombre"><br>
                Contraseña:<br>
                <input type="password" name ="Contraseña"><br>
                <input type="submit" value="Registrar">

                </form>
        <?php
}
            else{
                $sql = "INSERT INTO usuarios VALUES ('$rol','$rol', 0,'$nombre','$contraseña');";
                $result = $conn->query($sql) or die("ERROR PI: Mami que sera lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Persona Ingresada Correctamente";
                echo "<ul id='menu'><li><a href='index.php'>Volver</a></li></ul>";
            }
          ?>
        </div>
      </body>
</html>
