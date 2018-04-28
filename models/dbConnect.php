<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=films_caty', 'root', '');
}
catch(Exception $e) {
    die('Erreur:'.$e->getMessage());
}