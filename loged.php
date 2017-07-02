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
            <li>Usted es Admin, si no le es cierre esto</li>
          </ul>
        </div>

        <div class="contenido">
			<form action="cliente.php" method="POST">
            <input type="submit" value="Ingresar como Cliente">
          </form>
		  
		  <form action="empleado.php" method="POST">
            <input type="submit" value="Ingresar como Empleado">
          </form>                 
        </div>
      </body>
</html>