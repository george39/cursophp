<!--15 actualizar la foto de las propiedades -->
<?php
include '../extend/header.php';
$id = htmlentities($_GET['id']);
#para seleccionar la imagen
$sel = $con->prepare("SELECT foto_principal FROM inventario WHERE propiedad = ?");
$sel->bind_param('s', $id);
$sel->execute();
$res = $sel->get_result();
if ($f = $res->fetch_assoc()) {
  $foto = $f['foto_principal'];
}
?>
<!--codigo para actualizar la foto de perfil traido de materialize -->
<div class="row">
	<div class="col s6">
    <h2 class="header">Actualizar foto principal</h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="<?php echo $foto ?>" width="200" height="200">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <form action="up_principal.php" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" es para indicar que el formulario lleva un archivo -->
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <input type="hidden" name="anterior" value="<?php echo $foto ?>">
          	<div class="file-field input-field">
          		<div class="btn">
          			<span>Foto</span>
          			<input type="file" name="foto">
          		</div>
          		<div class="file-path-wrapper">
          			<input class="file-path validate" type="text" >
          		</div>
          	</div>
          	<button type="submit" class="btn">Actualizar</button>
          </form> 
        </div>        
      </div>
    </div>
  </div>
  <!--18 -->
  <div class="col s6">
      <h2 class="header">Cargar imagenes</h2>
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
            <form action="ins_imagenes.php" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" es para indicar que el formulario lleva un archivo -->
          <input type="hidden" name="id" value="<?php echo $id ?>">
          
            <div class="file-field input-field">
              <div class="btn">
                <span>Foto</span>
                <input type="file" name="ruta[]" multiple>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" >
              </div>
            </div>
            <button type="submit" class="btn">Guardar</button>
          </form> 
              
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

<?php include '../extend/scripts.php'; ?>

</body>
</html>