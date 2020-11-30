<?php
  include '../php/DbConfig.php';

  $correo = $_POST['usuario'];

  $link= mysqli_connect($servername, $username, $password, $database);
  $usuario = mysqli_query($link, "select * from usuarios  where email='".$correo."'");
  $estado = mysqli_fetch_array( $usuario )['estado'];
  if($estado == 'activado')
  {
    $newEstado = 'bloqueado';
  }
  else
  {
    $newEstado = 'activado';
  }
  $usuario = mysqli_query($link, "UPDATE usuarios SET estado='".$newEstado."' where email='".$correo."'");
  $usuarios = mysqli_query($link, "select * from usuarios" );

  $newTabla = '<table border=1> <tr> <th> CORREO </th> <th> CONTRASEÑA </th> <th> ESTADO </th> <th> FOTO </th></tr>';

  while ($row = mysqli_fetch_array( $usuarios )) {
    $newTabla = $newTabla . '<tr><td>' . $row['email'] . '</td> <td>' . $row['contraseña'] . '</td> <td>' . $row['estado'] . '</td>
    <td>' . '<img src="data:image/jpg;base64,'.base64_encode( $row['foto'] ).'" height="50" width="50"/>' . '</td></tr>';
  }
  $newTabla = $newTabla . '</table>';

  $usuarios->close();
  mysqli_close($link);

  echo $newTabla;
?>
