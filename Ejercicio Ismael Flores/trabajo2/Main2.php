<!-- Ismael Flores 0101-2000-01178 -->
<?php //Conexion de base de datos
require_once 'Conexion.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "connected to $dbname at $host successully  ";
    $consulta = "SELECT c.name AS Nombre_Pelicula,COUNT(fc.film_id) as cantidad_peliculas FROM 
                category c
                JOIN film_category fc on c.category_id = fc.category_id
                GROUP BY c.name 
                ORDER BY cantidad_peliculas DESC";

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




<table class="table table-dark table-hover">

    <thead>
    <tr>
        <th scope="col">Categorias </th>
        <th scope="col">Cantidad </th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($bitacora as $objeto) : ?>
        <tr>
            <th scope="row"><?php echo $objeto['Nombre_Pelicula']; ?></th>
            <td><?php echo $objeto['cantidad_peliculas']; ?></td>

        </tr>
    <?php endforeach; ?>
    </tbody>

</table>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>


