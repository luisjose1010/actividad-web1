<?php

$message = '';

if (isset($_POST['submit'])) {

    $totalFemaleEmployee = 0; // Total de empleados femeninos
    $totalMaleEmployee = 0; // Total de empleados masculinos
    $totalMarriedMen = 0; // Total de hombres casados que ganan mas de 2500 Bs
    $totalwidowWomen = 0; // Total de mujeres viudas que ganan mas de 1000 Bs
    $ageAverageMen = 0; // Edad promedio de los hombres

    for ($i = 1; $i <= 5; $i++) {
        $name[$i] = $_POST["name$i"];
        $age[$i] = $_POST["age$i"];
        $gender[$i] = $_POST["gender$i"];
        $civilStatus[$i] = $_POST["civil-status$i"];
        $salary[$i] = $_POST["salary$i"];
        $submit = false;
    }


    for ($i = 1; $i <= 5; $i++) {
        if ($gender[$i] === 'female') {
            // Si es mujer
            $totalFemaleEmployee++;

            // Si tambien es viuda y gana mas de 1000 Bs
            if ($civilStatus[$i] === 'widower' && $salary[$i] > 1000) {
                $totalwidowWomen++;
            }
        } else if ($gender[$i] === 'male') {
            $totalMaleEmployee++;
            $ageAverageMen += $age[$i]; // Suma de edad para promedio

            if ($civilStatus[$i] === 'married' && $salary[$i] > 2500) {
                // Si esta casado y gana mas de 2500 Bs
                $totalMarriedMen++;
            }
        } else {
            $message = 'Datos incompletos, rellene el formulario correctamente.';
        }
    }
    $ageAverageMen /= $totalMaleEmployee;
} else {
    $message = 'Datos incompletos, rellene el formulario correctamente.';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <main class="container-fluid">
        <h1>Resultados</h1>
        <ul>
            <li>Total de empleados femeninos: <b><?= $totalFemaleEmployee ?></b></li>
            <li>Total de hombres casados que ganan más de 2500 Bs: <b><?= $totalMarriedMen ?></b></li>
            <li>Total de mujeres viudas que ganan más de 1000 Bs: <b><?= $totalwidowWomen ?></b></li>
            <li>Edad promedio de hombres: <b><?= $ageAverageMen ?></b></li>
        </ul>

        <a href="./index.html"><button class="btn btn-danger">Volver</button></a>

        <?= "<br><br>$message<br>" ?>

    </main>
</body>

</html>