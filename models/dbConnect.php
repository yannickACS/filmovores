<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=filmovores', 'root', '');
}
catch(Exception $e) {
    die('Erreur:'.$e->getMessage());
}