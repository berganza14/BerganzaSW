<?php

    session_start();
    if($_SESSION['tipoUser']!="admin"){
        header('location:Layout.php');
        exit();
    }

?>

<?php
  include '../php/DbConfig.php';

  $correo = $_POST['usuario'];

  $link= mysqli_connect($servername, $username, $password, $database);
  $usuario = mysqli_query($link, "select * from usuarios  where email='".$correo."'");
  $estado = mysqli_fetch_array( $usuario )['estado'];
  if($estado == 'activo' && $correo != "admin@ehu.es")
  {
    $newEstado = 'bloqueado';
  }
  else
  {
    $newEstado = 'activo';
  }
  $usuario = mysqli_query($link, "UPDATE usuarios SET estado='".$newEstado."' where email='".$correo."'");
  $usuarios = mysqli_query($link, "select * from usuarios" );

  $newTabla = '<table border=1> <tr> <th> CORREO </th> <th> CONTRASEÑA </th> <th> ESTADO </th> <th> FOTO </th></tr>';

  while ($row = mysqli_fetch_array( $usuarios )) {
    $newTabla = $newTabla . "<tr><td>" . $row['email'] . "</td> <td>" . $row['contraseña'] . "</td> <td>" . $row['estado'] . "</td>
          <td>" . "<img width=\"50\" height=\"60\" src=\"data:image/*;base64,".$row['foto']."\"alt=\"Imagen\"/></td></tr>";
  }
  $newTabla = $newTabla . '</table>';

  $usuarios->close();
  mysqli_close($link);

  echo $newTabla;
?>
