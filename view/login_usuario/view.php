
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      
    </head>
    <body>
      
      <?php
          if($getById){
            echo $getById->id_usuario."<br>";
            echo $getById->tipo_usuario."<br>";
            echo $getById->fecha_registro."<br>";
            echo $getById->estado."<br>";
            echo $getById->email."<br>";
            echo $getById->contrasena."<br>";
            echo "<br><br>";
          }

      ?>
      </body>
</html>

