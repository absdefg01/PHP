<?php

error_reporting(E_ALL);

/* Déclaration des constantes */
/* Déclaration des fonctions */
function operation($a, $b, $operation)
{
    // On vérifie si l'opération est définie
    if($operation >= 0 && $operation <= 4)
    {
        // On crée un array contenant trois des cinq opérations
        // On ne peut pas mettre les deux dernières car si $b vaut zéro, on aura une erreur
        $calcul = array(
            $a + $b,
            $a - $b,
            $a * $b
        );
        // Si l'on veut diviser ou faire le modulo et que $b est égale à zéro, on retourne une erreur
        if($b == 0 && $operation >= 3)
        {
            return 'Une erreur est survenue : vous ne pouvez pas diviser par zéro';
        }
        // Si l'on veut diviser ou faire le modulo et que $b est différente de zéro
        // On complète le tableau des différents calculs possibles
        if($b != 0 && $operation >= 3)
        {
            $calcul[] = $a / $b;
            $calcul[] = $a % $b;
        }
        // Enfin, on retourne le résultat qui correspond à l'opération demandée !
        return $calcul[$operation];
    }
    else
    {
        return 'Une erreur est survenue : opération indéfinie';
    }
}
/* Traitement des données */
// On vérifie que toutes les valeurs des associations contenues dans $_POST sont remplies
$is_valid = true;
foreach($_POST as $val)
{
    if(trim($val) == '')
    {
        $is_valid = false;
    }
}
// On vérifie que le formulaire est soumis et bien rempli
if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['operation']) && $is_valid)
{
    $display = true;
    $result = operation((int)$_POST['a'], (int)$_POST['b'], (int)$_POST['operation']);
    $error = is_string($result);
    // On utilise à nouveau un array pour simplifier le traitement
    // On récupère le signe qui est associé à $_POST['operation']
    $signe = array(' + ', ' - ', ' * ', ' / ', ' % ');
    if(!$error)
    {
        $signe = $signe[(int)$_POST['operation']];
    }
}
else
{
    $display = false;
    $result = false;
    $error = false;
}
/* Affichage des résultats et du formulaire */
if($display)
{
    if($error)
    {
        $result;
    }
    else
    {
        echo (int)$_POST['a'] . $signe . (int)$_POST['b'] . ' = ' . $result;
    }
}
?>
<form action="exo7b.php" method="post">
    <p>
        Opérande n°1 :<input type="text" name="a" />
        <br />
        Opérande n°2 :<input type="text" name="b" />
        <br />
        Opération : 
        <select name="operation">
            <option value="0">Addition</option>
            <option value="1">Soustraction</option>
            <option value="2">Multiplication</option>
            <option value="3">Division</option>
            <option value="4">Modulo</option>
        </select>
        <br />
        <input type="submit" value="Calculer" />
    </p>    
</form>
