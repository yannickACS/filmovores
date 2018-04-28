<?php
require_once('../models/chargerClasse.php');
require_once('../models/dbConnect.php');
spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
$actorsManager = new ActorsManager($GLOBALS['bdd'], 'acteurs');
$filmmakerManager = new FilmmakersManager($GLOBALS['bdd'], 'realisateurs');
$filmmaker = $filmmakerManager->read(3);
$filmmaker = new Filmmaker($filmmaker['id'], $filmmaker['realisateur']);
// var_dump($filmmaker);
// tests Actors et ActorsManager
// $actor = $actorsManager->read(1);
$newActor = $actorsManager->setNew("YoYi YoYa");
$actor = new Actor($newActor['id'], $newActor['nom_acteur']);
echo "Id acteur : " . $actor->getId() . "<br>";
echo "Nom acteur : " . $actor->getName() . "<br>";
// var_dump($actor);
$actor->setName("York Yorki");
echo "Après setName, nom acteur = " . $actor->getName() . "<br>";
$newActor = $actorsManager->update($actor);
$actor = new Actor($newActor['id'], $newActor['nom_acteur']);
echo "Id acteur : " . $actor->getId() . "<br>";
echo "Nom acteur : " . $actor->getName() . "<br>";

