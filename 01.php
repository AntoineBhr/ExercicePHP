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
        <!-- Exercice 3 -->
         <h1>Wetransfer LIKE</h1>
        <form method='post' enctype='multipart/form-data' action=<?php print $_SERVER["PHP_SELF"]; ?>>
            <label for='myfile'>Chargez votre fichier : </label>
            <input type="file" name="myfile">
            <input type="text" name="newFileName">
            <input type='submit' name='uploadfile'>
        </form>
        <?php 
            $target_dir = "./files/";

            if (isset($_FILES['myfile'])) {
                $target_name = basename($_FILES['myfile']['name']);
                $extension = substr($target_name, strpos($target_name, ".")); 
                $new_target_name = $_POST['newFileName'];
                $target_file = $target_dir . $new_target_name . $extension ;
                $temp_dir = $_FILES['myfile']['tmp_name'];
    
                if (isset($_POST['uploadfile'])) {
                    move_uploaded_file($temp_dir, $target_file);
                    echo "votre fichier a bien été transféré<br>";
                    echo "<h2>Nom du fichier:</h2> $new_target_name <br>";
    
                } else {
                    echo "Merci de renseigner les champs.";
                }
            }
           
        ?>
        <!-- Exercice 4 -->
        <h1>Jeu de dés</h1>
        <p>Sélectionnez le nombre de dés :</p>
        <form method='post' action=<?php print $_SERVER["PHP_SELF"]; ?>>
            <select name='dices'>
                <?php for($x=1; $x < 6; $x++) {
                    echo "<option value='$x'>$x</option>";
                    }
                ?>             
            </select>
            <input type="submit" name="value" value="Roll dice(s)"></input>
        </form>
        <br>
        
        <?php 
            if (isset($_POST['dices'])) {
                $nbDices = $_POST['dices'];
                for($i = 0; $i<$nbDices; $i++){
                    $face = rand(1, 6);
                    switch($face){
                        case 1:
                            $dice = "<img src='./DE1.png' />";
                            break;
                        case 2:
                            $dice = "<img src='./DE2.png' />";
                            break;
                        case 3:
                            $dice = "<img src='./DE3.png' />";
                            break;
                        case 4:
                            $dice = "<img src='./DE4.png' />";
                            break;
                        case 5:
                            $dice = "<img src='./DE5.png' />";
                            break;
                        default:
                            $dice = "<img src='./DE6.png' />";
                    }
                    echo $dice;
                    echo "&nbsp";
                }

            }
        ?>
        <br />
        <!-- Exercice 5 -->
        <?php
            $listequestions = [
                "Quel organe utilise-t-on pour respirer ?", 
                "Comment est-ce qu'on dit 'bon après-midi' en anglais ?",
                "Combien font 9x9 ?",
                "Comment appelle-t-on une kipa qui prend un avion pour aller à Toronto ?"
            ];
            $reponses = [
                ["L'anus",
                "Le cubitus",
                "Les nasaux",
                "L'auriculaire"],
                ["Whassup bro ?",
                "Cheers !",
                "Happy Birthday",
                "Good Afternoon !"],
                ["5854587415",
                "81",
                "2",
                "OH NON DES MATHEMATIQUES !!!"],
                ["Une kipa volante",
                "Une kipa surgelée",
                "Une kipembé",
                "D, la réponse D."]
            ];

            $answers = [
                "Les nasaux",
                "Good Afternoon !",
                "81",
                "D, la réponse D."
            ];
            
            echo "<h1> Qui veut gagner de l'argent en masse ? </h1><br>";
            echo "Présenté par Jean-Pierre Foucault.<br>";
            echo "<h2>Question :</h2><br>";
            $randomQuestionKey = rand(0, count($listequestions)-1);
            echo "<h3>$listequestions[$randomQuestionKey]</h3><br>";
            echo "<ul>";
            echo "<form method='post'>";
            foreach($reponses[$randomQuestionKey] as $key => $response){
                if($key % 2 === 0 || $key === 0){
                    echo "<ul>";
                    echo "<button style='width:10vw; height:4vh' type='submit' name=$key >$response</button>";
                }else{
                    echo "<button style='width:10vw; height:4vh' type='submit' name=$key >$response</button>";
                    echo "</ul>";
                }
            }
            echo "</form>";
            if(isset($_POST[0]) || isset($_POST[1]) || isset($_POST[2]) ||isset($_POST[3])){
                if(isset($_POST[0])){
                    $chosenAnswer = $reponses[$randomQuestionKey][0];
                    if(in_array($chosenAnswer, $answers)){
                        echo "<h1>Bonne réponse !</h1>";
                        echo "<img src='./DernierMotJP.jpg' />";
                    }else{
                        echo "<h1>T'es nul !</h1>";
                    }
                }elseif(isset($_POST[1])){
                    $chosenAnswer = $reponses[$randomQuestionKey][1];
                    if(in_array($chosenAnswer, $answers)){
                        echo "<h1>Bonne réponse !</h1>";
                        echo "<img src='./DernierMotJP.jpg' />";
                    }else{
                        echo "<h1>T'es nul !</h1>";
                    }
                }elseif(isset($_POST[2])){
                    $chosenAnswer = $reponses[$randomQuestionKey][2];
                    if(in_array($chosenAnswer, $answers)){
                        echo "<h1>Bonne réponse !</h1>";
                        echo "<img src='./DernierMotJP.jpg' />";
                    }else{
                        echo "<h1>T'es nul !</h1>";
                    }
                }elseif(isset($_POST[3])){
                    $chosenAnswer = $reponses[$randomQuestionKey][3];
                    if(in_array($chosenAnswer, $answers)){
                        echo "<h1>Bonne réponse !</h1>";
                        echo "<img src='./DernierMotJP.jpg' />";
                    }else{
                        echo "<h1>T'es nul !</h1>";
                    }
                }
            }
        ?>
    </body>
</html>
