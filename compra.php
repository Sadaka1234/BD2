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
            $asiento = (INT)$_POST['Asiento'];
            $precio = (INT)$_POST['Precio'];
            $cliente_id =(INT) $_POST['cliente_id'];
            $funcion_id = (INT)$_POST['funcion_id'];
            
            if($asiento == NULL or $precio == NULL or $cliente_id == NULL or $funcion_id == NULL or !preg_match("/^[0-9]+$/",$asiento) or !preg_match("/^[0-9]+$/", $precio) or !preg_match("/^[0-9]+$/", $cliente_id) or !preg_match("/^[0-9]+$/", $funcion_id)){
                if($asiento == NULL or $precio == NULL or $cliente_id == NULL or $funcion_id == NULL){
                   echo "RELLENA TODOS LOS CAMPOIS<br>"; 
                }
                
                if (!preg_match("/^[0-9]+$/",$asiento)) {
                    echo "El Asiento tiene un valor numerico<br>"; 
                }

                if (!preg_match("/^[0-9]+$/", $precio)){
                    echo "Precio es un Numero<br>";
                }
                
                if (!preg_match("/^[0-9]+$/", $cliente_id)){
                    echo "Solo Números los ID's<br>";
                }
                                
                if (!preg_match("/^[0-9]+$/", $funcion_id)){
                     echo "Solo Números los ID's<br>";
                }
                
          ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	            	ID Funcion:<br>
            		<input type="text" name="funcion_id"><br>
            		ID Cliente:<br>
            		<input type="text" name="cliente_id"><br>
            		Asiento:<br>
            		<input type="text" name="Asiento"><br>
            		Monto:<br>
            		<input type="text" name="Precio"><br>
            		<input type="submit" value="Ingresar">
              </form>
        <?php
            }    
            else{    
                $sql = "INSERT INTO ticket_ol (Asiento, Precio, cliente_id, funcion_id) VALUES('$asiento','$precio','$cliente_id','$funcion_id')";
                $result = $conn->query($sql) or die("ERROR PI: Mami que será lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Ticket comprado con exito! :D!!!!!";
                echo "<ul id='menu'><li><a href='cliente.php'>Volver</a></li></ul>";
            }
          ?>
        </div>
      </body>
</html>