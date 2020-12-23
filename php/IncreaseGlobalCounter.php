<?php
    $usuarios = simplexml_load_file('../xml/UserCounter.xml');
    $cont = $usuarios->usuario;
    $usuarios->usuario[0] = $cont+1;

    $usuarios->asXML('../xml/UserCounter.xml');
    
    header('location:Layout.php');
?>