<?php
require_once('../models/chargerClasse.php');
require_once('../models/dbConnect.php');
spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
$actorsManager = new ActorsManager($GLOBALS['bdd'], 'acteurs');
$filmmakerManager = new FilmmakersManager($GLOBALS['bdd'], 'realisateurs');
var_dump($filmmakerManager->setNew("Yaya Yaya"));