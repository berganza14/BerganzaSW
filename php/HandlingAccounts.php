<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/CambiarEstado.js"></script>
  <script type="text/javascript" src="../js/RemoveUser.js"></script>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="form">
      Usuario seleccionado:
      <input type="text" name="usuario" id="usuario">
      <input type="button" name="cambiar" id="cambiar" value="Cambiar estado"/>

      <input type="button" name="eliminar" id="eliminar" value="Eliminar usuario"/> <br><br>
    </div>
    <div id="tabla">
      <?php
        include '../php/DbConfig.php';

        $link= mysqli_connect($servername, $username, $password, $database);
        $usuarios = mysqli_query($link, "select * from usuarios" );

        echo '<table border=1> <tr> <th> CORREO </th> <th> CONTRASEÑA </th> <th> ESTADO </th> <th> FOTO </th></tr>';
        while ($row = mysqli_fetch_array( $usuarios )) {
          echo '<tr><td>' . $row['email'] . '</td> <td>' . $row['contraseña'] . '</td> <td>' . $row['estado'] . '</td>
          <td>' . '<img src="data:image/jpg;base64,'.base64_encode( $row['foto'] ).'" height="50" width="50"/>' . '</td></tr>';
        }
        echo '</table>';

        $usuarios->close();
        mysqli_close($link);
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
