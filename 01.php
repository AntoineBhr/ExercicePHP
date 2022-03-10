<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="images/capture.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <title>Titre de la page</title>
        <meta name="description" content="une description détaillée de ma page">

    </head>
    <body>
        <form method='post' action=<?php print $_SERVER["PHP_SELF"]; ?>>
            <label for='timeDuo'>Temps passé à deux (en minutes)</label>
            <input type="number" name="timeDuo">
            <label for="timeSolo">Temps passé seul (en minutes)</label>
            <input type="number" name="timeSolo">
            <input type='submit'>
        </form>
        <?php 
            //Exercice 1
            if (isset($_POST['timeSolo']) && isset($_POST['timeDuo'])) {
                $timeSolo = $_POST['timeSolo'];
                $timeDuo = $_POST['timeDuo'];
                
                $result = (($timeDuo * 2) - $timeSolo) / $timeSolo;


                echo "<br><h2>Mesure de l'effort relatif consenti par un binôme :</h2><h1>$result</h1>";

            } else {
                echo "Merci de renseigner les champs.";
            }
        ?>
        <h1>Calcul de produit en croix</h1>
        <form method='post' action=<?php print $_SERVER["PHP_SELF"]; ?>>
            <label for='number1'>Valeur 1:</label>
            <input type="number" name="number1">
            <label for="number2">Valeur 2:</label>
            <input type="number" name="number2">
            <br>
            <label for="number3">Valeur 3:</label>
            <input type="number" name="number3">
            <input type='submit'>
        </form>
        <?php 
            //Exercice 2
            if (isset($_POST['number1']) && isset($_POST['number2']) && isset($_POST['number3'])) {
                $number1 = $_POST['number1'];
                $number2 = $_POST['number2'];
                $number3 = $_POST['number3'];
                
                $resultCross = ($number2 * $number3) / $number1;

                echo "<br><h2>Résultat qu'il est beau :</h2><h1>$resultCross</h1>";

            } else {
                echo "Merci de renseigner les champs.";
            }

        ?>
    </body>
</html>
