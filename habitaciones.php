<?php 
   $hostDB = '127.0.0.1';
   $nombreDB = 'bs_system_hotel';
   $usuarioDB = 'root';
   $contrasenyaDB = '';
// Conecta con base de datos
   $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
   $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
  $miConsulta = $miPDO->prepare('SELECT * FROM habitaciones;');
// Ejecuta consulta
   $miConsulta->execute();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de habitaciones Hotel samaros</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>

    body
    {
    background:#E3DAC9;
    color:black;
    }

    #boton1
    {
        background-image: url("https://www.flaticon.es/svg/vstatic/svg/3917/3917034.svg?token=exp=1656644382~hmac=882913a546a3350cb5f55605ccefc207");
    }

    .nav-item
    {
        color: black;
        display: block;
        font-size: 10pt;
        font-family: 'GothamBook';
        padding: 1px 30px;
        text-transform: uppercase;
        letter-spacing: 4px;
        transition: background .5s;
        border-right: 1px solid #000000;
    }
    
    </style>
    </head>

    <body>
  
  <?php
    include('barra.php');
  ?>
  <form
  style =
  "
  width: 60%;
  padding: 30px;
  margin: auto;
  margin-top: 100px;
  border-radius: 4px;
  font-family: 'calibri';
  color: black;
  background:white;
  box-shadow: 7px 13px 37px #A06D9E;
  "
  method = "POST"
  action="habitaciones_nv.php">
  
 
 <h2 style="text-align: center;">Registro de Habitaciones</h2>
  <div class="form-group">


     <div class="form-group">
        <label for="id">id de la habitacion:</label>
        <input type="text" class="form-control" name ="id">
    </div>
    <br>

    <label for="tipo_h">Tipo habitacion:</label>
    <select style="background: white;" id="tipo_h" class="form-control" name ="tipo">
        <option selected >Siut</option>
        <option>Doble</option>
        <option>Triple</option>
    </select>
  </div>
  <br>
  <!---
  <div class="form-group">
    <label for="cantidadpersonas">Servicios :</label>
    <select style="background: white"; id="servicios_h" class="form-control" name ="servicios">
        <option selected >Television</option>
        <option>Internet</option>
        <option>Agua caliente</option>
    </select>
 <br> 
 -->
 </div>


 <div class="form-group">
    <textarea style="background: white; color:black;" name="descripcion" rows="5" cols="35" name ="descripcion_h">Descripcion</textarea>
 </div>

  <br>
 <div class="form-group">
    <label for="precio">precio :</label>
    <input type="text" class="form-control" name="precio">
  </div>
  <br>
  <div class="form-group">
    <label for="cant">cantidad de habitaciones :</label>
    <input type="text" class="form-control" name="cantidad">
  </div>
 <hr>


  <button style =
  "
  width: 100%;
  background:black;
  border: none;
  padding: 12px;
  color: white;
  margin: 16px 0;
  font-size: 16px;
  " 
  type="submit" class="btn btn-default">Registrar</button>
</form>


<hr>
<section style ="padding: 20px;">

  <h2 style ="text-align: center;">LISTA DE HABITACIONES</h2>
  <table class="table" style="background:white; color:black;  border-color:#8F3A84;">
    <thead style ="background:#35b3a7;">
      <th scope ="col">Id</th>
      <th scope ="col">tipo</th>
      <th scope ="col">Descripcion</th>
      <th scope ="col">precio</th>
      <th scope ="col">cantidad disponible</th>
      <th scope ="col">Servicios</th>
      <th scope ="col"></th>
      <th sope ="col"></th>
    </thead>

    <tbody>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
    <tr>
       <th scope ="row"><?= $valor['id_habitacion']; ?></th>
       <td><?= $valor['tipo']; ?></td>
       <td><?= $valor['descripcion']; ?></td>
       <td><?= $valor['precio']; ?></td>
       <td><?= $valor['cantidad']; ?></td>
       
       <td><button>Eliminar</button></td>
       <td><button>Modificar</button></td>
    </tr>
    <?php endforeach; ?>
    </tbody> 

 </table>
</section>

   </body>

</html>
