<?php

include 'utilities.php';

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
