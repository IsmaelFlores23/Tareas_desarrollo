<!-- Ismael Flores 0101-2000-01178 -->
<?php //Conexion de base de datos
require_once 'Conexion.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "connected to $dbname at $host successully  ";
    $consulta = "SELECT description,rental_rate from `film` ORDER by rental_rate DESC limit 5";
    $stmt = $conn->query($consulta);
    $bitacora = $stmt->fetchAll(PDO::FETCH_ASSOC);

}catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());

}

//fin de la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicos de Bootstrap </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

</head>

<body>

<h1>Peliculas Mas Rentadas</h1>



<ul class="list-group">

    <?php

    foreach ($bitacora as $objeto) : ?>
        <li class="list-group-item"><?php echo $objeto['description'];?></li>

    <?php endforeach; ?>


</ul>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>