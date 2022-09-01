<?php

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