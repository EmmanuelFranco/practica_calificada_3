<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>Gestión de Usuarios</title>
</head>
<body>

<?php
include 'funciones.php';

$conexion = conectarBaseDeDatos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $tipo = $_POST["tipo"];
    $estado = $_POST["estado"];

    agregarUsuario($conexion, $nombre, $apellido, $email, $contrasena, $tipo, $estado);
}

$usuarios = obtenerUsuarios($conexion);

echo "<h2>Agregar Usuario</h2>";
echo "<form method='post' action='index.php'>";
echo "Nombre: <input type='text' placeholder='Nombre' name='nombre' required> ";
echo "<form method='post' action='index.php'>";
echo "Apellido: <input type='text' placeholder='Apelllidos' name='apellido' required> ";
echo "<form method='post' action='index.php'>";
echo "Email: <input type='text' placeholder='Email' name='email' required> ";
echo "<form method='post' action='index.php'>";
echo "Contraseña: <input type='password' placeholder='Contraseña' name='contrasena' required> ";
echo "Tipo: <select name='tipo'><option value='selection'>Seleciona una opción</option><option value='admin'>admin</option><option value='other'>other</option></select> ";
echo "Estado: <select name='estado'><option value='selection'>Seleciona una opción</option><option value='activo'>Activo</option><option value='inactivo'>Inactivo</option></select> ";
echo "<input type='submit' value='Agregar'>";
echo "</form>";


mostrarUsuarios($usuarios);


mysqli_close($conexion);

?>

</body>
</html>