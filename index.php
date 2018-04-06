<!--seccion 10 1 inicio de sitio web y slider -->
<?php include 'admin/conexion/conexion_web.php';?> 
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
  <?php 
  $sel_marc = $con->prepare("SELECT foto_principal,precio,estado,municipio, fraccionamiento,propiedad FROM inventario WHERE marcado='SI' ");
  $sel_marc->execute();
  $res_marc = $sel_marc->get_result();
  while ($f_marc = $res_marc->fetch_assoc()) { ?>
  	<div class="col s12 m6 l3">
  		<div class="card">
            <div class="card-image">
              <img src="admin/propiedades/<?php echo $f_marc['foto_principal'] ?>">
              <span class="card-title"><?php echo '$'. number_format($f_marc['precio'], 2); ?></span>
            </div>
            <div class="card-content">
              <p><?php echo $f_marc['fraccionamiento'].' '.$f_marc['estado'].' '.$f_marc['municipio']; ?></p>
            </div>
            <div class="card-action">
              <a href="ver_mas.php?id=<?php echo $f_marc['propiedad'] ?>">Ver mas..</a>
            </div>
          </div>
        </div>
        <?php }
        $sel_marc->close();        
        ?>
  		</div>
<!--10.7 buscador de inmuebles -->
 
 <div class="row">
 	<div class="col s12">
 		<div class="card">
 			<div class="card-content">
 				<span class="card-title">Busqueda de inmuebles</span>
 				<form action="buscar.php" method="">
 					<div class="row">
          <div class="col s6">
            <select id="estado" name="estado" required="">
            <option value="" disabled selected>Selecciona un estado</option>
            <?php $sel_estado = $con->prepare("SELECT * FROM estados ");
            $sel_estado->execute();
            $res_estado = $sel_estado->get_result();
            while ($f_estado = $res_estado->fetch_assoc()) {?>
                <option value="<?php echo $f_estado['idestados'] ?>"><?php echo $f_estado['estado'] ?></option>
                <?php }
                $sel_estado->close();
                ?>
            </select>
          </div>
         
        <div class="col s6">
          <div class="res_estado"></div>
        </div> 
      </div>
      <div class="row">
      	<div class="col s6">
      		<select name="operacion" required  >
              <option value="" disabled selected  >ELIGE LA OPERACION</option>
              <option value="VENTA">VENTA</option>
              <option value="RENTA">RENTA</option>
              <option value="TRASPASO">TRASPASO</option>
              <option value="OCUPADO">OCUPADO</option>
            </select>
      	</div>
      	<div class="col s6">
      		<select name="tipo_inmueble" required >
              <option value="" disabled selected  >ELIGE EL TIPO DE INMUEBLE</option>
              <option value="CASA">CASA</option>
              <option value="TERRENO">TERRENO</option>
              <option value="LOCAL">LOCAL</option>
              <option value="DEPARTAMENTO">DEPARTAMENTO</option>
            </select>
      	</div>
      </div>

      <div class="row">
      	<div class="col s6">
      		<div class="input-field">
      		<input type="number" name="rango1" title="" id="rango1" required>
      		<label for="rango1">Precio minimo</label>
      	</div>
      </div>      
      	<div class="col s6">
      		<div class="input-field">
      		<input type="number" name="rango2" title="" id="rango2" required>
      		<label for="rango2">Precio maximo</label>
      	</div>
      </div>
    </div> 
    <button type="button" class="btn">Buscar inmueble</button> 
 				</form>
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
	  	 //para el buscardor
	  	 $('select').material_select();
	  	 /*10 departamentos y municipios */
$('#estado').change(function(){ 
			$.post('admin/propiedades/ajax_muni.php',{
				estado:$('#estado').val(),

				beforeSend: function(){
					$('.res_estado').html("Espere un momento por favor");
				}

			}, function(respuesta){
				$('.res_estado').html(respuesta);
			});
	});
	  </script>
</body>
</html>
