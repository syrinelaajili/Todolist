<?php

include 'utilities.php';
//Déclaration du tableau et l'ensemble des taches
// $tasks= [
//     ["titre"=> "Payer la facture","description" => "payer la facture de la STEG", "date" => "10/09/2022", "priorité" => "haute"],
//     ["titre"=> "Faire les courses","description" => "les courses du mois", "date" => "30/10/2022", "priorité" => "noraml"],
//     ["titre"=> "Appeler Jean","description" => "appeler mon fils", "date" => "18/12/2022", "priorité" => "basse"],
// ];




$tasks=loadAllTasks();
include 'index.phtml';
