<!--seccion 10 1 inicio de sitio web y slider -->
<?php include 'admin/conexion/conexion_web.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="admin/materialize/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<title>Sitio web</title>
</head>
<body>
<nav class="red">
	
</nav>

<div class="slider">
    <ul class="slides">
    	<?php $sel = $con->prepare("SELECT * FROM slider");
    	$sel->execute();
    	$res = $sel->get_result();
    	while ($f = $res->fetch_assoc()) {?>
      <li>
        <img src="admin/inicio/<?php echo $f['ruta'] ?>" > <!-- random image -->
        <div class="caption center-align">
          <h3>Empresa</h3>
          <h5 class="light grey-text text-lighten-3">Slogan de la empresa</h5>
        </div>
      </li>
      
    <?php }
    $sel->close();
    ?>    
    </ul>
  </div>

	<script
	  
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	  <script src="admin/materialize/js/materialize.min.js"></script>
	  <!--para inicializar el slider -->
	  <script>
	  	 $('.slider').slider();
	  </script>
</body>
</html>
