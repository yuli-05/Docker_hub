<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $conexion = new SQLite3('agenda2.db');
    $conexion->exec("CREATE TABLE personas (nombre varchar(50), email varchar(50), telefono int)");
    $conexion->exec("INSERT INTO personas VALUES('".$nombre."','".$email."','".$telefono."')");

    $consulta = $conexion->query("SELECT * FROM personas");
   // $query = $conexion->prepare($consulta);
    //$query->execute();

    print "<table cellpadding='5' border='1'>\n";
    print "<tr><td>Nombre</td>
                <td>Email</td>
                <td>Telefono</td>
            </tr>\n";
    while($fila=$consulta->fetchArray()){

        print "<tr>"
                . "<td>".$fila['nombre']."</td>"
                . "<td>".$fila['email']."</td>"
                . "<td>".$fila['telefono']."</td>"
                . "</tr>\n";


    }


    print "</table>\n";

    //while($fila=$consulta->fetchArray()){
    //    echo $fila['nombre'];
    //    echo $fila['email'];
    //    echo $fila['telefono'];
    //}


?>


