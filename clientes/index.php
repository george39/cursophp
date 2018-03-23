<!--3 FORMULARIO PARA CLIENTES -->
<?php include '../extend/header.php'; ?>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Alta de clientes</span>
        <form class="form" action="ins_clientes.php" method="post" autocomplete=off >
          <div class="input-field">
            <input type="text" name="nombre"  title="Solo letras" pattern="[A-Z/s ]+"  id="nombre" onblur="may(this.value, this.id)"  >
            <label for="nombre">Nombre</label>
          </div>
          <div class="input-field">
            <input type="text" name="direccion"    id="direccion" onblur="may(this.value, this.id)"  >
            <label for="direccion">Dirección</label>
          </div>
          <div class="input-field">
            <input type="text" name="telefono"   id="telefono"  >
            <label for="telefono">Telefono</label>
          </div>
          <div class="input-field">
            <input type="email" name="email"   id="email"   >
            <label for="email">Correo</label>
          </div>
          <button type="submit" class="btn" >Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <nav class="brown lighten-3" >
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search"   id="buscar" autocomplete="off"  >
          <label for="buscar"><i class="material-icons" >search</i></label>
          <i class="material-icons" >close</i>
        </div>
      </div>
    </nav>
  </div>
</div>

<!--4 buscar clientes -->
<?php
#se pregunta que nivel de usuario tiene
if ($_SESSION['nivel'] == 'ADMINISTRADOR') { 
  $sel = $con->prepare("SELECT * FROM clientes ");
}else {
  $sel = $con->prepare("SELECT * FROM clientes WHERE asesor = ? ");
  $sel->bind_param('s', $_SESSION['nombre']);
}
$sel->execute(); #para que se ejecute la consulta
$res = $sel->get_result(); #aqui se va almacenado el resultado de la consulta
$row = mysqli_num_rows($res); 
?>

<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
          <span class="card-title">Clientes (<?php echo $row ?>)</span>
          <table>
            <thead>
              <tr class="cabecera">
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Asesor</th>
              </tr>
            </thead>
            <?php while ($f = $res->fetch_assoc()) { ?>
              <tr>
                <td><?php echo $f['nombre'] ?></td>
                <td><?php echo $f['direccion'] ?></td>
                <td><?php echo $f['tel'] ?></td>
                <td><?php echo $f['correo'] ?></td>
                <td><?php echo $f['nombre'] ?></td>
                
              </tr>
            <?php }
            $sel->close();
            $con->close();
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php include '../extend/scripts.php'; ?>

</body>
</html>