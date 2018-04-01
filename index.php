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
<body class="blue-grey lighten-5">
<nav class="red">
	<a href="#" class="brand-logo center">Logo</a>
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

  <div class="row">
  	<div class="col s12 m6 l3">
  		<div class="card">
            <div class="card-image">
              <img src="admin/propiedades/casas/foto_principal.png">
              <span class="card-title">Precio</span>
            </div>
            <div class="card-content">
              <p>Direccion</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mas..</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3">
  		<div class="card">
            <div class="card-image">
              <img src="admin/propiedades/casas/foto_principal.png">
              <span class="card-title">Precio</span>
            </div>
            <div class="card-content">
              <p>Direccion</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mas..</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3">
  		<div class="card">
            <div class="card-image">
              <img src="admin/propiedades/casas/foto_principal.png">
              <span class="card-title">Precio</span>
            </div>
            <div class="card-content">
              <p>Direccion</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mas..</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3">
  		<div class="card">
            <div class="card-image">
              <img src="admin/propiedades/casas/foto_principal.png">
              <span class="card-title">Precio</span>
            </div>
            <div class="card-content">
              <p>Direccion</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mas..</a>
            </div>
          </div>
        </div>
      </div>
  	</div>
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
