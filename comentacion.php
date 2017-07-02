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
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tarea2";

            $conn = new mysqli($servername,$username,$password,$dbname);
            if ($conn -> connect_error){
                die ("Fallo la conexión". $conn->connect_error);
            }
            $cliente_id = (INT)$_POST['cliente'];
            $comentario = $_POST['texto'];
            $pelicula_id = (INT)$_POST['pelicula'];
            
            if($cliente_id == NULL or $comentario == NULL or $pelicula_id == NULL or !preg_match("/^[0-9]+$/", $cliente_id) or !preg_match("/^[0-9]+$/", $pelicula_id)){
                if($cliente_id == NULL or $comentario == NULL or $pelicula_id == NULL){
                   echo "RELLENA TODOS LOS CAMPOIS<br>"; 
                }

                if (!preg_match("/^[0-9]+$/", $cliente_id)){
                    echo "Solo Números los ID's<br>";
                }

                if (!preg_match("/^[0-9]+$/", $pelicula_id)){
                     echo "Solo Números los ID's<br>";
                }
                
          ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
					ID Pelicula:<br>
					<input type="text" name="pelicula"><br>
          			ID Cliente:<br>
        		    <input type="text" name="cliente"><br>
            		Comentario:<br>
            		<input type="text" name="texto"><br>
            		<input type="submit" value="Ingresar">
             	</form>
        <?php
            }    
            else{    
                $sql = "INSERT INTO Comentarios VALUES('$cliente_id','$pelicula_id','$comentario')";
                $result = $conn->query($sql) or die("ERROR PI: Mami que será lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Se ha registrado su Comentario";
                echo "<ul id='menu'><li><a href='cliente.php'>Volver</a></li></ul>";
            }
          ?>
        </div>
      </body>
</html>




