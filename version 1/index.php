<?php

//Déclaration du tableau et l'ensemble des taches
// $tasks= [
//     ["titre"=> "Payer la facture","description" => "payer la facture de la STEG", "date" => "10/09/2022", "priorité" => "haute"],
//     ["titre"=> "Faire les courses","description" => "les courses du mois", "date" => "30/10/2022", "priorité" => "noraml"],
//     ["titre"=> "Appeler Jean","description" => "appeler mon fils", "date" => "18/12/2022", "priorité" => "basse"],
// ];

//Au lieu de faire une déclaration du tableau on va utiliser un fichier csv qui va nous permettre d'ajouter les taches sans evoir les écrire dans l'index php
//pour 'r' read 'w' write 'appand' ajouter
function loadAllTasks()
{
    $tab = [];
    $file = fopen('tasks.csv', 'r');
    while ($ligne = fgetcsv($file)) {
        array_push($tab, $ligne);
    }
    fclose($file);
    return $tab;
}


//Déclaration du tableau de l'information des taches
if (array_key_exists('ajouter', $_POST)) {
    $task = [
        /* "titre" => */$_POST['title'],
        /*"description" =>*/ $_POST['description'],
        /*"date" =>*/ $_POST['year'] ."-" .$_POST['month']."-" . $_POST['day'],
        /*"priorité" =>*/ $_POST['priority']
    ];
    
    // array_push($tasks, $task);
    addOneTask($task);
    //redirection, recharger la page
    header('location:index.php');
    exit(); 
}


function addOneTask($task)  {

    $file = fopen('tasks.csv', 'a');  
    fputcsv($file, $task);    
    fclose($file); 
 
}


function saveAllTasks($tasks) {
    $file= fopen('tasks.csv', 'w');

    foreach ($tasks as $task) {
        fputcsv($file,$task);
    }
    fclose($file);
}

//Parcourir un tableau de la première case jusqu'à la dernière et enregistrer toutes taches et supprimer les autres
$newTasks=[];

if (array_key_exists("indexes",$_POST)) {
    for ($i=0; $i<count ($tasks); $i++) {
        if (!in_array($i,$_POST["indexes"])) {
            array_push($newTasks,$tasks[$i]);
        }
    }
    saveAllTasks($newTasks);
    header('location:index.php');
    exit();
}

$tasks = loadAllTasks();
include 'index.phtml';
