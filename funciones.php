<?php

function conectarBaseDeDatos()
{
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $baseDeDatos = "bd_practica3";

    $conexion = mysqli_connect($host, $usuario, $contrasena, $baseDeDatos);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $conexion;
}

function agregarUsuario($conexion, $nombre, $apellido, $email, $contrasena, $tipo, $estado)
{
    $sql = "INSERT INTO usuarios (nombre, apellido, email, contrasena, tipo, estado) VALUES ('$nombre','$apellido','$email',
    '$contrasena','$tipo','$estado')";
    if (mysqli_query($conexion, $sql)) {

        header('Location: index.php');
        exit();
    } else {
        echo "Error al agregar usuario: " . mysqli_error($conexion);
    }
}


function eliminarUsuario($conexion, $idUsuario)
{
    $sql = "DELETE FROM usuarios WHERE id = $idUsuario";
    return mysqli_query($conexion, $sql);
}


function cambiarEstadoUsuario($conexion, $idUsuario, $nuevoEstado)
{
    $sql = "UPDATE usuarios SET estado = '$nuevoEstado' WHERE id = $idUsuario";
    return mysqli_query($conexion, $sql);
}
function obtenerUsuarios($conexion)
{
    $usuarios = array();
    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conexion, $sql);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $usuarios[] = $fila;
    }

    return $usuarios;
}

function mostrarUsuarios($usuarios)
{
    echo "<h2>Listado de Usuarios</h2>";
    echo "<ul>";

    foreach ($usuarios as $usuario) {
        echo "<li>{$usuario['nombre']} - Estado: {$usuario['estado']}</li>";
    }

    echo "</ul>";
}
