<?php

include 'utilities.php';

//Parcourir un tableau de la première case jusqu'à la dernière et enregistrer toutes taches et supprimer les autres


if (array_key_exists("indexes",$_POST)) {
    $newTasks=[];
    $tasks = loadAllTasks();
    for ($i=0; $i<count ($tasks); $i++) {
        if (!in_array($i,$_POST["indexes"])) {
            array_push($newTasks,$tasks[$i]);
        }
    }
    saveAllTasks($newTasks);
    header('location:index.php');
    exit();
}
