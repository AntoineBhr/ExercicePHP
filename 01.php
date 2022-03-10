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

        if (isset($_POST['timeSolo']) && isset($_POST['timeDuo'])) {
            $timeSolo = $_POST['timeSolo'];
            $timeDuo = $_POST['timeDuo'];
            
            $result = (($timeDuo * 2) - $timeSolo) / $timeSolo;

            echo "<h1>$result</h1>";

        } else {
            echo "Merci de renseigner les champs.";
        }

       
        


        ?>
    </body>
</html>
