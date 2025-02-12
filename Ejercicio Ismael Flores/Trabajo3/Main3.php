<!-- Ismael Flores 0101-2000-01178 -->
<?php //Conexion de base de datos
require_once 'Conexion.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "connected to $dbname at $host successully  ";
    $consulta = "select sf.first_name, sf.last_name, COUNT(r.rental_id) as total_rentas
            FROM staff sf
            left JOIN rental r on sf.staff_id = r.staff_id
            group by sf.staff_id
            order by total_rentas DESC";


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
    <title>Trabajo de Bootstrap </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

</head>

<body>



<div class="container">

    <?php

    foreach ($bitacora as $staff) {
        echo "<div class='card' style='width: 18rem;' >
                 <img src='https://www.pixelstalk.net/wp-content/uploads/2015/12/Jordan-logo-wallpapers.jpg' class='card-img-top' alt='UNICAH'>
                <div class='card-body'>
                    <h5 class='card-title'>{$staff['first_name']} {$staff['last_name']}</h5>
                    <p class='card-text'>Este usuario del staff a conseguido rentar .{$staff['total_rentas']}.</p>
                </div>
              </div>";
    }
    ?>





</div>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<!-- FIN DE HTML -->
</body>
</html>
</html>
